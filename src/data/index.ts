// ===========================
// UMC App — Static Data
// ===========================

import type { User, Event, ActivityItem, Show, AlbumCategory, MediaItem } from '@/types';

export const currentUser: User = {
  id: 'mr',
  name: 'Miguel Rodríguez',
  initials: 'MR',
  instrument: 'Guitarra',
  email: 'miguel@umc.es',
};

export const members: User[] = [
  { id: 'mr', name: 'Miguel Rodríguez', initials: 'MR', instrument: 'Guitarra', email: 'miguel@umc.es' },
  { id: 'an', name: 'Ana García', initials: 'AN', instrument: 'Voz', email: 'ana@umc.es' },
  { id: 'lp', name: 'Laura Pérez', initials: 'LP', instrument: 'Batería', email: 'laura@umc.es' },
  { id: 'jm', name: 'Javier Martín', initials: 'JM', instrument: 'Bajo', email: 'javier@umc.es' },
];

export const events: Event[] = [
  {
    id: 'ev1',
    title: 'Concierto apertura',
    date: 'JUN 12',
    dayNum: 12,
    monthStr: 'JUN',
    time: '21:00',
    location: 'Teatro Municipal',
    type: 'Concierto',
    calendarDay: 12,
  },
  {
    id: 'ev2',
    title: 'Ensayo setlist',
    date: 'JUN 14',
    dayNum: 14,
    monthStr: 'JUN',
    time: '19:00',
    location: 'Sala de ensayo A',
    type: 'Ensayo',
    calendarDay: 14,
  },
  {
    id: 'ev3',
    title: 'Sesión de grabación',
    date: 'JUN 18',
    dayNum: 18,
    monthStr: 'JUN',
    time: '10:00',
    location: 'Estudio Norte',
    type: 'Estudio',
    calendarDay: 18,
  },
  {
    id: 'ev4',
    title: 'Festival de Primavera',
    date: 'JUN 20',
    dayNum: 20,
    monthStr: 'JUN',
    time: '19:30',
    location: 'Plaza Mayor',
    type: 'Concierto',
    calendarDay: 20,
  },
  {
    id: 'ev5',
    title: 'Reunión de banda',
    date: 'JUN 25',
    dayNum: 25,
    monthStr: 'JUN',
    time: '17:00',
    location: 'Local UMC',
    type: 'Reunión',
    calendarDay: 25,
  },
];

export const recentActivity: ActivityItem[] = [
  {
    id: 'act1',
    userInitials: 'AN',
    userName: 'Ana García',
    action: 'publicó una foto en',
    target: 'Ensayos',
    time: 'hace 12 min',
  },
  {
    id: 'act2',
    userInitials: 'LP',
    userName: 'Laura Pérez',
    action: 'abrió un hilo en el',
    target: 'Foro',
    time: 'hace 1h',
  },
  {
    id: 'act3',
    userInitials: 'MR',
    userName: 'Miguel R.',
    action: 'actualizó el setlist de',
    target: 'Conciertos',
    time: 'hace 2h',
  },
  {
    id: 'act4',
    userInitials: 'JM',
    userName: 'Javier Martín',
    action: 'comentó en el',
    target: 'Foro',
    time: 'ayer',
  },
];

