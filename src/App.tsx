import { Routes, Route, Navigate } from 'react-router-dom';
import Layout from '@/components/Layout';
import Home from '@/pages/Home';
import Calendario from '@/pages/Calendario';
import Album from '@/pages/Album';
import Shows from '@/pages/Shows';
import Configuracion from '@/pages/Configuracion';

export default function App() {
  return (
    <Layout>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="/calendario" element={<Calendario />} />
        <Route path="/album" element={<Album />} />
        <Route path="/foro" element={<Navigate to="/" replace />} />
        <Route path="/shows" element={<Shows />} />
        <Route path="/admin" element={<Navigate to="/" replace />} />
        <Route path="/configuracion" element={<Configuracion />} />
        <Route path="*" element={<Navigate to="/" replace />} />
      </Routes>
    </Layout>
  );
}
