import { useLocation } from 'react-router-dom';
import { X } from 'lucide-react';

const routeNames: Record<string, string> = {
  '/': 'Inicio',
  '/calendario': 'Calendario',
  '/album': 'Álbum',
  '/foro': 'Foro',
  '/shows': 'Shows',
  '/admin': 'Administración',
  '/configuracion': 'Configuración',
};

function getCurrentDate(): string {
  const now = new Date();
  const months = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
  return `${months[now.getMonth()]} ${now.getFullYear()}`;
}

export default function Header() {
  const location = useLocation();
  const pageName = routeNames[location.pathname] || '';
  const dateStr = getCurrentDate();

  return (
    <header style={{
      height: '48px',
      background: '#0d0d0d',
      borderBottom: '1px solid #222222',
      display: 'flex',
      alignItems: 'center',
      justifyContent: 'space-between',
      padding: '0 24px',
      position: 'fixed',
      top: 0,
      left: '200px',
      right: 0,
      zIndex: 99,
    }}>

      {/* Breadcrumb */}
      <div style={{ display: 'flex', alignItems: 'center', gap: '8px', fontSize: '13px' }}>
        <X size={14} style={{ color: '#555555', flexShrink: 0 }} />
        <span style={{ color: '#666666' }}>UMC App</span>
        <span style={{ color: '#444444' }}>/</span>
        <span style={{ color: '#ffffff', fontWeight: '500' }}>{pageName}</span>
      </div>

      {/* Right side */}
      <div style={{ display: 'flex', alignItems: 'center', gap: '16px' }}>
        <span style={{ fontSize: '13px', color: '#666666' }}>{dateStr}</span>
        <div style={{
          width: '28px',
          height: '28px',
          borderRadius: '50%',
          background: '#333333',
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'center',
          fontSize: '10px',
          fontWeight: '600',
          color: '#ffffff',
          cursor: 'pointer',
          border: '1px solid #444444',
          transition: 'border-color 0.15s ease',
        }}
        onMouseEnter={(e) => {
          (e.currentTarget as HTMLElement).style.borderColor = '#666666';
        }}
        onMouseLeave={(e) => {
          (e.currentTarget as HTMLElement).style.borderColor = '#444444';
        }}
        >
          MR
        </div>
      </div>

    </header>
  );
}
