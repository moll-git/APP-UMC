import { useState } from 'react';
import {
  User, Palette, Globe, Bell, HelpCircle, MessageSquare, Camera, CheckCircle, ChevronRight, Check
} from 'lucide-react';

type SectionId = 'cuenta' | 'tema' | 'idioma' | 'notif' | 'ayuda' | 'feedback';

type ConfigSection = {
  id: SectionId;
  label: string;
  desc: string;
  icon: React.ReactNode;
};

const configSections: ConfigSection[] = [
  { id: 'cuenta', label: 'Cuenta', desc: 'Foto, nombre y contraseña', icon: <User size={15} /> },
  { id: 'tema', label: 'Tema de color', desc: 'Apariencia de la aplicación', icon: <Palette size={15} /> },
  { id: 'idioma', label: 'Idioma', desc: 'Idioma de la interfaz', icon: <Globe size={15} /> },
  { id: 'notif', label: 'Notificaciones', desc: 'Gestionar alertas', icon: <Bell size={15} /> },
  { id: 'ayuda', label: 'Ayuda', desc: 'Preguntas frecuentes', icon: <HelpCircle size={15} /> },
  { id: 'feedback', label: 'Comentarios', desc: 'Reportar un problema', icon: <MessageSquare size={15} /> },
];

// ── CUENTA ──────────────────────────────────────────────
function CuentaSection() {
  const [name, setName] = useState('Miguel Rodríguez');
  const [instrument, setInstrument] = useState('Guitarra');
  const [saved, setSaved] = useState(false);

  const handleSave = () => {
    setSaved(true);
    setTimeout(() => setSaved(false), 2000);
  };

  return (
    <div style={{ maxWidth: '560px' }}>
      <h1 style={{ fontSize: '24px', fontWeight: '700', color: '#ffffff', marginBottom: '28px' }}>Cuenta</h1>
      <div style={{ display: 'flex', gap: '20px', alignItems: 'flex-start', marginBottom: '28px' }}>
        <div style={{ position: 'relative', flexShrink: 0 }}>
          <div style={{
            width: '72px', height: '72px', borderRadius: '50%', background: '#333333',
            display: 'flex', alignItems: 'center', justifyContent: 'center',
            fontSize: '20px', fontWeight: '700', color: '#ffffff', border: '2px solid #444444',
          }}>MR</div>
          <div style={{
            position: 'absolute', bottom: '0', right: '0', width: '22px', height: '22px',
            borderRadius: '50%', background: '#ffffff', display: 'flex', alignItems: 'center',
            justifyContent: 'center', cursor: 'pointer', border: '2px solid #0a0a0a',
          }}>
            <Camera size={11} color="#000000" />
          </div>
        </div>
        <div>
          <div style={{ fontSize: '16px', fontWeight: '600', color: '#ffffff', marginBottom: '2px' }}>Miguel Rodríguez</div>
          <div style={{ fontSize: '13px', color: '#888888', marginBottom: '6px' }}>Guitarra · UMC Banda</div>
          <div style={{ fontSize: '11px', color: '#555555' }}>Pulsa el icono para cambiar la foto</div>
        </div>
      </div>
      <div style={{ display: 'flex', flexDirection: 'column', gap: '20px' }}>
        {[
          { label: 'NOMBRE', value: name, setter: setName, readOnly: false },
          { label: 'INSTRUMENTO / ROL', value: instrument, setter: setInstrument, readOnly: false },
        ].map(field => (
          <div key={field.label}>
            <label style={{ display: 'block', fontSize: '11px', fontWeight: '600', letterSpacing: '0.06em', textTransform: 'uppercase', color: '#888888', marginBottom: '8px' }}>
              {field.label}
            </label>
            <input
              value={field.value}
              onChange={e => field.setter(e.target.value)}
              readOnly={field.readOnly}
              style={{ width: '100%', background: '#1a1a1a', border: '1px solid #333333', borderRadius: '6px', padding: '10px 12px', color: '#ffffff', fontSize: '14px', fontFamily: 'inherit', outline: 'none', transition: 'border-color 0.15s ease' }}
              onFocus={e => { (e.target as HTMLElement).style.borderColor = '#555555'; }}
              onBlur={e => { (e.target as HTMLElement).style.borderColor = '#333333'; }}
            />
          </div>
        ))}
        <div>
          <label style={{ display: 'block', fontSize: '11px', fontWeight: '600', letterSpacing: '0.06em', textTransform: 'uppercase', color: '#888888', marginBottom: '8px' }}>
            CORREO ELECTRÓNICO
          </label>
          <div style={{ position: 'relative' }}>
            <input value="miguel@umc.es" readOnly style={{ width: '100%', background: '#1a1a1a', border: '1px solid #333333', borderRadius: '6px', padding: '10px 100px 10px 12px', color: '#888888', fontSize: '14px', fontFamily: 'inherit', outline: 'none' }} />
            <div style={{ position: 'absolute', right: '8px', top: '50%', transform: 'translateY(-50%)', display: 'flex', alignItems: 'center', gap: '5px', fontSize: '12px', color: '#00aa55', background: '#0d2a1a', padding: '3px 10px', borderRadius: '20px', border: '1px solid #00aa5530' }}>
              <CheckCircle size={11} color="#00aa55" /> Verificado
            </div>
          </div>
        </div>
        <div style={{ display: 'flex', alignItems: 'center', gap: '16px', paddingTop: '8px' }}>
          <button
            onClick={handleSave}
            style={{ flex: 1, background: saved ? '#00aa55' : '#ffffff', color: saved ? '#ffffff' : '#000000', padding: '12px 32px', borderRadius: '8px', fontWeight: '600', fontSize: '14px', border: 'none', cursor: 'pointer', transition: 'all 0.2s ease' }}
          >
            {saved ? '✓ Guardado' : 'Guardar cambios'}
          </button>
          <button style={{ background: 'transparent', color: '#888888', padding: '12px 16px', borderRadius: '8px', fontWeight: '400', fontSize: '14px', border: 'none', cursor: 'pointer', textDecoration: 'underline' }}
            onMouseEnter={e => { (e.currentTarget as HTMLElement).style.color = '#ffffff'; }}
            onMouseLeave={e => { (e.currentTarget as HTMLElement).style.color = '#888888'; }}
          >
            Cambiar contraseña
          </button>
        </div>
      </div>
    </div>
  );
}

