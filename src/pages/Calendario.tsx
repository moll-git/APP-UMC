import { useState } from 'react';
import { ChevronLeft, ChevronRight, Clock, MapPin } from 'lucide-react';
import { events } from '@/data';
import type { Event } from '@/types';

const DAYS = ['LUN', 'MAR', 'MIÉ', 'JUE', 'VIE', 'SÁB', 'DOM'];

const EVENT_COLORS: Record<Event['type'], string> = {
  Ensayo: '#4488ff',
  Concierto: '#ff6633',
  Estudio: '#aa44ff',
  Reunión: '#ffaa00',
};

// June 2026: starts on Monday (day 1 = Monday)
function buildCalendarDays(year: number, month: number) {
  const firstDay = new Date(year, month, 1).getDay(); // 0=Sun
  // Convert to Mon-first: Mon=0 ... Sun=6
  const startOffset = (firstDay === 0 ? 6 : firstDay - 1);
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const cells: (number | null)[] = [];
  for (let i = 0; i < startOffset; i++) cells.push(null);
  for (let d = 1; d <= daysInMonth; d++) cells.push(d);
  return cells;
}

const MONTH_NAMES = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO',
  'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];

export default function Calendario() {
  const [viewYear, setViewYear] = useState(2026);
  const [viewMonth, setViewMonth] = useState(5); // June = 5
  const [selectedDay, setSelectedDay] = useState<number | null>(18); // today

  const cells = buildCalendarDays(viewYear, viewMonth);
  const today = 18; // simulated today

  const eventDays = new Set(events.map(e => e.calendarDay));

  const prevMonth = () => {
    if (viewMonth === 0) { setViewMonth(11); setViewYear(y => y - 1); }
    else setViewMonth(m => m - 1);
  };
  const nextMonth = () => {
    if (viewMonth === 11) { setViewMonth(0); setViewYear(y => y + 1); }
    else setViewMonth(m => m + 1);
  };

  return (
    <div style={{ padding: '40px', minHeight: '100%' }}>

      {/* Header */}
      <div style={{ marginBottom: '32px' }}>
        <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '8px' }}>
          AGENDA
        </p>
        <h1 style={{ fontSize: '28px', fontWeight: '700', color: '#ffffff' }}>Calendario</h1>
      </div>

      <div style={{ display: 'grid', gridTemplateColumns: '1fr 340px', gap: '24px', alignItems: 'start' }}>

        {/* === CALENDAR === */}
        <div style={{
          background: '#1a1a1a',
          border: '1px solid #333333',
          borderRadius: '12px',
          padding: '24px',
        }}>
          {/* Month Nav */}
          <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', marginBottom: '24px' }}>
            <button
              onClick={prevMonth}
              style={{ background: 'none', border: 'none', cursor: 'pointer', color: '#888888', padding: '4px', display: 'flex', alignItems: 'center' }}
            >
              <ChevronLeft size={18} />
            </button>
            <span style={{ fontSize: '15px', fontWeight: '700', color: '#ffffff', letterSpacing: '0.05em' }}>
              {MONTH_NAMES[viewMonth]} {viewYear}
            </span>
            <button
              onClick={nextMonth}
              style={{ background: 'none', border: 'none', cursor: 'pointer', color: '#888888', padding: '4px', display: 'flex', alignItems: 'center' }}
            >
              <ChevronRight size={18} />
            </button>
          </div>

          {/* Day headers */}
          <div style={{ display: 'grid', gridTemplateColumns: 'repeat(7, 1fr)', marginBottom: '8px' }}>
            {DAYS.map(d => (
              <div key={d} style={{ textAlign: 'center', fontSize: '11px', fontWeight: '600', color: '#555555', padding: '4px 0', letterSpacing: '0.04em' }}>
                {d}
              </div>
            ))}
          </div>

          {/* Day cells */}
          <div style={{ display: 'grid', gridTemplateColumns: 'repeat(7, 1fr)', gap: '2px' }}>
            {cells.map((day, i) => {
              if (!day) return <div key={`empty-${i}`} />;
              const isToday = day === today && viewMonth === 5 && viewYear === 2026;
              const isSelected = day === selectedDay;
              const hasEvent = eventDays.has(day);

              return (
                <div
                  key={day}
                  onClick={() => setSelectedDay(day)}
                  style={{
                    position: 'relative',
                    display: 'flex',
                    flexDirection: 'column',
                    alignItems: 'center',
                    justifyContent: 'center',
                    height: '44px',
                    borderRadius: '8px',
                    cursor: 'pointer',
                    background: isToday
                      ? '#ffffff'
                      : isSelected
                        ? '#333333'
                        : 'transparent',
                    border: isToday ? '2px solid #ffffff' : isSelected ? '1px solid #555555' : '1px solid transparent',
                    color: isToday ? '#000000' : '#ffffff',
                    fontSize: '14px',
                    fontWeight: isToday ? '700' : '400',
                    transition: 'background 0.1s ease',
                  }}
                  onMouseEnter={(e) => {
                    if (!isToday && !isSelected) {
                      (e.currentTarget as HTMLElement).style.background = '#2a2a2a';
                    }
                  }}
                  onMouseLeave={(e) => {
                    if (!isToday && !isSelected) {
                      (e.currentTarget as HTMLElement).style.background = 'transparent';
                    }
                  }}
                >
                  {day}
                  {hasEvent && (
                    <span style={{
                      position: 'absolute',
                      bottom: '5px',
                      width: '4px',
                      height: '4px',
                      borderRadius: '50%',
                      background: isToday ? '#000000' : '#888888',
                    }} />
                  )}
                </div>
              );
            })}
          </div>

          {/* Legend */}
          <div style={{ display: 'flex', gap: '20px', marginTop: '20px', paddingTop: '16px', borderTop: '1px solid #222222' }}>
            {(['Ensayo', 'Concierto', 'Estudio', 'Reunión'] as Event['type'][]).map(type => (
              <div key={type} style={{ display: 'flex', alignItems: 'center', gap: '6px', fontSize: '12px', color: '#888888' }}>
                <span style={{ width: '8px', height: '8px', borderRadius: '50%', background: EVENT_COLORS[type], display: 'inline-block' }} />
                {type}
              </div>
            ))}
          </div>
        </div>

        {/* === EVENT LIST === */}
        <div>
          <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '16px' }}>
            <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888' }}>
              DESDE EL 12 JUN
            </p>
            <span style={{ fontSize: '12px', color: '#888888', cursor: 'pointer', textDecoration: 'underline' }}>Ver todos</span>
          </div>

          <div style={{ display: 'flex', flexDirection: 'column', gap: '10px' }}>
            {events.map((ev) => (
              <div
                key={ev.id}
                style={{
                  background: '#1a1a1a',
                  border: '1px solid #333333',
                  borderRadius: '12px',
                  padding: '14px 16px',
                  display: 'flex',
                  gap: '14px',
                  transition: 'border-color 0.15s ease',
                  cursor: 'pointer',
                }}
                onMouseEnter={(e) => { (e.currentTarget as HTMLElement).style.borderColor = '#555555'; }}
                onMouseLeave={(e) => { (e.currentTarget as HTMLElement).style.borderColor = '#333333'; }}
              >
                {/* Date badge */}
                <div style={{ textAlign: 'center', minWidth: '36px', flexShrink: 0 }}>
                  <div style={{ fontSize: '10px', fontWeight: '600', color: '#888888', letterSpacing: '0.04em' }}>{ev.monthStr}</div>
                  <div style={{ fontSize: '20px', fontWeight: '700', color: '#ffffff', lineHeight: '1.1' }}>{ev.dayNum}</div>
                </div>
                <div style={{ flex: 1 }}>
                  <div style={{ fontSize: '14px', fontWeight: '600', color: '#ffffff', marginBottom: '6px' }}>{ev.title}</div>
                  <div style={{ display: 'flex', flexDirection: 'column', gap: '3px', marginBottom: '8px' }}>
                    <span style={{ fontSize: '12px', color: '#888888', display: 'flex', alignItems: 'center', gap: '5px' }}>
                      <Clock size={11} /> {ev.time}
                    </span>
                    <span style={{ fontSize: '12px', color: '#888888', display: 'flex', alignItems: 'center', gap: '5px' }}>
                      <MapPin size={11} /> {ev.location}
                    </span>
                  </div>
                  <span style={{
                    display: 'inline-flex',
                    alignItems: 'center',
                    padding: '3px 10px',
                    borderRadius: '20px',
                    fontSize: '11px',
                    fontWeight: '500',
                    background: '#222222',
                    border: '1px solid #333333',
                    color: EVENT_COLORS[ev.type],
                  }}>
                    {ev.type}
                  </span>
                </div>
              </div>
            ))}
          </div>
        </div>

      </div>
    </div>
  );
}
