<div class="flex flex-col md:flex-row h-full min-h-[calc(100vh-48px)]">

    <!-- === LEFT SIDEBAR — show list === -->
    <div class="w-full md:w-[280px] md:min-w-[280px] bg-[#111111] border-b md:border-b-0 md:border-r border-[#222222] overflow-y-auto p-6 flex flex-col gap-4">
        <div>
            <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-1">
                AGENDA MUSICAL
            </p>
            <h2 class="text-xl font-bold text-white">Conciertos</h2>
        </div>

        <div class="space-y-4 max-h-[300px] md:max-h-none overflow-y-auto py-2">
            @php
                $statusColors = [
                    'En preparación' => '#00ff88',
                    'Próximo' => '#4488ff',
                    'Pasado' => '#555555',
                ];
                $statusGroups = [
                    ['key' => 'En preparación', 'label' => 'EN PREPARACIÓN'],
                    ['key' => 'Próximo', 'label' => 'PRÓXIMOS'],
                    ['key' => 'Pasado', 'label' => 'PASADOS'],
                ];
            @endphp

            @foreach($statusGroups as $group)
                @php
                    $groupShows = collect($shows)->filter(fn($s) => $s['status'] === $group['key']);
                @endphp
                @if($groupShows->isNotEmpty())
                    <div>
                        <div class="px-2 py-1.5 text-[10px] font-semibold tracking-widest text-[#555555] flex items-center gap-1.5 uppercase">
                            <span class="w-1.5 h-1.5 rounded-full inline-block" style="background-color: {{ $statusColors[$group['key']] }};"></span>
                            {{ $group['label'] }}
                        </div>
                        @foreach($groupShows as $show)
                            @php
                                $isActive = ($selectedShowId === $show['id']);
                                $isPasado = ($show['status'] === 'Pasado');
                            @endphp
                            <div
                                wire:click="selectShow('{{ $show['id'] }}')"
                                class="px-3 py-2.5 my-0.5 rounded-lg cursor-pointer transition select-none border
                                {{ $isActive ? 'bg-[#2a2a2a] border-[#444444]' : 'border-transparent hover:bg-[#1a1a1a]' }}"
                            >
                                <div class="flex gap-3 items-start">
                                    <div class="text-center min-w-8 shrink-0 bg-[#222222] rounded p-1">
                                        <div class="text-[9px] font-semibold text-[#666666] tracking-wide">{{ $show['month'] }}</div>
                                        <div class="text-base font-bold leading-tight {{ $isPasado ? 'text-[#555555]' : 'text-white' }}">{{ $show['day'] }}</div>
                                    </div>
                                    <div class="min-w-0">
                                        <div class="text-[13px] font-semibold leading-tight mb-1 truncate {{ $isPasado ? 'text-[#666666]' : 'text-white' }}">
                                            {{ $show['title'] }}
                                        </div>
                                        <div class="text-[11px] text-[#555555] truncate mb-0.5">{{ $show['location'] }}</div>
                                        <div class="text-[10px] text-[#444444]">
                                            🎵 {{ count($show['repertoire']) }} obras
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- === RIGHT PANEL — show detail === -->
    <div class="flex-grow p-6 md:p-10 overflow-y-auto">
        @if($selectedShow)
            @php
                $statusColor = $statusColors[$selectedShow['status']] ?? '#888888';
            @endphp
            <!-- Status badge -->
            <div class="inline-flex items-center gap-1.5 px-3 py-1 border border-[#333333] bg-[#1a1a1a] rounded-full text-xs font-medium mb-4" style="color: {{ $statusColor }};">
                <span class="w-1.5 h-1.5 rounded-full inline-block" style="background-color: {{ $statusColor }};"></span>
                {{ $selectedShow['status'] }}
            </div>

            <h1 class="text-3xl md:text-[32px] font-bold text-white mb-4 leading-tight">
                {{ $selectedShow['title'] }}
            </h1>

            <!-- Meta info -->
            <div class="flex flex-wrap gap-5 mb-8 text-sm text-[#888888]">
                <div class="flex items-center gap-1.5">
                    <span>📅</span>
                    <span>{{ $selectedShow['date'] }}</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span>{{ $selectedShow['time'] }}</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span>{{ $selectedShow['location'] }}</span>
                </div>
            </div>

            <!-- Repertoire -->
            <div>
                <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-4 flex items-center gap-2">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                    REPERTORIO — {{ count($selectedShow['repertoire']) }} OBRAS
                </p>

                <div class="flex flex-col gap-2">
                    @foreach($selectedShow['repertoire'] as $song)
                        <div
                            class="bg-[#1a1a1a] border border-[#333333] hover:border-[#555555] rounded-lg px-5 py-4 flex items-center gap-4 transition duration-150 cursor-pointer group"
                        >
                            <span class="text-xs text-[#555555] font-semibold min-w-5">
                                {{ str_pad($song['order'], 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <div class="flex-grow min-w-0">
                                <div class="text-sm font-semibold text-white truncate">{{ $song['title'] }}</div>
                                <div class="flex items-center gap-1 text-[11px] text-[#666666] mt-0.5">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    {{ $song['duration'] }}
                                </div>
                            </div>
                            <!-- External link -->
                            <a href="https://www.youtube.com/results?search_query=UMC+banda+{{ urlencode($song['title']) }}" 
                               target="_blank"
                               class="flex items-center gap-1.5 text-xs text-[#666666] hover:text-white hover:border-[#555555] transition border border-[#333333] bg-[#222222] px-3.5 py-1.5 rounded-md shrink-0 select-none cursor-pointer"
                            >
                                <span class="text-[10px]">▶</span>
                                <span class="hidden sm:inline">Ver en YouTube</span>
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="flex items-center justify-center h-full min-h-[200px]">
                <p class="text-sm text-[#555555]">Selecciona un concierto para ver los detalles</p>
            </div>
        @endif
    </div>

</div>
