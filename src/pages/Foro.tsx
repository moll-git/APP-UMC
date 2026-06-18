import { useState } from 'react';
import { Search, Plus, ChevronRight, MessageSquare, Heart } from 'lucide-react';

interface Thread {
  id: string;
  author: string;
  authorInitials: string;
  time: string;
  category: string;
  title: string;
  preview: string;
  replies: number;
  likes: number;
}

const CATEGORIES = ['Todo', 'Ensayos', 'Repertorio', 'Equipamiento', 'Álbum', 'General'];

const THREADS: Thread[] = [
  {
    id: 't1', author: 'Ana García', authorInitials: 'AN', time: 'hace 2h',
    category: 'Ensayos', title: '¿Cuándo es el próximo ensayo?',
    preview: 'No he visto información sobre la fecha del ensayo de la semana que viene...',
    replies: 8, likes: 3,
  },
  {
    id: 't2', author: 'Miguel Rodríguez', authorInitials: 'MR', time: 'hace 5h',
    category: 'Repertorio', title: 'Propuesta de nueva canción para el setlist',
    preview: 'He estado escuchando una canción que creo que nos quedaría perfecta...',
    replies: 14, likes: 9,
  },
  {
    id: 't3', author: 'Laura Pérez', authorInitials: 'LP', time: 'ayer',
    category: 'General', title: '¿Alguien tiene contacto del fotógrafo?',
    preview: 'Quedé en pedirle las fotos del concierto del mes pasado...',
    replies: 4, likes: 1,
  },
  {
    id: 't4', author: 'Javier Martín', authorInitials: 'JM', time: 'ayer',
    category: 'Equipamiento', title: 'Problema con el equipo de sonido',
    preview: 'El amplificador principal hace un ruido extraño desde el viernes...',
    replies: 6, likes: 2,
  },
  {
    id: 't5', author: 'Carmen Sánchez', authorInitials: 'CS', time: 'hace 2d',
    category: 'Álbum', title: 'Ideas para la portada del nuevo álbum',
    preview: 'Estuve pensando en algunos conceptos visuales que podrían funcionar bien...',
    replies: 11, likes: 7,
  },
  {
    id: 't6', author: 'Miguel Rodríguez', authorInitials: 'MR', time: 'hace 3d',
    category: 'Ensayos', title: 'Resumen del ensayo del jueves',
    preview: 'Todo fue muy bien, repasamos las tres primeras canciones del setlist...',
    replies: 3, likes: 5,
  },
];

const CATEGORY_COLORS: Record<string, string> = {
  Ensayos: '#4488ff',
  Repertorio: '#aa44ff',
  Equipamiento: '#ff6633',
  Álbum: '#00cc88',
  General: '#888888',
};

