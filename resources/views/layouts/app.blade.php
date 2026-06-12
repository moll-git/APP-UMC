<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-white bg-[#1a1a1a]">
        <div class="min-h-screen pb-20"> <!-- pb-20 para espacio del bottom nav -->
            <!-- Top App Bar (Opcional, pero útil para logo/perfil) -->
            <header class="bg-[#242424] shadow-sm sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4 h-14 flex items-center justify-between">
                    <div class="font-bold text-xl tracking-tight text-white">UMC</div>
                    <livewire:layout.navigation /> <!-- Lo mantenemos oculto en mobile o lo adaptamos luego -->
                </div>
            </header>

            <!-- Page Heading -->
            @if (isset($header))
                <div class="bg-[#2a2a2a] shadow">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-white">
                        {{ $header }}
                    </div>
                </div>
            @endif

            <!-- Page Content -->
            <main class="p-4 max-w-md mx-auto sm:max-w-xl">
                {{ $slot }}
            </main>

            <!-- Bottom Navigation -->
            <nav class="fixed bottom-0 w-full bg-[#242424] border-t border-[#333] z-50">
                <div class="flex justify-around items-center h-16 max-w-md mx-auto">
                    <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-full h-full text-gray-400 hover:text-white {{ request()->routeIs('home') ? 'text-white font-semibold' : '' }}">
                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        <span class="text-[10px]">Inicio</span>
                    </a>
                    <a href="{{ route('calendar') }}" class="flex flex-col items-center justify-center w-full h-full text-gray-400 hover:text-white {{ request()->routeIs('calendar') ? 'text-white font-semibold' : '' }}">
                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="text-[10px]">Agenda</span>
                    </a>
                    <a href="{{ route('album') }}" class="flex flex-col items-center justify-center w-full h-full text-gray-400 hover:text-white {{ request()->routeIs('album') ? 'text-white font-semibold' : '' }}">
                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="text-[10px]">Álbum</span>
                    </a>
                    <a href="{{ route('forum') }}" class="flex flex-col items-center justify-center w-full h-full text-gray-400 hover:text-white {{ request()->routeIs('forum') ? 'text-white font-semibold' : '' }}">
                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                        <span class="text-[10px]">Foro</span>
                    </a>
                    <a href="{{ route('concerts') }}" class="flex flex-col items-center justify-center w-full h-full text-gray-400 hover:text-white {{ request()->routeIs('concerts') ? 'text-white font-semibold' : '' }}">
                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                        <span class="text-[10px]">Shows</span>
                    </a>
                </div>
            </nav>
        </div>
    </body>
</html>