// ── TEMA DE COLOR ────────────────────────────────────────
type ThemeOption = { id: string; label: string; colors: [string, string] };
const THEMES: ThemeOption[] = [
  { id: 'dark', label: 'Oscuro', colors: ['#1a1a1a', '#333333'] },
  { id: 'slate', label: 'Pizarra azul', colors: ['#1e2a4a', '#2d4a8a'] },
  { id: 'forest', label: 'Verde bosque', colors: ['#1a3a2a', '#2a6a4a'] },
  { id: 'wine', label: 'Vino tinto', colors: ['#3a1a2a', '#8a2a5a'] },
  { id: 'light', label: 'Claro', colors: ['#f0f0f0', '#ffffff'] },
];

function TemaSection() {
  const [selectedTheme, setSelectedTheme] = useState('dark');
  return (
    <div style={{ maxWidth: '560px' }}>
      <h1 style={{ fontSize: '24px', fontWeight: '700', color: '#ffffff', marginBottom: '8px' }}>Tema de color</h1>
      <p style={{ fontSize: '14px', color: '#888888', marginBottom: '28px' }}>Seleccione la apariencia de la aplicación. El cambio se aplica al instante.</p>
      <div style={{ display: 'flex', flexDirection: 'column', gap: '10px' }}>
        {THEMES.map(theme => {
          const isSelected = selectedTheme === theme.id;
          return (
            <div
              key={theme.id}
              onClick={() => setSelectedTheme(theme.id)}
              style={{
                display: 'flex', alignItems: 'center', gap: '16px',
                padding: '16px 20px', borderRadius: '12px', cursor: 'pointer',
                background: '#1a1a1a',
                border: `1px solid ${isSelected ? '#555555' : '#2a2a2a'}`,
                transition: 'border-color 0.15s ease',
              }}
              onMouseEnter={e => { if (!isSelected) (e.currentTarget as HTMLElement).style.borderColor = '#444444'; }}
              onMouseLeave={e => { if (!isSelected) (e.currentTarget as HTMLElement).style.borderColor = '#2a2a2a'; }}
            >
              {/* Color preview */}
              <div style={{ display: 'flex', borderRadius: '8px', overflow: 'hidden', flexShrink: 0 }}>
                <div style={{ width: '24px', height: '32px', background: theme.colors[0] }} />
                <div style={{ width: '24px', height: '32px', background: theme.colors[1] }} />
              </div>
              <span style={{ flex: 1, fontSize: '15px', fontWeight: '500', color: '#ffffff' }}>{theme.label}</span>
              {isSelected && (
                <div style={{ width: '22px', height: '22px', borderRadius: '50%', background: '#4488ff', display: 'flex', alignItems: 'center', justifyContent: 'center', flexShrink: 0 }}>
                  <Check size={13} color="#ffffff" />
                </div>
              )}
            </div>
          );
        })}
      </div>
    </div>
  );
}