export const shows: Show[] = [
  {
    id: 'show1',
    title: 'Festival de Primavera',
    date: '20 Jun 2026',
    day: 20,
    month: 'JUN',
    time: '19:30',
    location: 'Plaza Mayor, Madrid',
    status: 'En preparación',
    repertoire: [
      { id: 's1', order: 1, title: 'Sabor a Mí', duration: '3:22' },
      { id: 's2', order: 2, title: 'El Día que me Quieras', duration: '4:01' },
      { id: 's3', order: 3, title: 'Historia de un Amor', duration: '3:48' },
      { id: 's4', order: 4, title: 'Quizás, Quizás, Quizás', duration: '2:55' },
      { id: 's5', order: 5, title: 'Cuando Vuelva a tu Lado', duration: '3:37' },
    ],
  },
  {
    id: 'show2',
    title: 'Verano Cultural',
    date: '15 Jul 2026',
    day: 15,
    month: 'JUL',
    time: '21:00',
    location: 'Parque del Retiro, Madrid',
    status: 'Próximo',
    repertoire: [
      { id: 's6', order: 1, title: 'Bésame Mucho', duration: '3:10' },
      { id: 's7', order: 2, title: 'Perfidia', duration: '2:58' },
      { id: 's8', order: 3, title: 'Solamente una Vez', duration: '3:25' },
    ],
  },
  {
    id: 'show3',
    title: 'Gira de Otoño — Barcelona',
    date: '10 Oct 2026',
    day: 10,
    month: 'OCT',
    time: '20:00',
    location: 'Palau de la Música, Barcelona',
    status: 'Próximo',
    repertoire: [
      { id: 's9', order: 1, title: 'Amor Eterno', duration: '4:12' },
      { id: 's10', order: 2, title: 'La Paloma', duration: '3:05' },
      { id: 's11', order: 3, title: 'Cucurrucucú Paloma', duration: '3:50' },
    ],
  },
  {
    id: 'show4',
    title: 'Noche de Otoño',
    date: '15 Oct 2025',
    day: 15,
    month: 'OCT',
    time: '20:30',
    location: 'Teatro Lope de Vega, Sevilla',
    status: 'Pasado',
    repertoire: [
      { id: 's12', order: 1, title: 'Cielito Lindo', duration: '2:45' },
      { id: 's13', order: 2, title: 'El Reloj', duration: '3:20' },
      { id: 's14', order: 3, title: 'Ojalá que Llueva Café', duration: '3:55' },
      { id: 's15', order: 4, title: 'La Flor de la Canela', duration: '3:30' },
    ],
  },
  {
    id: 'show5',
    title: 'Año Nuevo en el Puerto',
    date: '31 Dic 2025',
    day: 31,
    month: 'DIC',
    time: '23:00',
    location: 'Auditorio del Puerto, Valencia',
    status: 'Pasado',
    repertoire: [
      { id: 's16', order: 1, title: 'Caballo Viejo', duration: '4:05' },
      { id: 's17', order: 2, title: 'El Manicero', duration: '2:55' },
      { id: 's18', order: 3, title: 'Guantanamera', duration: '3:15' },
    ],
  },
];

export const albumCategories: AlbumCategory[] = [
  { id: 'conciertos', emoji: '🎸', name: 'Conciertos', count: 14 },
  { id: 'ensayos', emoji: '🥁', name: 'Ensayos', count: 9 },
  { id: 'eventos', emoji: '✨', name: 'Eventos especiales', count: 7 },
  { id: 'risas', emoji: '😄', name: 'Risas', count: 11 },
  { id: 'estudio', emoji: '🎙️', name: 'Estudio de grabación', count: 6 },
  { id: 'viajes', emoji: '🗺️', name: 'Viajes y giras', count: 4 },
];

// Generate mock media items for Conciertos category
export const mediaItems: MediaItem[] = [
  { id: 'm1', type: 'photo', categoryId: 'conciertos' },
  { id: 'm2', type: 'video', categoryId: 'conciertos' },
  { id: 'm3', type: 'photo', categoryId: 'conciertos' },
  { id: 'm4', type: 'photo', categoryId: 'conciertos' },
  { id: 'm5', type: 'video', categoryId: 'conciertos' },
  { id: 'm6', type: 'photo', categoryId: 'conciertos' },
  { id: 'm7', type: 'photo', categoryId: 'conciertos' },
  { id: 'm8', type: 'video', categoryId: 'conciertos' },
  { id: 'm9', type: 'photo', categoryId: 'conciertos' },
  { id: 'm10', type: 'photo', categoryId: 'conciertos' },
  { id: 'm11', type: 'photo', categoryId: 'conciertos' },
  { id: 'm12', type: 'photo', categoryId: 'conciertos' },
  { id: 'm13', type: 'photo', categoryId: 'conciertos' },
  { id: 'upload', type: 'upload', categoryId: 'conciertos' },
];
