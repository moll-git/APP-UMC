import { Link } from 'react-router-dom';
import { Calendar, Image, MessageSquare, Music, Shield, ChevronRight, MapPin, Clock } from 'lucide-react';
import { recentActivity, events } from '@/data';

const sections = [
  {
    id: 'calendario',
    path: '/calendario',
    icon: <Calendar size={24} color="#888888" />,
    title: 'Calendario',
    desc: 'Eventos, ensayos y fechas clave',
  },
  {
    id: 'album',
    path: '/album',
    icon: <Image size={24} color="#888888" />,
    title: 'Álbum',
    desc: 'Fotos y videos del grupo',
  },
  {
    id: 'foro',
    path: '/foro',
    icon: <MessageSquare size={24} color="#888888" />,
    title: 'Foro',
    desc: 'Preguntas, debates y propuestas',
  },
  {
    id: 'conciertos',
    path: '/shows',
    icon: <Music size={24} color="#888888" />,
    title: 'Conciertos',
    desc: 'Actuaciones y repertorio',
  },
];

const upcomingConcert = events.find(e => e.id === 'ev4')!;
const upcomingEnsayo = events.find(e => e.id === 'ev2')!;

export default function Home() {
  return (
    <div style={{ maxWidth: '1200px', margin: '0 auto', padding: '40px 40px' }}>

      {/* === SECCIÓN 1: BIENVENIDA === */}
      <div style={{ marginBottom: '40px' }}>
        <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start' }}>
          <div>
            <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '8px' }}>
              PANEL PRINCIPAL
            </p>
            <h1 style={{ fontSize: '32px', fontWeight: '700', color: '#ffffff', marginBottom: '8px', lineHeight: 1.2 }}>
              Bienvenido, Miguel
            </h1>
            <p style={{ fontSize: '14px', color: '#999999' }}>
              Aquí tienes un resumen de la actividad de UMC.
            </p>
          </div>
          <div style={{ display: 'flex', alignItems: 'center', gap: '6px', fontSize: '13px', color: '#00ff88', paddingTop: '8px' }}>
            <span style={{ width: '8px', height: '8px', borderRadius: '50%', background: '#00ff88', display: 'inline-block' }} />
            4 miembros activos
          </div>
        </div>
      </div>

      {/* === SECCIÓN 2: SECCIONES 4 CARDS === */}
      <div style={{ marginBottom: '24px' }}>
        <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '16px' }}>
          SECCIONES
        </p>
        <div style={{ display: 'grid', gridTemplateColumns: 'repeat(4, 1fr)', gap: '16px' }}>
          {sections.map((s) => (
            <div
              key={s.id}
              style={{
                background: '#1a1a1a',
                border: '1px solid #333333',
                borderRadius: '12px',
                padding: '20px',
                cursor: 'pointer',
                transition: 'border-color 0.15s ease, background 0.15s ease',
              }}
              onMouseEnter={(e) => {
                (e.currentTarget as HTMLElement).style.borderColor = '#555555';
                (e.currentTarget as HTMLElement).style.background = '#222222';
              }}
              onMouseLeave={(e) => {
                (e.currentTarget as HTMLElement).style.borderColor = '#333333';
                (e.currentTarget as HTMLElement).style.background = '#1a1a1a';
              }}
            >
              <div style={{ marginBottom: '12px' }}>{s.icon}</div>
              <div style={{ fontSize: '15px', fontWeight: '600', color: '#ffffff', marginBottom: '6px' }}>{s.title}</div>
              <div style={{ fontSize: '13px', color: '#777777', marginBottom: '14px', lineHeight: 1.4 }}>{s.desc}</div>
              <Link
                to={s.path}
                style={{ fontSize: '13px', color: '#aaaaaa', textDecoration: 'none', display: 'inline-flex', alignItems: 'center', gap: '4px' }}
              >
                Abrir →
              </Link>
            </div>
          ))}
        </div>
      </div>

      {/* === SECCIÓN 3: ADMINISTRACIÓN === */}
      <div style={{ marginBottom: '32px' }}>
        <div
          style={{
            background: '#1a1a1a',
            border: '1px solid #333333',
            borderRadius: '12px',
            padding: '20px 24px',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'space-between',
            cursor: 'pointer',
            transition: 'border-color 0.15s ease, background 0.15s ease',
          }}
          onMouseEnter={(e) => {
            (e.currentTarget as HTMLElement).style.borderColor = '#555555';
            (e.currentTarget as HTMLElement).style.background = '#222222';
          }}
          onMouseLeave={(e) => {
            (e.currentTarget as HTMLElement).style.borderColor = '#333333';
            (e.currentTarget as HTMLElement).style.background = '#1a1a1a';
          }}
        >
          <div style={{ display: 'flex', alignItems: 'center', gap: '16px' }}>
            <div style={{
              width: '36px', height: '36px', borderRadius: '8px',
              background: '#2a2a2a', border: '1px solid #444444',
              display: 'flex', alignItems: 'center', justifyContent: 'center',
            }}>
              <Shield size={18} color="#888888" />
            </div>
            <div>
              <div style={{ fontSize: '15px', fontWeight: '600', color: '#ffffff', marginBottom: '2px' }}>Administración</div>
              <div style={{ fontSize: '13px', color: '#777777' }}>Gestión de miembros, anuncios, moderación y más</div>
            </div>
          </div>
          <ChevronRight size={20} color="#555555" />
        </div>
      </div>

      {/* === SECCIONES 4+5 en grid 2 cols === */}
      <div style={{ display: 'grid', gridTemplateColumns: '1fr 1fr', gap: '24px' }}>

        {/* SECCIÓN 4: PRÓXIMAMENTE */}
        <div>
          <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '16px' }}>
            PRÓXIMAMENTE
          </p>

          {/* Próximo Concierto */}
          <div style={{
            background: '#1a1a1a',
            border: '1px solid #333333',
            borderRadius: '12px',
            padding: '18px 20px',
            marginBottom: '12px',
            display: 'flex',
            gap: '14px',
            alignItems: 'flex-start',
          }}>
            <div style={{
              width: '36px', height: '36px', borderRadius: '50%',
              background: '#333333', display: 'flex',
              alignItems: 'center', justifyContent: 'center', flexShrink: 0,
            }}>
              <Music size={16} color="#ffffff" />
            </div>
            <div>
              <p style={{ fontSize: '10px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '4px' }}>
                PRÓXIMO CONCIERTO
              </p>
              <p style={{ fontSize: '15px', fontWeight: '600', color: '#ffffff', marginBottom: '8px' }}>
                Festival de Primavera
              </p>
              <div style={{ display: 'flex', flexDirection: 'column', gap: '3px' }}>
                <span style={{ fontSize: '12px', color: '#888888', display: 'flex', alignItems: 'center', gap: '5px' }}>
                  <span style={{ color: '#00ff88' }}>●</span> 20 Jun 2026 19:30
                </span>
                <span style={{ fontSize: '12px', color: '#888888', display: 'flex', alignItems: 'center', gap: '5px' }}>
                  <span style={{ color: '#00ff88' }}>●</span> Plaza Mayor, Madrid
                </span>
              </div>
            </div>
          </div>

          {/* Próximo Ensayo */}
          <div style={{
            background: '#1a1a1a',
            border: '1px solid #333333',
            borderRadius: '12px',
            padding: '18px 20px',
            display: 'flex',
            gap: '14px',
            alignItems: 'flex-start',
          }}>
            <div style={{
              width: '36px', height: '36px', borderRadius: '8px',
              background: '#222222', border: '1px solid #333333',
              display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0,
            }}>
              <Calendar size={16} color="#666666" />
            </div>
            <div>
              <p style={{ fontSize: '10px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '4px' }}>
                PRÓXIMO ENSAYO
              </p>
              <p style={{ fontSize: '15px', fontWeight: '600', color: '#ffffff', marginBottom: '8px' }}>
                Ensayo general — Setlist Festival
              </p>
              <div style={{ display: 'flex', flexDirection: 'column', gap: '3px' }}>
                <span style={{ fontSize: '12px', color: '#888888', display: 'flex', alignItems: 'center', gap: '5px' }}>
                  <span style={{ color: '#888888' }}>●</span> Vie 14 Jun 2026 19:00
                </span>
                <span style={{ fontSize: '12px', color: '#888888', display: 'flex', alignItems: 'center', gap: '5px' }}>
                  <span style={{ color: '#888888' }}>●</span> Sala de ensayo A
                </span>
              </div>
            </div>
          </div>
        </div>

        {/* SECCIÓN 5: ACTIVIDAD RECIENTE */}
        <div>
          <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '16px' }}>
            ACTIVIDAD RECIENTE
          </p>
          <div style={{
            background: '#1a1a1a',
            border: '1px solid #333333',
            borderRadius: '12px',
            overflow: 'hidden',
          }}>
            {recentActivity.map((item, idx) => (
              <div
                key={item.id}
                style={{
                  display: 'flex',
                  alignItems: 'center',
                  gap: '12px',
                  padding: '14px 16px',
                  borderBottom: idx < recentActivity.length - 1 ? '1px solid #222222' : 'none',
                }}
              >
                <div style={{
                  width: '28px', height: '28px', borderRadius: '50%',
                  background: '#333333', display: 'flex',
                  alignItems: 'center', justifyContent: 'center',
                  fontSize: '10px', fontWeight: '600', color: '#ffffff', flexShrink: 0,
                }}>
                  {item.userInitials}
                </div>
                <div style={{ flex: 1, minWidth: 0 }}>
                  <p style={{ fontSize: '13px', color: '#cccccc', lineHeight: 1.4 }}>
                    <strong style={{ color: '#ffffff' }}>{item.userName}</strong>{' '}
                    {item.action}{' '}
                    <strong style={{ color: '#ffffff' }}>{item.target}</strong>
                  </p>
                </div>
                <span style={{ fontSize: '11px', color: '#555555', flexShrink: 0 }}>{item.time}</span>
              </div>
            ))}
          </div>
        </div>

      </div>
    </div>
  );
}