// ── IDIOMA ───────────────────────────────────────────────
const LANGUAGES = [
  { code: 'es', name: 'Español', flag: '🇪🇸', region: 'España' },
  { code: 'en', name: 'English', flag: '🇬🇧', region: 'United Kingdom' },
  { code: 'ca', name: 'Català', flag: '🏴', region: 'Catalunya' },
  { code: 'eu', name: 'Euskara', flag: '🏴', region: 'País Vasco' },
  { code: 'fr', name: 'Français', flag: '🇫🇷', region: 'France' },
  { code: 'de', name: 'Deutsch', flag: '🇩🇪', region: 'Deutschland' },
];

function IdiomaSection() {
  const [selected, setSelected] = useState('es');
  return (
    <div style={{ maxWidth: '560px' }}>
      <h1 style={{ fontSize: '24px', fontWeight: '700', color: '#ffffff', marginBottom: '8px' }}>Idioma</h1>
      <p style={{ fontSize: '14px', color: '#888888', marginBottom: '28px' }}>Selecciona el idioma de la interfaz.</p>
      <div style={{ display: 'flex', flexDirection: 'column', gap: '8px' }}>
        {LANGUAGES.map(lang => {
          const isSelected = selected === lang.code;
          return (
            <div
              key={lang.code}
              onClick={() => setSelected(lang.code)}
              style={{
                display: 'flex', alignItems: 'center', gap: '14px',
                padding: '14px 16px', borderRadius: '10px', cursor: 'pointer',
                background: isSelected ? '#2a2a2a' : '#1a1a1a',
                border: `1px solid ${isSelected ? '#444444' : '#2a2a2a'}`,
                transition: 'all 0.15s ease',
              }}
              onMouseEnter={e => { if (!isSelected) (e.currentTarget as HTMLElement).style.borderColor = '#444444'; }}
              onMouseLeave={e => { if (!isSelected) (e.currentTarget as HTMLElement).style.borderColor = '#2a2a2a'; }}
            >
              <span style={{ fontSize: '24px' }}>{lang.flag}</span>
              <div style={{ flex: 1 }}>
                <div style={{ fontSize: '14px', fontWeight: '500', color: '#ffffff' }}>{lang.name}</div>
                <div style={{ fontSize: '12px', color: '#666666' }}>{lang.region}</div>
              </div>
              {isSelected && <Check size={16} color="#00ff88" />}
            </div>
          );
        })}
      </div>
    </div>
  );
}

