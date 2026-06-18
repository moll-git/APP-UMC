import { useState } from 'react';
import { Users, Calendar, MessageSquare, ChevronRight, Shield, Megaphone, AlertCircle, Image, Bell, FileText } from 'lucide-react';

type AdminAction = {
  id: string;
  icon: React.ReactNode;
  label: string;
  badge?: { text: string; color: string };
};

const ADMIN_ACTIONS: AdminAction[] = [
  { id: 'members', icon: <Users size={16} />, label: 'Gestionar miembros', badge: { text: '4 activos', color: '#00ff88' } },
  { id: 'announce', icon: <Megaphone size={16} />, label: 'Publicar anuncio' },
  { id: 'moderate', icon: <AlertCircle size={16} />, label: 'Moderar foro', badge: { text: '2 reportes', color: '#ff6633' } },
  { id: 'album', icon: <Image size={16} />, label: 'Gestionar álbum', badge: { text: '1 pendiente', color: '#4488ff' } },
  { id: 'notify', icon: <Bell size={16} />, label: 'Enviar notificación' },
  { id: 'reports', icon: <FileText size={16} />, label: 'Ver informes' },
];

const MEMBERS = [
  { initials: 'MR', name: 'Miguel Rodríguez', role: 'Guitarra', isAdmin: true },
  { initials: 'AN', name: 'Ana García', role: 'Voz', isAdmin: false },
  { initials: 'LP', name: 'Laura Pérez', role: 'Batería', isAdmin: false },
  { initials: 'JM', name: 'Javier Martín', role: 'Bajo', isAdmin: false },
];

function MembersPanel() {
  return (
    <div>
      <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '20px' }}>
        <h2 style={{ fontSize: '18px', fontWeight: '700', color: '#ffffff' }}>Miembros</h2>
        <button style={{
          padding: '8px 16px', background: '#ffffff', color: '#000000',
          border: 'none', borderRadius: '8px', fontSize: '13px', fontWeight: '600', cursor: 'pointer',
        }}>+ Añadir</button>
      </div>
      <div style={{ display: 'flex', flexDirection: 'column', gap: '8px' }}>
        {MEMBERS.map(m => (
          <div key={m.initials} style={{
            background: '#1a1a1a', border: '1px solid #2a2a2a', borderRadius: '10px',
            padding: '14px 16px', display: 'flex', alignItems: 'center', gap: '12px',
          }}>
            <div style={{
              width: '36px', height: '36px', borderRadius: '50%', background: '#333333',
              display: 'flex', alignItems: 'center', justifyContent: 'center',
              fontSize: '12px', fontWeight: '600', color: '#ffffff', flexShrink: 0,
            }}>{m.initials}</div>
            <div style={{ flex: 1 }}>
              <div style={{ fontSize: '14px', fontWeight: '600', color: '#ffffff' }}>{m.name}</div>
              <div style={{ fontSize: '12px', color: '#666666' }}>{m.role}</div>
            </div>
            {m.isAdmin && (
              <span style={{
                fontSize: '11px', color: '#00ff88', background: '#00ff8820',
                border: '1px solid #00ff8840', padding: '2px 8px', borderRadius: '10px',
              }}>Admin</span>
            )}
          </div>
        ))}
      </div>
    </div>
  );
}

function AnnouncePanel() {
  const [text, setText] = useState('');
  return (
    <div>
      <h2 style={{ fontSize: '18px', fontWeight: '700', color: '#ffffff', marginBottom: '20px' }}>Publicar anuncio</h2>
      <div style={{ display: 'flex', flexDirection: 'column', gap: '16px' }}>
        <div>
          <label style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.06em', textTransform: 'uppercase', color: '#888888', display: 'block', marginBottom: '8px' }}>MENSAJE</label>
          <textarea
            value={text}
            onChange={e => setText(e.target.value)}
            placeholder="Escribe el anuncio para toda la banda..."
            rows={5}
            style={{
              width: '100%', background: '#1a1a1a', border: '1px solid #333333',
              borderRadius: '8px', padding: '12px', color: '#ffffff',
              fontSize: '14px', fontFamily: 'inherit', outline: 'none', resize: 'vertical',
            }}
            onFocus={e => { (e.target as HTMLElement).style.borderColor = '#555555'; }}
            onBlur={e => { (e.target as HTMLElement).style.borderColor = '#333333'; }}
          />
        </div>
        <button style={{
          background: '#ffffff', color: '#000000', padding: '12px 24px',
          borderRadius: '8px', fontWeight: '600', fontSize: '14px', border: 'none', cursor: 'pointer',
          alignSelf: 'flex-start',
        }}>Publicar</button>
      </div>
    </div>
  );
}

