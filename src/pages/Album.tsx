import { useState } from 'react';
import { ImageIcon, Play, Upload } from 'lucide-react';
import { albumCategories, mediaItems } from '@/data';
import type { AlbumCategory } from '@/types';

type Filter = 'Todo' | 'Fotos' | 'Vídeos';

export default function Album() {
  const [activeCategory, setActiveCategory] = useState<AlbumCategory>(albumCategories[0]);
  const [filter, setFilter] = useState<Filter>('Todo');

  const filteredItems = mediaItems.filter(item => {
    if (item.categoryId !== activeCategory.id) return false;
    if (filter === 'Fotos') return item.type === 'photo';
    if (filter === 'Vídeos') return item.type === 'video';
    return true;
  });

  return (
    <div style={{ display: 'flex', height: '100%', minHeight: 'calc(100vh - 48px)' }}>

      {/* === LEFT SIDEBAR === */}
      <div style={{
        width: '220px',
        minWidth: '220px',
        background: '#111111',
        borderRight: '1px solid #222222',
        display: 'flex',
        flexDirection: 'column',
        padding: '24px 0',
      }}>
        <div style={{ padding: '0 16px 16px' }}>
          <p style={{ fontSize: '11px', fontWeight: '600', letterSpacing: '0.08em', textTransform: 'uppercase', color: '#888888', marginBottom: '4px' }}>
            ÁLBUM
          </p>
          <h2 style={{ fontSize: '18px', fontWeight: '700', color: '#ffffff' }}>Galería del grupo</h2>
        </div>

        <div style={{ flex: 1, overflowY: 'auto', padding: '0 8px' }}>
          {albumCategories.map(cat => {
            const isActive = activeCategory.id === cat.id;
            return (
              <div
                key={cat.id}
                onClick={() => setActiveCategory(cat)}
                style={{
                  display: 'flex',
                  alignItems: 'center',
                  justifyContent: 'space-between',
                  padding: '10px 12px',
                  borderRadius: '8px',
                  margin: '2px 0',
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
                <div style={{ display: 'flex', alignItems: 'center', gap: '10px' }}>
                  <span style={{ fontSize: '16px' }}>{cat.emoji}</span>
                  <span style={{ fontSize: '13px', color: isActive ? '#ffffff' : '#888888', fontWeight: isActive ? '500' : '400' }}>
                    {cat.name}
                  </span>
                </div>
                <span style={{
                  fontSize: '11px',
                  color: '#555555',
                  background: '#222222',
                  padding: '1px 7px',
                  borderRadius: '10px',
                }}>
                  {cat.count}
                </span>
              </div>
            );
          })}
        </div>

        {/* Upload button */}
        <div style={{ padding: '16px' }}>
          <button style={{
            width: '100%',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            gap: '8px',
            padding: '10px',
            background: 'transparent',
            border: '1px solid #333333',
            borderRadius: '8px',
            color: '#888888',
            fontSize: '13px',
            cursor: 'pointer',
            transition: 'border-color 0.15s ease, color 0.15s ease',
          }}
          onMouseEnter={(e) => {
            (e.currentTarget as HTMLElement).style.borderColor = '#555555';
            (e.currentTarget as HTMLElement).style.color = '#ffffff';
          }}
          onMouseLeave={(e) => {
            (e.currentTarget as HTMLElement).style.borderColor = '#333333';
            (e.currentTarget as HTMLElement).style.color = '#888888';
          }}
          >
            <Upload size={14} />
            Subir archivo
          </button>
        </div>
      </div>

      {/* === RIGHT GALLERY === */}
      <div style={{ flex: 1, padding: '24px 32px', overflowY: 'auto' }}>

        {/* Header */}
        <div style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between', marginBottom: '20px' }}>
          <div>
            <h2 style={{ fontSize: '18px', fontWeight: '700', color: '#ffffff', display: 'flex', alignItems: 'center', gap: '8px' }}>
              🎸 {activeCategory.name}
            </h2>
            <p style={{ fontSize: '12px', color: '#666666', marginTop: '2px' }}>{activeCategory.count} archivos</p>
          </div>

          {/* Filters */}
          <div style={{
            display: 'flex',
            gap: '4px',
            background: '#1a1a1a',
            border: '1px solid #333333',
            borderRadius: '8px',
            padding: '3px',
          }}>
            {(['Todo', 'Fotos', 'Vídeos'] as Filter[]).map(f => (
              <button
                key={f}
                onClick={() => setFilter(f)}
                style={{
                  padding: '5px 14px',
                  borderRadius: '6px',
                  border: 'none',
                  cursor: 'pointer',
                  fontSize: '12px',
                  fontWeight: '500',
                  background: filter === f ? '#333333' : 'transparent',
                  color: filter === f ? '#ffffff' : '#666666',
                  transition: 'background 0.1s ease, color 0.1s ease',
                }}
              >
                {f}
              </button>
            ))}
          </div>
        </div>

        {/* Grid */}
        <div style={{
          display: 'grid',
          gridTemplateColumns: 'repeat(5, 1fr)',
          gap: '8px',
        }}>
          {filteredItems.map((item) => (
            <div
              key={item.id}
              style={{
                aspectRatio: '1',
                background: '#1a1a1a',
                border: '1px solid #2a2a2a',
                borderRadius: '8px',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                position: 'relative',
                cursor: 'pointer',
                overflow: 'hidden',
                transition: 'border-color 0.15s ease',
              }}
              onMouseEnter={(e) => { (e.currentTarget as HTMLElement).style.borderColor = '#555555'; }}
              onMouseLeave={(e) => { (e.currentTarget as HTMLElement).style.borderColor = '#2a2a2a'; }}
            >
              {item.type === 'photo' && (
                <>
                  <ImageIcon size={24} color="#333333" />
                </>
              )}
              {item.type === 'video' && (
                <>
                  {/* VID badge */}
                  <span style={{
                    position: 'absolute', top: '6px', right: '6px',
                    fontSize: '9px', fontWeight: '700', color: '#ffffff',
                    background: '#333333', padding: '2px 5px', borderRadius: '4px',
                    letterSpacing: '0.04em',
                  }}>VID</span>
                  <div style={{
                    width: '32px', height: '32px', borderRadius: '50%',
                    background: 'rgba(255,255,255,0.1)',
                    display: 'flex', alignItems: 'center', justifyContent: 'center',
                    border: '1px solid rgba(255,255,255,0.15)',
                  }}>
                    <Play size={14} color="#ffffff" fill="#ffffff" />
                  </div>
                </>
              )}
              {item.type === 'upload' && (
                <div style={{ display: 'flex', flexDirection: 'column', alignItems: 'center', gap: '6px' }}>
                  <Upload size={20} color="#444444" />
                  <span style={{ fontSize: '10px', color: '#444444' }}>Subir</span>
                </div>
              )}
              {/* Dashed border for upload */}
              {item.type === 'upload' && (
                <div style={{
                  position: 'absolute', inset: 0,
                  border: '2px dashed #2a2a2a',
                  borderRadius: '8px',
                }} />
              )}
            </div>
          ))}
        </div>
      </div>

    </div>
  );
}
