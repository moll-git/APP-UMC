import { useState } from 'react';
import { MapPin, Clock, Music2, ExternalLink } from 'lucide-react';
import { shows } from '@/data';
import type { Show } from '@/types';

const statusColors: Record<string, string> = {
  'En preparación': '#00ff88',
  'Próximo': '#4488ff',
  'Pasado': '#555555',
};

const statusGroups = [
  { key: 'En preparación', label: 'EN PREPARACIÓN' },
  { key: 'Próximo', label: 'PRÓXIMOS' },
  { key: 'Pasado', label: 'PASADOS' },
] as const;

export default function Shows() {
  const [selectedShow, setSelectedShow] = useState<Show>(shows[0]);

  return (
    <div style={{ display: 'flex', height: '100%', minHeight: 'calc(100vh - 48px)' }}>

      {/* === LEFT SIDEBAR — show list === */}
      <div style={{
        width: '280px',
        minWidth: '280px',
        background: '#111111',
        borderRight: '1px solid #222222',
        overflowY: 'auto',
        padding: '24px 0',
      }}>
        <div style={{ padding: '0 16px 16px' }}>
          <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '4px' }}>
            AGENDA MUSICAL
          </p>
          <h2 style={{ fontSize: '20px', fontWeight: '700', color: '#ffffff' }}>Conciertos</h2>
        </div>

        {statusGroups.map(({ key, label }) => {
          const group = shows.filter(s => s.status === key);
          if (!group.length) return null;
          return (
            <div key={key} style={{ marginBottom: '8px' }}>
              <div style={{
                padding: '6px 16px',
                fontSize: '10px',
                fontWeight: '600',
                letterSpacing: '0.08em',
                color: '#555555',
                display: 'flex',
                alignItems: 'center',
                gap: '6px',
              }}>
                <span style={{ width: '6px', height: '6px', borderRadius: '50%', background: statusColors[key], display: 'inline-block' }} />
                {label}
              </div>
              {group.map(show => {
                const isActive = selectedShow.id === show.id;
                return (
                  <div
                    key={show.id}
                    onClick={() => setSelectedShow(show)}
                    style={{
                      padding: '12px 16px',
                      margin: '2px 8px',
                      borderRadius: '8px',
                      cursor: 'pointer',
                      background: isActive ? '#2a2a2a' : 'transparent',
                      border: isActive ? '1px solid #444444' : '1px solid transparent',
                      transition: 'background 0.1s ease',
                    }}
                    onMouseEnter={(e) => {
                      if (!isActive) (e.currentTarget as HTMLElement).style.background = '#1a1a1a';
                    }}
                    onMouseLeave={(e) => {
                      if (!isActive) (e.currentTarget as HTMLElement).style.background = 'transparent';
                    }}
                  >
                    <div style={{ display: 'flex', gap: '12px', alignItems: 'flex-start' }}>
                      <div style={{
                        textAlign: 'center', minWidth: '32px', flexShrink: 0,
                        background: '#222222', borderRadius: '6px', padding: '4px',
                      }}>
                        <div style={{ fontSize: '9px', fontWeight: '600', color: '#666666', letterSpacing: '0.04em' }}>{show.month}</div>
                        <div style={{ fontSize: '16px', fontWeight: '700', color: show.status === 'Pasado' ? '#555555' : '#ffffff', lineHeight: 1.1 }}>{show.day}</div>
                      </div>
                      <div>
                        <div style={{ fontSize: '13px', fontWeight: '600', color: show.status === 'Pasado' ? '#666666' : '#ffffff', marginBottom: '2px' }}>
                          {show.title}
                        </div>
                        <div style={{ fontSize: '11px', color: '#555555', marginBottom: '3px' }}>{show.location}</div>
                        <div style={{ fontSize: '10px', color: '#444444' }}>
                          🎵 {show.repertoire.length} obras
                        </div>
                      </div>
                    </div>
                  </div>
                );
              })}
            </div>
          );
        })}
      </div>

      {/* === RIGHT PANEL — show detail === */}
      <div style={{ flex: 1, padding: '32px 40px', overflowY: 'auto' }}>

        {/* Status badge */}
        <div style={{
          display: 'inline-flex',
          alignItems: 'center',
          gap: '6px',
          padding: '4px 12px',
          borderRadius: '20px',
          background: '#1a1a1a',
          border: '1px solid #333333',
          fontSize: '12px',
          fontWeight: '500',
          color: statusColors[selectedShow.status],
          marginBottom: '16px',
        }}>
          <span style={{ width: '6px', height: '6px', borderRadius: '50%', background: statusColors[selectedShow.status], display: 'inline-block' }} />
          {selectedShow.status}
        </div>

        <h1 style={{ fontSize: '32px', fontWeight: '700', color: '#ffffff', marginBottom: '16px', lineHeight: 1.2 }}>
          {selectedShow.title}
        </h1>

        {/* Meta info */}
        <div style={{ display: 'flex', gap: '24px', marginBottom: '32px', flexWrap: 'wrap' }}>
          <div style={{ display: 'flex', alignItems: 'center', gap: '6px', fontSize: '14px', color: '#888888' }}>
            <span style={{ fontSize: '14px' }}>📅</span> {selectedShow.date}
          </div>
          <div style={{ display: 'flex', alignItems: 'center', gap: '6px', fontSize: '14px', color: '#888888' }}>
            <Clock size={14} /> {selectedShow.time}
          </div>
          <div style={{ display: 'flex', alignItems: 'center', gap: '6px', fontSize: '14px', color: '#888888' }}>
            <MapPin size={14} /> {selectedShow.location}
          </div>
        </div>

        {/* Repertoire */}
        <div>
          <p style={{
            fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em',
            textTransform: 'uppercase', color: '#888888',
            marginBottom: '16px',
            display: 'flex', alignItems: 'center', gap: '8px',
          }}>
            <Music2 size={13} /> REPERTORIO — {selectedShow.repertoire.length} OBRAS
          </p>

          <div style={{ display: 'flex', flexDirection: 'column', gap: '8px' }}>
            {selectedShow.repertoire.map((song) => (
              <div
                key={song.id}
                style={{
                  background: '#1a1a1a',
                  border: '1px solid #333333',
                  borderRadius: '10px',
                  padding: '16px 20px',
                  display: 'flex',
                  alignItems: 'center',
                  gap: '16px',
                  transition: 'border-color 0.15s ease',
                  cursor: 'pointer',
                }}
                onMouseEnter={(e) => { (e.currentTarget as HTMLElement).style.borderColor = '#555555'; }}
                onMouseLeave={(e) => { (e.currentTarget as HTMLElement).style.borderColor = '#333333'; }}
              >
                <span style={{ fontSize: '12px', color: '#555555', minWidth: '20px', fontWeight: '600' }}>
                  {String(song.order).padStart(2, '0')}
                </span>
                <div style={{ flex: 1 }}>
                  <div style={{ fontSize: '14px', fontWeight: '600', color: '#ffffff' }}>{song.title}</div>
                  <div style={{ display: 'flex', alignItems: 'center', gap: '4px', fontSize: '12px', color: '#666666', marginTop: '2px' }}>
                    <Clock size={11} /> {song.duration}
                  </div>
                </div>
                <div style={{
                  display: 'flex', alignItems: 'center', gap: '6px',
                  fontSize: '12px', color: '#666666', cursor: 'pointer',
                  padding: '6px 10px', borderRadius: '6px',
                  border: '1px solid #333333', background: '#222222',
                  transition: 'border-color 0.15s ease, color 0.15s ease',
                }}
                onMouseEnter={(e) => {
                  (e.currentTarget as HTMLElement).style.borderColor = '#555555';
                  (e.currentTarget as HTMLElement).style.color = '#ffffff';
                }}
                onMouseLeave={(e) => {
                  (e.currentTarget as HTMLElement).style.borderColor = '#333333';
                  (e.currentTarget as HTMLElement).style.color = '#666666';
                }}
                >
                  <span style={{ fontSize: '11px' }}>▶</span>
                  Ver en YouTube
                  <ExternalLink size={10} />
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>

    </div>
  );
}