export default function Foro() {
  const [search, setSearch] = useState('');
  const [activeCategory, setActiveCategory] = useState('Todo');

  const filtered = THREADS.filter(t => {
    const matchCat = activeCategory === 'Todo' || t.category === activeCategory;
    const matchSearch = !search || t.title.toLowerCase().includes(search.toLowerCase()) ||
      t.preview.toLowerCase().includes(search.toLowerCase());
    return matchCat && matchSearch;
  });

  return (
    <div style={{ padding: '32px 40px', maxWidth: '900px', width: '100%' }}>

      {/* Header */}
      <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'flex-start', marginBottom: '28px', gap: '16px', flexWrap: 'wrap' }}>
        <div>
          <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '6px' }}>
            COMUNIDAD
          </p>
          <h1 style={{ fontSize: '28px', fontWeight: '700', color: '#ffffff', lineHeight: 1.2 }}>Foro</h1>
        </div>
        <button style={{
          display: 'flex', alignItems: 'center', gap: '8px',
          background: '#ffffff', color: '#000000',
          padding: '10px 20px', borderRadius: '8px',
          fontWeight: '600', fontSize: '14px', border: 'none', cursor: 'pointer',
          transition: 'opacity 0.15s ease', flexShrink: 0,
        }}
        onMouseEnter={e => { (e.currentTarget as HTMLElement).style.opacity = '0.88'; }}
        onMouseLeave={e => { (e.currentTarget as HTMLElement).style.opacity = '1'; }}
        >
          <Plus size={16} /> Nuevo hilo
        </button>
      </div>

      {/* Search */}
      <div style={{ position: 'relative', marginBottom: '16px' }}>
        <Search size={15} style={{ position: 'absolute', left: '12px', top: '50%', transform: 'translateY(-50%)', color: '#555555' }} />
        <input
          value={search}
          onChange={e => setSearch(e.target.value)}
          placeholder="Buscar en el foro..."
          style={{
            width: '100%', background: '#1a1a1a', border: '1px solid #333333',
            borderRadius: '8px', padding: '10px 12px 10px 36px',
            color: '#ffffff', fontSize: '14px', fontFamily: 'inherit', outline: 'none',
          }}
          onFocus={e => { (e.target as HTMLElement).style.borderColor = '#555555'; }}
          onBlur={e => { (e.target as HTMLElement).style.borderColor = '#333333'; }}
        />
      </div>

      {/* Category filters */}
      <div style={{ display: 'flex', gap: '8px', marginBottom: '20px', flexWrap: 'wrap' }}>
        {CATEGORIES.map(cat => (
          <button
            key={cat}
            onClick={() => setActiveCategory(cat)}
            style={{
              padding: '6px 16px', borderRadius: '20px', border: '1px solid',
              borderColor: activeCategory === cat ? '#ffffff' : '#333333',
              background: activeCategory === cat ? '#ffffff' : 'transparent',
              color: activeCategory === cat ? '#000000' : '#888888',
              fontSize: '13px', fontWeight: activeCategory === cat ? '600' : '400',
              cursor: 'pointer', transition: 'all 0.15s ease',
            }}
          >
            {cat}
          </button>
        ))}
      </div>

      {/* Count */}
      <p style={{ fontSize: '13px', color: '#666666', marginBottom: '16px' }}>
        {filtered.length} hilo{filtered.length !== 1 ? 's' : ''} encontrado{filtered.length !== 1 ? 's' : ''}
      </p>

      {/* Thread list */}
      <div style={{ display: 'flex', flexDirection: 'column', gap: '8px' }}>
        {filtered.map(thread => (
          <div
            key={thread.id}
            style={{
              background: '#1a1a1a', border: '1px solid #2a2a2a',
              borderRadius: '12px', padding: '18px 20px',
              cursor: 'pointer', transition: 'border-color 0.15s ease, background 0.15s ease',
              display: 'flex', alignItems: 'flex-start', gap: '14px',
            }}
            onMouseEnter={e => {
              (e.currentTarget as HTMLElement).style.borderColor = '#444444';
              (e.currentTarget as HTMLElement).style.background = '#222222';
            }}
            onMouseLeave={e => {
              (e.currentTarget as HTMLElement).style.borderColor = '#2a2a2a';
              (e.currentTarget as HTMLElement).style.background = '#1a1a1a';
            }}
          >
            {/* Avatar */}
            <div style={{
              width: '32px', height: '32px', borderRadius: '50%',
              background: '#333333', display: 'flex', alignItems: 'center',
              justifyContent: 'center', fontSize: '11px', fontWeight: '600',
              color: '#ffffff', flexShrink: 0,
            }}>
              {thread.authorInitials}
            </div>

            {/* Content */}
            <div style={{ flex: 1, minWidth: 0 }}>
              <div style={{ display: 'flex', alignItems: 'center', gap: '8px', marginBottom: '6px', flexWrap: 'wrap' }}>
                <span style={{ fontSize: '13px', fontWeight: '600', color: '#ffffff' }}>{thread.author}</span>
                <span style={{ fontSize: '12px', color: '#555555' }}>{thread.time}</span>
                <span style={{
                  display: 'inline-flex', padding: '2px 8px', borderRadius: '10px',
                  fontSize: '11px', fontWeight: '500',
                  background: (CATEGORY_COLORS[thread.category] || '#888888') + '20',
                  color: CATEGORY_COLORS[thread.category] || '#888888',
                  border: `1px solid ${(CATEGORY_COLORS[thread.category] || '#888888')}40`,
                }}>
                  {thread.category}
                </span>
              </div>
              <h3 style={{ fontSize: '15px', fontWeight: '600', color: '#ffffff', marginBottom: '6px', lineHeight: 1.3 }}>
                {thread.title}
              </h3>
              <p style={{ fontSize: '13px', color: '#777777', lineHeight: 1.5, marginBottom: '10px' }}>
                {thread.preview}
              </p>
              <div style={{ display: 'flex', gap: '16px' }}>
                <span style={{ display: 'flex', alignItems: 'center', gap: '5px', fontSize: '12px', color: '#555555' }}>
                  <MessageSquare size={13} /> {thread.replies}
                </span>
                <span style={{ display: 'flex', alignItems: 'center', gap: '5px', fontSize: '12px', color: '#555555' }}>
                  <Heart size={13} /> {thread.likes}
                </span>
              </div>
            </div>

            <ChevronRight size={16} color="#444444" style={{ flexShrink: 0, marginTop: '2px' }} />
          </div>
        ))}
      </div>
    </div>
  );
}
