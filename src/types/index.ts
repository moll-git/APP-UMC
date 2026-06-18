// ===========================
// UMC App — TypeScript Types
// ===========================

export interface User {
  id: string;
  name: string;
  initials: string;
  instrument: string;
  email: string;
}

export interface Event {
  id: string;
  title: string;
  date: string;
  dayNum: number;
  monthStr: string;
  time: string;
  location: string;
  type: 'Ensayo' | 'Concierto' | 'Estudio' | 'Reunión';
  calendarDay: number;
}

export interface ActivityItem {
  id: string;
  userInitials: string;
  userName: string;
  action: string;
  target: string;
  time: string;
}

export interface Show {
  id: string;
  title: string;
  date: string;
  day: number;
  month: string;
  time: string;
  location: string;
  status: 'En preparación' | 'Próximo' | 'Pasado';
  repertoire: Song[];
}

export interface Song {
  id: string;
  order: number;
  title: string;
  duration: string;
  youtubeUrl?: string;
}

export interface AlbumCategory {
  id: string;
  emoji: string;
  name: string;
  count: number;
}

export interface MediaItem {
  id: string;
  type: 'photo' | 'video' | 'upload';
  categoryId: string;
  thumbnail?: string;
}

export type NavItem = {
  id: string;
  label: string;
  path: string;
  badge?: number;
};