function PlaceholderPanel({ label }: { label: string }) {
  return (
    <div style={{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'center', height: '200px', gap: '12px' }}>
      <div style={{ color: '#333333' }}><FileText size={32} /></div>
      <p style={{ fontSize: '14px', color: '#555555' }}>{label} — próximamente</p>
    </div>
  );
}

export default function Admin() {
  const [selectedAction, setSelectedAction] = useState<string | null>(null);

  const renderDetail = () => {
    switch (selectedAction) {
      case 'members': return <MembersPanel />;
      case 'announce': return <AnnouncePanel />;
      default: return (
        <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'center', height: '100%', minHeight: '200px' }}>
          <p style={{ fontSize: '14px', color: '#555555' }}>Selecciona una acción del panel izquierdo</p>
        </div>
      );
    }
  };

  return (
    <div style={{ display: 'flex', height: '100%', minHeight: 'calc(100vh - 48px)' }}>

      {/* Left panel */}
      <div style={{
        width: '280px', minWidth: '280px',
        borderRight: '1px solid #222222',
        padding: '24px 0', overflowY: 'auto',
      }}>
        {/* Role switcher */}
        <div style={{ padding: '0 16px 20px' }}>
          <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '12px' }}>
            ACCESO ACTUAL
          </p>
          <div style={{ display: 'flex', gap: '8px' }}>
            <button style={{
              display: 'flex', alignItems: 'center', gap: '6px',
              padding: '8px 14px', borderRadius: '8px',
              background: '#ffffff', color: '#000000',
              border: 'none', fontSize: '13px', fontWeight: '600', cursor: 'pointer',
            }}>
              <Shield size={14} /> Administrador
            </button>
            <button style={{
              display: 'flex', alignItems: 'center', gap: '6px',
              padding: '8px 14px', borderRadius: '8px',
              background: 'transparent', color: '#888888',
              border: '1px solid #333333', fontSize: '13px', cursor: 'pointer',
            }}>
              <Users size={14} /> Miembro
            </button>
          </div>
        </div>

        {/* Stats */}
        <div style={{ padding: '16px', margin: '0 16px 20px', background: '#1a1a1a', borderRadius: '12px', border: '1px solid #2a2a2a' }}>
          <div style={{ display: 'grid', gridTemplateColumns: 'repeat(3, 1fr)', textAlign: 'center', gap: '8px' }}>
            {[{ val: 4, label: 'MIEMBROS' }, { val: 5, label: 'EVENTOS' }, { val: 12, label: 'HILOS' }].map(s => (
              <div key={s.label}>
                <div style={{ fontSize: '24px', fontWeight: '700', color: '#ffffff' }}>{s.val}</div>
                <div style={{ fontSize: '9px', fontWeight: '600', letterSpacing: '0.05em', color: '#555555' }}>{s.label}</div>
              </div>
            ))}
          </div>
        </div>

        {/* Actions */}
        <div style={{ padding: '0 8px' }}>
          {ADMIN_ACTIONS.map(action => {
            const isActive = selectedAction === action.id;
            return (
              <div
                key={action.id}
                onClick={() => setSelectedAction(action.id)}
                style={{
                  display: 'flex', alignItems: 'center', gap: '12px',
                  padding: '12px', borderRadius: '8px', margin: '2px 0',
                  cursor: 'pointer',
                  background: isActive ? '#2a2a2a' : 'transparent',
                  border: isActive ? '1px solid #444444' : '1px solid transparent',
                  transition: 'background 0.1s ease',
                }}
                onMouseEnter={e => { if (!isActive) (e.currentTarget as HTMLElement).style.background = '#1a1a1a'; }}
                onMouseLeave={e => { if (!isActive) (e.currentTarget as HTMLElement).style.background = 'transparent'; }}
              >
                <span style={{ color: isActive ? '#ffffff' : '#666666', display: 'flex' }}>{action.icon}</span>
                <span style={{ flex: 1, fontSize: '14px', color: isActive ? '#ffffff' : '#aaaaaa', fontWeight: isActive ? '500' : '400' }}>
                  {action.label}
                </span>
                {action.badge && (
                  <span style={{
                    fontSize: '10px', padding: '2px 8px', borderRadius: '10px',
                    background: action.badge.color + '20', color: action.badge.color,
                    border: `1px solid ${action.badge.color}40`,
                  }}>
                    {action.badge.text}
                  </span>
                )}
                <ChevronRight size={14} color="#444444" />
              </div>
            );
          })}
        </div>
      </div>

      {/* Right detail */}
      <div style={{ flex: 1, padding: '32px 40px', overflowY: 'auto' }}>
        {renderDetail()}
      </div>
    </div>
  );
}
