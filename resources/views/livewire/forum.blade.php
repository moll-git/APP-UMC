<div class="p-6 md:p-8 max-w-[900px] w-full mx-auto">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start gap-4 mb-6">
        <div>
            <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-1.5">
                COMUNIDAD
            </p>
            <h1 class="text-3xl font-bold text-white leading-tight">Foro</h1>
        </div>
        <button class="flex items-center gap-2 bg-white text-black px-5 py-2.5 rounded-lg font-semibold text-sm hover:opacity-90 transition shrink-0 cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><line x1="12" x2="12" y1="5" y2="19"/><line x1="5" x2="19" y1="12" y2="12"/></svg>
            Nuevo hilo
        </button>
    </div>

    <!-- Search -->
    <div class="relative mb-4">
        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#555555]">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/></svg>
        </span>
        <input
            wire:model.live="search"
            type="text"
            placeholder="Buscar en el foro..."
            class="w-full bg-[#1a1a1a] border border-[#333333] hover:border-[#555555] focus:border-[#555555] rounded-lg py-2.5 pl-10 pr-4 text-white text-sm outline-none transition duration-150"
        />
    </div>

    <!-- Category filters -->
    <div class="flex flex-wrap gap-2 mb-5">
        @foreach($categories as $cat)
            @php
                $isActive = ($activeCategory === $cat);
            @endphp
            <button
                wire:click="selectCategory('{{ $cat }}')"
                class="px-4 py-1.5 rounded-full border text-xs font-medium cursor-pointer transition select-none
                {{ $isActive ? 'border-white bg-white text-black font-semibold' : 'border-[#333333] bg-transparent text-[#888888] hover:text-white' }}"
            >
                {{ $cat }}
            </button>
        @endforeach
    </div>

    <!-- Count -->
    <p class="text-xs text-[#666666] mb-4">
        {{ count($filteredThreads) }} hilo{{ count($filteredThreads) !== 1 ? 's' : '' }} encontrado{{ count($filteredThreads) !== 1 ? 's' : '' }}
    </p>

    <!-- Thread list -->
    <div class="flex flex-col gap-2">
        @php
            $catColors = [
                'Ensayos' => '#4488ff',
                'Repertorio' => '#aa44ff',
                'Equipamiento' => '#ff6633',
                'Álbum' => '#00cc88',
                'General' => '#888888',
            ];
        @endphp
        @foreach($filteredThreads as $thread)
            @php
                $catColor = $catColors[$thread['category']] ?? '#888888';
            @endphp
            <div
                class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl p-4.5 cursor-pointer hover:border-[#444444] hover:bg-[#222222] transition duration-150 flex items-start gap-3.5 group"
            >
                <!-- Avatar -->
                <div class="w-8 h-8 rounded-full bg-[#333333] flex items-center justify-center text-[11px] font-bold text-white shrink-0 select-none">
                    {{ $thread['authorInitials'] }}
                </div>

                <!-- Content -->
                <div class="flex-grow min-w-0">
                    <div class="flex flex-wrap items-center gap-2 mb-1.5 text-xs text-[#555555]">
                        <span class="font-bold text-white">{{ $thread['author'] }}</span>
                        <span>{{ $thread['time'] }}</span>
                        <span class="inline-flex px-2 py-0.5 rounded-full text-[10px] font-medium border" 
                              style="background-color: {{ $catColor }}20; color: {{ $catColor }}; border-color: {{ $catColor }}40;">
                            {{ $thread['category'] }}
                        </span>
                    </div>
                    <h3 class="text-[15px] font-bold text-white mb-1.5 leading-snug">
                        {{ $thread['title'] }}
                    </h3>
                    <p class="text-xs text-[#777777] leading-relaxed mb-3">
                        {{ $thread['preview'] }}
                    </p>
                    <div class="flex gap-4 text-xs text-[#555555]">
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            {{ $thread['replies'] }}
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                            {{ $thread['likes'] }}
                        </span>
                    </div>
                </div>

                <div class="text-[#444444] group-hover:text-white transition shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </div>
        @endforeach
    </div>

</div>