// ── NOTIFICACIONES ───────────────────────────────────────
type NotifItem = { id: string; label: string; desc: string; enabled: boolean };
function NotifSection() {
  const [notifs, setNotifs] = useState<NotifItem[]>([
    { id: 'n1', label: 'Nuevos hilos en el Foro', desc: 'Cuando alguien crea un hilo nuevo', enabled: true },
    { id: 'n2', label: 'Respuestas a tus hilos', desc: 'Cuando alguien responde tus mensajes', enabled: true },
    { id: 'n3', label: 'Nuevos eventos', desc: 'Ensayos, conciertos y reuniones', enabled: true },
    { id: 'n4', label: 'Cambios en el setlist', desc: 'Cuando se actualiza el repertorio', enabled: false },
    { id: 'n5', label: 'Anuncios de la banda', desc: 'Comunicados importantes', enabled: true },
    { id: 'n6', label: 'Nuevas fotos subidas', desc: 'Cuando se añade contenido al álbum', enabled: false },
  ]);

  const toggle = (id: string) => {
    setNotifs(prev => prev.map(n => n.id === id ? { ...n, enabled: !n.enabled } : n));
  };

  return (
    <div style={{ maxWidth: '560px' }}>
      <h1 style={{ fontSize: '24px', fontWeight: '700', color: '#ffffff', marginBottom: '8px' }}>Notificaciones</h1>
      <p style={{ fontSize: '14px', color: '#888888', marginBottom: '28px' }}>Controla qué alertas deseas recibir.</p>
      <div style={{ display: 'flex', flexDirection: 'column', gap: '8px' }}>
        {notifs.map(n => (
          <div key={n.id} style={{
            display: 'flex', alignItems: 'center', gap: '16px',
            padding: '16px', borderRadius: '10px',
            background: '#1a1a1a', border: '1px solid #2a2a2a',
          }}>
            <div style={{ flex: 1 }}>
              <div style={{ fontSize: '14px', fontWeight: '500', color: '#ffffff', marginBottom: '2px' }}>{n.label}</div>
              <div style={{ fontSize: '12px', color: '#666666' }}>{n.desc}</div>
            </div>
            {/* Toggle */}
            <div
              onClick={() => toggle(n.id)}
              style={{
                width: '44px', height: '24px', borderRadius: '12px', cursor: 'pointer',
                background: n.enabled ? '#00ff88' : '#333333',
                position: 'relative', transition: 'background 0.2s ease', flexShrink: 0,
              }}
            >
              <div style={{
                width: '18px', height: '18px', borderRadius: '50%', background: '#ffffff',
                position: 'absolute', top: '3px',
                left: n.enabled ? '23px' : '3px',
                transition: 'left 0.2s ease',
              }} />
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}

// ── AYUDA ────────────────────────────────────────────────
const FAQ = [
  { q: '¿Cómo puedo cambiar mi instrumento o rol?', a: 'Ve a Configuración > Cuenta y edita el campo "Instrumento / Rol". Pulsa "Guardar cambios" para aplicar.' },
  { q: '¿Cómo subo fotos al álbum?', a: 'Entra en la sección Álbum, selecciona la categoría y pulsa el botón "Subir archivo" en la parte inferior del panel izquierdo.' },
  { q: '¿Cómo creo un nuevo evento en el calendario?', a: 'Solo los administradores pueden crear eventos. Contacta con el admin de la banda para añadir nuevos eventos.' },
  { q: '¿Puedo exportar el setlist de un concierto?', a: 'Actualmente no está disponible la exportación, pero está planificada para próximas versiones.' },
  { q: '¿Cómo reporto un problema?', a: 'Ve a Configuración > Comentarios y describe el problema. También puedes contactar directamente con el administrador.' },
];

function AyudaSection() {
  const [open, setOpen] = useState<string | null>(null);
  return (
    <div style={{ maxWidth: '560px' }}>
      <h1 style={{ fontSize: '24px', fontWeight: '700', color: '#ffffff', marginBottom: '8px' }}>Ayuda</h1>
      <p style={{ fontSize: '14px', color: '#888888', marginBottom: '28px' }}>Preguntas frecuentes sobre la aplicación.</p>
      <div style={{ display: 'flex', flexDirection: 'column', gap: '8px' }}>
        {FAQ.map((item, i) => {
          const isOpen = open === String(i);
          return (
            <div
              key={i}
              style={{ background: '#1a1a1a', border: '1px solid #2a2a2a', borderRadius: '10px', overflow: 'hidden' }}
            >
              <div
                onClick={() => setOpen(isOpen ? null : String(i))}
                style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', padding: '16px', cursor: 'pointer' }}
              >
                <span style={{ fontSize: '14px', fontWeight: '500', color: '#ffffff' }}>{item.q}</span>
                <ChevronRight size={16} color="#555555" style={{ transform: isOpen ? 'rotate(90deg)' : 'none', transition: 'transform 0.15s ease', flexShrink: 0 }} />
              </div>
              {isOpen && (
                <div style={{ padding: '0 16px 16px', fontSize: '13px', color: '#999999', lineHeight: 1.6, borderTop: '1px solid #2a2a2a', paddingTop: '12px' }}>
                  {item.a}
                </div>
              )}
            </div>
          );
        })}
      </div>
    </div>
  );
}

// ── COMENTARIOS ──────────────────────────────────────────
function FeedbackSection() {
  const [type, setType] = useState<'bug' | 'mejora' | 'otro'>('bug');
  const [text, setText] = useState('');
  const [sent, setSent] = useState(false);

  const handleSend = () => {
    if (!text.trim()) return;
    setSent(true);
    setText('');
    setTimeout(() => setSent(false), 3000);
  };

  return (
    <div style={{ maxWidth: '560px' }}>
      <h1 style={{ fontSize: '24px', fontWeight: '700', color: '#ffffff', marginBottom: '8px' }}>Comentarios</h1>
      <p style={{ fontSize: '14px', color: '#888888', marginBottom: '28px' }}>Ayúdanos a mejorar reportando problemas o sugiriendo mejoras.</p>
      {sent ? (
        <div style={{ padding: '20px', background: '#0d2a1a', border: '1px solid #00aa5540', borderRadius: '12px', textAlign: 'center' }}>
          <div style={{ fontSize: '24px', marginBottom: '8px' }}>✅</div>
          <div style={{ fontSize: '15px', fontWeight: '600', color: '#00ff88' }}>¡Gracias por tu feedback!</div>
          <div style={{ fontSize: '13px', color: '#888888', marginTop: '4px' }}>Lo revisaremos pronto.</div>
        </div>
      ) : (
        <div style={{ display: 'flex', flexDirection: 'column', gap: '20px' }}>
          <div>
            <label style={{ display: 'block', fontSize: '11px', fontWeight: '600', letterSpacing: '0.06em', textTransform: 'uppercase', color: '#888888', marginBottom: '10px' }}>TIPO</label>
            <div style={{ display: 'flex', gap: '8px' }}>
              {([['bug', '🐛 Error'], ['mejora', '✨ Mejora'], ['otro', '💬 Otro']] as [string, string][]).map(([val, label]) => (
                <button
                  key={val}
                  onClick={() => setType(val as typeof type)}
                  style={{
                    padding: '8px 16px', borderRadius: '8px', border: '1px solid',
                    borderColor: type === val ? '#555555' : '#333333',
                    background: type === val ? '#333333' : 'transparent',
                    color: type === val ? '#ffffff' : '#888888',
                    fontSize: '13px', cursor: 'pointer', transition: 'all 0.15s ease',
                  }}
                >{label}</button>
              ))}
            </div>
          </div>
          <div>
            <label style={{ display: 'block', fontSize: '11px', fontWeight: '600', letterSpacing: '0.06em', textTransform: 'uppercase', color: '#888888', marginBottom: '8px' }}>DESCRIPCIÓN</label>
            <textarea
              value={text}
              onChange={e => setText(e.target.value)}
              placeholder="Describe el problema o sugerencia con el mayor detalle posible..."
              rows={6}
              style={{ width: '100%', background: '#1a1a1a', border: '1px solid #333333', borderRadius: '8px', padding: '12px', color: '#ffffff', fontSize: '14px', fontFamily: 'inherit', outline: 'none', resize: 'vertical' }}
              onFocus={e => { (e.target as HTMLElement).style.borderColor = '#555555'; }}
              onBlur={e => { (e.target as HTMLElement).style.borderColor = '#333333'; }}
            />
          </div>
          <button
            onClick={handleSend}
            disabled={!text.trim()}
            style={{ background: text.trim() ? '#ffffff' : '#333333', color: text.trim() ? '#000000' : '#666666', padding: '12px 32px', borderRadius: '8px', fontWeight: '600', fontSize: '14px', border: 'none', cursor: text.trim() ? 'pointer' : 'not-allowed', alignSelf: 'flex-start', transition: 'all 0.15s ease' }}
          >
            Enviar comentario
          </button>
        </div>
      )}
    </div>
  );
}

// ── MAIN COMPONENT ───────────────────────────────────────
export default function Configuracion() {
  const [activeSection, setActiveSection] = useState<SectionId>('cuenta');

  const renderContent = () => {
    switch (activeSection) {
      case 'cuenta': return <CuentaSection />;
      case 'tema': return <TemaSection />;
      case 'idioma': return <IdiomaSection />;
      case 'notif': return <NotifSection />;
      case 'ayuda': return <AyudaSection />;
      case 'feedback': return <FeedbackSection />;
    }
  };

  return (
    <div style={{ display: 'flex', height: '100%', minHeight: 'calc(100vh - 48px)' }}>

      {/* Config Sidebar */}
      <div style={{
        width: '240px', minWidth: '240px',
        background: '#111111', borderRight: '1px solid #222222',
        padding: '24px 0', display: 'flex', flexDirection: 'column',
      }}>
        <div style={{ padding: '0 16px 16px' }}>
          <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '4px' }}>
            PERSONALIZACIÓN
          </p>
          <h2 style={{ fontSize: '20px', fontWeight: '700', color: '#ffffff' }}>Configuración</h2>
        </div>

        {/* User card */}
        <div style={{ padding: '0 8px 4px' }}>
          <div style={{ display: 'flex', alignItems: 'center', gap: '10px', padding: '10px 12px', borderRadius: '8px', background: '#1a1a1a', border: '1px solid #333333', marginBottom: '8px' }}>
            <div style={{ width: '30px', height: '30px', borderRadius: '50%', background: '#444444', display: 'flex', alignItems: 'center', justifyContent: 'center', fontSize: '11px', fontWeight: '600', color: '#ffffff', flexShrink: 0 }}>MR</div>
            <div>
              <div style={{ fontSize: '13px', fontWeight: '500', color: '#ffffff', lineHeight: 1.2 }}>Miguel Rodríguez</div>
              <div style={{ fontSize: '11px', color: '#666666', lineHeight: 1.2 }}>Guitarra</div>
            </div>
          </div>
        </div>

        {/* Sections */}
        <div style={{ padding: '0 8px', flex: 1, overflowY: 'auto' }}>
          {configSections.map(section => {
            const isActive = activeSection === section.id;
            return (
              <div
                key={section.id}
                onClick={() => setActiveSection(section.id)}
                style={{
                  display: 'flex', alignItems: 'center', gap: '10px',
                  padding: '10px 12px', borderRadius: '8px', margin: '2px 0', cursor: 'pointer',
                  background: isActive ? '#2a2a2a' : 'transparent',
                  border: isActive ? '1px solid #444444' : '1px solid transparent',
                  transition: 'background 0.1s ease',
                }}
                onMouseEnter={e => { if (!isActive) (e.currentTarget as HTMLElement).style.background = '#1a1a1a'; }}
                onMouseLeave={e => { if (!isActive) (e.currentTarget as HTMLElement).style.background = 'transparent'; }}
              >
                <span style={{ color: isActive ? '#ffffff' : '#555555', display: 'flex', flexShrink: 0 }}>{section.icon}</span>
                <div style={{ minWidth: 0 }}>
                  <div style={{ fontSize: '13px', fontWeight: isActive ? '500' : '400', color: isActive ? '#ffffff' : '#888888', lineHeight: 1.2 }}>{section.label}</div>
                  <div style={{ fontSize: '11px', color: '#555555', lineHeight: 1.2, overflow: 'hidden', textOverflow: 'ellipsis', whiteSpace: 'nowrap' }}>{section.desc}</div>
                </div>
                {!isActive && <ChevronRight size={12} color="#444444" style={{ marginLeft: 'auto', flexShrink: 0 }} />}
              </div>
            );
          })}
        </div>

        {/* Footer */}
        <div style={{ padding: '12px 16px', borderTop: '1px solid #222222', marginTop: '8px' }}>
          <p style={{ fontSize: '11px', color: '#444444', textAlign: 'center' }}>UMC App · v1.0.0</p>
        </div>
      </div>

      {/* Main content */}
      <div style={{ flex: 1, padding: '32px 48px', overflowY: 'auto' }}>
        {renderContent()}
      </div>
    </div>
  );
}
