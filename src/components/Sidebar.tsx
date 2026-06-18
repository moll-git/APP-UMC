import React from 'react';
import { NavLink, useLocation } from 'react-router-dom';
import {
  Home,
  Calendar,
  Image,
  MessageSquare,
  Music,
  Shield,
  Settings,
} from 'lucide-react';

interface NavItem {
  id: string;
  label: string;
  path: string;
  icon: React.ReactNode;
  badge?: number;
}

const mainNav: NavItem[] = [
  { id: 'inicio', label: 'Inicio', path: '/', icon: <Home size={16} /> },
  { id: 'calendario', label: 'Calendario', path: '/calendario', icon: <Calendar size={16} /> },
  { id: 'album', label: 'Álbum', path: '/album', icon: <Image size={16} /> },
  { id: 'foro', label: 'Foro', path: '/foro', icon: <MessageSquare size={16} />, badge: 12 },
  { id: 'shows', label: 'Shows', path: '/shows', icon: <Music size={16} /> },
];

const secondaryNav: NavItem[] = [
  { id: 'admin', label: 'Administración', path: '/admin', icon: <Shield size={16} /> },
  { id: 'config', label: 'Configuración', path: '/configuracion', icon: <Settings size={16} /> },
];

export default function Sidebar() {
  const location = useLocation();

  const isActive = (path: string) => {
    if (path === '/') return location.pathname === '/';
    return location.pathname.startsWith(path);
  };

  return (
    <aside style={{
      width: '200px',
      minWidth: '200px',
      height: '100vh',
      background: '#111111',
      borderRight: '1px solid #222222',
      display: 'flex',
      flexDirection: 'column',
      position: 'fixed',
      left: 0,
      top: 0,
      zIndex: 100,
      overflowY: 'auto',
    }}>

      {/* Logo */}
      <div style={{ padding: '16px 16px 12px', borderBottom: '1px solid #222222' }}>
        <div style={{ display: 'flex', alignItems: 'center', gap: '10px' }}>
          <div style={{
            width: '32px',
            height: '32px',
            background: '#ffffff',
            borderRadius: '8px',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            fontSize: '12px',
            fontWeight: '700',
            color: '#000000',
            flexShrink: 0,
          }}>
            UMC
          </div>
          <div>
            <div style={{ fontSize: '13px', fontWeight: '600', color: '#ffffff', lineHeight: '1.2' }}>UMC App</div>
            <div style={{ fontSize: '10px', color: '#666666', lineHeight: '1.2' }}>Banda Musical</div>
          </div>
        </div>
      </div>

      {/* Main Nav */}
      <nav style={{ padding: '8px', flex: 1 }}>
        {mainNav.map((item) => (
          <NavLink
            key={item.id}
            to={item.path}
            end={item.path === '/'}
            style={{ textDecoration: 'none' }}
          >
            <div style={{
              display: 'flex',
              alignItems: 'center',
              gap: '10px',
              padding: '10px 12px',
              borderRadius: '8px',
              margin: '2px 0',
              background: isActive(item.path) ? '#333333' : 'transparent',
              color: isActive(item.path) ? '#ffffff' : '#888888',
              cursor: 'pointer',
              transition: 'background 0.15s ease, color 0.15s ease',
              fontSize: '14px',
              fontWeight: isActive(item.path) ? '500' : '400',
              position: 'relative',
            }}
            onMouseEnter={(e) => {
              if (!isActive(item.path)) {
                (e.currentTarget as HTMLElement).style.background = '#222222';
                (e.currentTarget as HTMLElement).style.color = '#cccccc';
              }
            }}
            onMouseLeave={(e) => {
              if (!isActive(item.path)) {
                (e.currentTarget as HTMLElement).style.background = 'transparent';
                (e.currentTarget as HTMLElement).style.color = '#888888';
              }
            }}
            >
              <span style={{ color: isActive(item.path) ? '#ffffff' : '#666666', display: 'flex' }}>
                {item.icon}
              </span>
              <span style={{ flex: 1 }}>{item.label}</span>
              {item.badge && (
                <span style={{
                  background: '#cc0000',
                  color: '#ffffff',
                  fontSize: '10px',
                  fontWeight: '600',
                  padding: '1px 6px',
                  borderRadius: '10px',
                  minWidth: '18px',
                  textAlign: 'center',
                }}>
                  {item.badge}
                </span>
              )}
            </div>
          </NavLink>
        ))}

        {/* Separator */}
        <div style={{ height: '1px', background: '#222222', margin: '8px 4px' }} />

        {secondaryNav.map((item) => (
          <NavLink
            key={item.id}
            to={item.path}
            style={{ textDecoration: 'none' }}
          >
            <div style={{
              display: 'flex',
              alignItems: 'center',
              gap: '10px',
              padding: '10px 12px',
              borderRadius: '8px',
              margin: '2px 0',
              background: isActive(item.path) ? '#333333' : 'transparent',
              color: isActive(item.path) ? '#ffffff' : '#888888',
              cursor: 'pointer',
              transition: 'background 0.15s ease, color 0.15s ease',
              fontSize: '14px',
              fontWeight: isActive(item.path) ? '500' : '400',
            }}
            onMouseEnter={(e) => {
              if (!isActive(item.path)) {
                (e.currentTarget as HTMLElement).style.background = '#222222';
                (e.currentTarget as HTMLElement).style.color = '#cccccc';
              }
            }}
            onMouseLeave={(e) => {
              if (!isActive(item.path)) {
                (e.currentTarget as HTMLElement).style.background = 'transparent';
                (e.currentTarget as HTMLElement).style.color = '#888888';
              }
            }}
            >
              <span style={{ color: isActive(item.path) ? '#ffffff' : '#666666', display: 'flex' }}>
                {item.icon}
              </span>
              <span>{item.label}</span>
            </div>
          </NavLink>
        ))}
      </nav>

      {/* Separator */}
      <div style={{ height: '1px', background: '#222222', margin: '0 8px' }} />

      {/* User Card */}
      <div style={{ padding: '12px' }}>
        <div style={{
          display: 'flex',
          alignItems: 'center',
          gap: '10px',
          padding: '10px 12px',
          borderRadius: '8px',
          background: '#1a1a1a',
          border: '1px solid #222222',
          cursor: 'pointer',
        }}>
          <div style={{
            width: '28px',
            height: '28px',
            borderRadius: '50%',
            background: '#444444',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            fontSize: '10px',
            fontWeight: '600',
            color: '#ffffff',
            flexShrink: 0,
          }}>
            MR
          </div>
          <div>
            <div style={{ fontSize: '13px', fontWeight: '500', color: '#ffffff', lineHeight: '1.2' }}>Miguel R.</div>
            <div style={{ fontSize: '11px', color: '#666666', lineHeight: '1.2' }}>Guitarra</div>
          </div>
        </div>
      </div>

    </aside>
  );
}
