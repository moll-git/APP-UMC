import type { ReactNode } from 'react';
import Sidebar from './Sidebar';
import Header from './Header';

interface LayoutProps {
  children: ReactNode;
}

export default function Layout({ children }: LayoutProps) {
  return (
    <div style={{ display: 'flex', height: '100vh', background: '#0a0a0a' }}>
      <Sidebar />
      <div style={{ marginLeft: '200px', flex: 1, display: 'flex', flexDirection: 'column', overflow: 'hidden' }}>
        <Header />
        <main style={{
          marginTop: '48px',
          flex: 1,
          overflowY: 'auto',
          background: '#0a0a0a',
        }}>
          {children}
        </main>
      </div>
    </div>
  );
}
