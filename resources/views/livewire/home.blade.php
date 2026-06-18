<div class="max-w-[1200px] mx-auto px-6 md:px-10 py-10">

    <!-- === SECCIÓN 1: BIENVENIDA === -->
    <div class="mb-10">
        <div class="flex flex-col sm:flex-row justify-between items-start gap-4">
            <div>
                <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-2">
                    PANEL PRINCIPAL
                </p>
                <h1 class="text-3xl md:text-[32px] font-bold text-white mb-2 leading-tight">
                    Bienvenido, {{ explode(' ', auth()->user()->name)[0] }}
                </h1>
                <p class="text-sm text-[#999999]">
                    Aquí tienes un resumen de la actividad de UMC.
                </p>
            </div>
            <div class="flex items-center gap-1.5 text-sm text-[#00ff88] pt-2">
                <span class="w-2 h-2 rounded-full bg-[#00ff88] inline-block animate-pulse"></span>
                4 miembros activos
            </div>
        </div>
    </div>

    <!-- === SECCIÓN 2: SECCIONES 4 CARDS === -->
    <div class="mb-8">
        <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-4">
            SECCIONES
        </p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <!-- Calendario -->
            <a href="{{ route('calendar') }}" class="block bg-[#1a1a1a] border border-[#333333] rounded-xl p-5 hover:border-[#555555] hover:bg-[#222222] transition duration-150 group">
                <div class="mb-3 text-[#888888] group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                </div>
                <div class="text-[15px] font-semibold text-white mb-1.5">Calendario</div>
                <div class="text-xs text-[#777777] mb-3.5 leading-relaxed">Eventos, ensayos y fechas clave</div>
                <span class="text-xs text-[#aaaaaa] group-hover:text-white transition flex items-center gap-1">
                    Abrir →
                </span>
            </a>

            <!-- Álbum -->
            <a href="{{ route('album') }}" class="block bg-[#1a1a1a] border border-[#333333] rounded-xl p-5 hover:border-[#555555] hover:bg-[#222222] transition duration-150 group">
                <div class="mb-3 text-[#888888] group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                </div>
                <div class="text-[15px] font-semibold text-white mb-1.5">Álbum</div>
                <div class="text-xs text-[#777777] mb-3.5 leading-relaxed">Fotos y videos del grupo</div>
                <span class="text-xs text-[#aaaaaa] group-hover:text-white transition flex items-center gap-1">
                    Abrir →
                </span>
            </a>

            <!-- Foro -->
            <a href="{{ route('forum') }}" class="block bg-[#1a1a1a] border border-[#333333] rounded-xl p-5 hover:border-[#555555] hover:bg-[#222222] transition duration-150 group">
                <div class="mb-3 text-[#888888] group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
                <div class="text-[15px] font-semibold text-white mb-1.5">Foro</div>
                <div class="text-xs text-[#777777] mb-3.5 leading-relaxed">Preguntas, debates y propuestas</div>
                <span class="text-xs text-[#aaaaaa] group-hover:text-white transition flex items-center gap-1">
                    Abrir →
                </span>
            </a>

            <!-- Conciertos -->
            <a href="{{ route('concerts') }}" class="block bg-[#1a1a1a] border border-[#333333] rounded-xl p-5 hover:border-[#555555] hover:bg-[#222222] transition duration-150 group">
                <div class="mb-3 text-[#888888] group-hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                </div>
                <div class="text-[15px] font-semibold text-white mb-1.5">Conciertos</div>
                <div class="text-xs text-[#777777] mb-3.5 leading-relaxed">Actuaciones y repertorio</div>
                <span class="text-xs text-[#aaaaaa] group-hover:text-white transition flex items-center gap-1">
                    Abrir →
                </span>
            </a>
        </div>
    </div>

    <!-- === SECCIÓN 3: ADMINISTRACIÓN === -->
    <div class="mb-10">
        <a href="{{ route('admin') }}" class="flex items-center justify-between bg-[#1a1a1a] border border-[#333333] rounded-xl p-5 hover:border-[#555555] hover:bg-[#222222] transition duration-150">
            <div class="flex items-center gap-4">
                <div class="w-9 h-9 rounded-lg bg-[#2a2a2a] border border-[#444444] flex items-center justify-center text-[#888888]">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 13c0 5-3.5 7.5-7.66 9.7a1 1 0 0 1-.68 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.8 17 5 19 5a1 1 0 0 1 1 1z"/></svg>
                </div>
                <div>
                    <div class="text-[15px] font-semibold text-white mb-0.5">Administración</div>
                    <div class="text-xs text-[#777777]">Gestión de miembros, anuncios, moderación y más</div>
                </div>
            </div>
            <div class="text-[#555555]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
            </div>
        </a>
    </div>

    <!-- === SECCIONES 4+5 en grid 2 cols === -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- SECCIÓN 4: PRÓXIMAMENTE -->
        <div>
            <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-4">
                PRÓXIMAMENTE
            </p>

            <!-- Próximo Concierto -->
            <div class="bg-[#1a1a1a] border border-[#333333] rounded-xl p-5 mb-3 flex gap-3.5 items-start">
                <div class="w-9 h-9 rounded-full bg-[#333333] flex items-center justify-center shrink-0 text-white">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-semibold tracking-widest uppercase text-[#888888] mb-1">
                        PRÓXIMO CONCIERTO
                    </p>
                    <p class="text-[15px] font-semibold text-white mb-2">
                        Festival de Primavera
                    </p>
                    <div class="flex flex-col gap-1 text-xs text-[#888888]">
                        <span class="flex items-center gap-1.5">
                            <span class="text-[#00ff88]">●</span> 20 Jun 2026 19:30
                        </span>
                        <span class="flex items-center gap-1.5">
                            <span class="text-[#00ff88]">●</span> Plaza Mayor, Madrid
                        </span>
                    </div>
                </div>
            </div>

            <!-- Próximo Ensayo -->
            <div class="bg-[#1a1a1a] border border-[#333333] rounded-xl p-5 flex gap-3.5 items-start">
                <div class="w-9 h-9 rounded-lg bg-[#222222] border border-[#333333] flex items-center justify-center shrink-0 text-[#666666]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                </div>
                <div>
                    <p class="text-[10px] font-semibold tracking-widest uppercase text-[#888888] mb-1">
                        PRÓXIMO ENSAYO
                    </p>
                    <p class="text-[15px] font-semibold text-white mb-2">
                        Ensayo general — Setlist Festival
                    </p>
                    <div class="flex flex-col gap-1 text-xs text-[#888888]">
                        <span class="flex items-center gap-1.5">
                            <span class="text-[#888888]">●</span> Vie 14 Jun 2026 19:00
                        </span>
                        <span class="flex items-center gap-1.5">
                            <span class="text-[#888888]">●</span> Sala de ensayo A
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECCIÓN 5: ACTIVIDAD RECIENTE -->
        <div>
            <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-4">
                ACTIVIDAD RECIENTE
            </p>
            <div class="bg-[#1a1a1a] border border-[#333333] rounded-xl overflow-hidden">
                @foreach($recentActivity as $index => $item)
                    <div class="flex items-center gap-3 p-3.5 {{ $index < count($recentActivity) - 1 ? 'border-b border-[#222222]' : '' }}">
                        <div class="w-7 h-7 rounded-full bg-[#333333] flex items-center justify-center text-[10px] font-bold text-white shrink-0">
                            {{ $item['userInitials'] }}
                        </div>
                        <div class="flex-grow min-w-0">
                            <p class="text-xs text-[#cccccc] leading-relaxed">
                                <strong class="text-white">{{ $item['userName'] }}</strong>
                                {{ $item['action'] }}
                                <strong class="text-white">{{ $item['target'] }}</strong>
                            </p>
                        </div>
                        <span class="text-[11px] text-[#555555] shrink-0">{{ $item['time'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
