<div class="flex flex-col md:flex-row h-full min-h-[calc(100vh-48px)]">

    {{-- ===== LEFT SIDEBAR ===== --}}
    <div class="w-full md:w-[220px] md:min-w-[220px] bg-[#111111] border-b md:border-b-0 md:border-r border-[#222222] flex flex-col p-6">
        <div class="mb-4">
            <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-1">
                {{ __('app.album_label') }}
            </p>
            <h2 class="text-lg font-bold text-white leading-tight">{{ __('app.album_title') }}</h2>
        </div>

        {{-- Category list --}}
        <div class="flex-1 overflow-y-auto space-y-0.5 max-h-[200px] md:max-h-none py-2 md:py-0">
            @foreach($categories as $cat)
                @php
                    $isActive = ($activeCategoryId === $cat['id']);
                    $count    = $counts[$cat['id']] ?? 0;
                @endphp
                <div
                    id="cat-{{ $cat['id'] }}"
                    wire:click="selectCategory('{{ $cat['id'] }}')"
                    class="flex items-center justify-between px-3 py-2.5 rounded-lg cursor-pointer transition select-none border
                    {{ $isActive ? 'bg-[#2a2a2a] border-[#444444]' : 'border-transparent hover:bg-[#1a1a1a]' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-base">{{ $cat['emoji'] }}</span>
                        <span class="text-[13px] {{ $isActive ? 'text-white font-medium' : 'text-[#888888]' }}">
                            {{ __($cat['trans']) }}
                        </span>
                    </div>
                    <span class="text-[11px] text-[#555555] bg-[#222222] px-2 py-0.5 rounded-full">
                        {{ $count }}
                    </span>
                </div>
            @endforeach
        </div>

        {{-- Spacer: upload button se ha movido al header del panel derecho --}}
    </div>

    {{-- ===== RIGHT PANEL ===== --}}
    <div class="flex-grow p-6 md:p-8 overflow-y-auto">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    {{ $activeCategory['emoji'] }} {{ __($activeCategory['trans']) }}
                </h2>
                <p class="text-xs text-[#666666] mt-0.5">
                    {{ __('app.album_files', ['count' => $albums->count()]) }}
                </p>
            </div>

            {{-- Upload button + Filters --}}
            <div class="flex items-center gap-2">
                {{-- Upload: adapta color al tema activo --}}
                <button id="btn-upload-album" class="btn-upload-themed">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                    {{ __('app.album_upload_label') }}
                </button>

                {{-- Filter pills --}}
                <div class="flex gap-1 bg-[#1a1a1a] border border-[#333333] rounded-lg p-0.5">
                    @foreach([
                        ['all',    __('app.album_filter_all')],
                        ['photos', __('app.album_filter_photos')],
                        ['videos', __('app.album_filter_videos')],
                    ] as [$fKey, $fLabel])
                        <button
                            id="btn-filter-{{ $fKey }}"
                            wire:click="selectFilter('{{ $fKey }}')"
                            class="px-3.5 py-1.5 rounded-md text-xs font-medium cursor-pointer transition duration-150 select-none
                            {{ $filter === $fKey ? 'bg-[#333333] text-white' : 'text-[#666666] hover:text-white' }}"
                        >
                            {{ $fLabel }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Album Grid --}}
        @if($albums->isEmpty())
            <div class="flex flex-col items-center justify-center py-24 text-center">
                <div class="w-16 h-16 rounded-2xl bg-[#1a1a1a] border border-[#2a2a2a] flex items-center justify-center mb-4">
                    <span class="text-3xl">{{ $activeCategory['emoji'] }}</span>
                </div>
                <p class="text-sm font-medium text-[#888888]">No hay álbumes en esta categoría</p>
                <p class="text-xs text-[#555555] mt-1">Sube el primero usando el botón de arriba</p>
            </div>

        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-3">
                @foreach($albums as $album)
                    @php
                        $gradients = [
                            'from-[#1a1a2e] to-[#16213e]',
                            'from-[#1a1a1a] to-[#2a1a1a]',
                            'from-[#0d1b2a] to-[#1b263b]',
                            'from-[#1a1a1a] to-[#1a2a1a]',
                            'from-[#1f1b24] to-[#2d1b33]',
                            'from-[#1a1f1a] to-[#1a2a2a]',
                        ];
                        $grad = $gradients[$album->id % count($gradients)];
                    @endphp
                    <div
                        id="album-card-{{ $album->id }}"
                        class="group bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl overflow-hidden hover:border-[#444444] transition duration-200 cursor-pointer flex flex-col"
                    >
                        {{-- Cover / Placeholder --}}
                        <div class="aspect-video bg-[#111111] relative overflow-hidden">
                            @if($album->cover_image)
                                <img
                                    src="{{ $album->cover_image }}"
                                    alt="{{ $album->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-full h-full bg-gradient-to-br {{ $grad }} flex items-center justify-center group-hover:brightness-125 transition duration-500">
                                    <svg class="w-8 h-8 text-[#333333]" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                </div>
                            @endif

                            {{-- Photo count badge --}}
                            @if($album->photos_count > 0)
                                <div class="absolute bottom-1.5 right-1.5 flex items-center gap-1 bg-black/60 backdrop-blur-sm text-white text-[10px] font-medium px-1.5 py-0.5 rounded-full">
                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                                    {{ $album->photos_count }}
                                </div>
                            @endif

                            {{-- Draft badge --}}
                            @if(!$album->is_published)
                                <div class="absolute top-1.5 left-1.5 bg-[#333333] border border-[#555555] text-[#aaaaaa] text-[9px] font-semibold px-1.5 py-0.5 rounded tracking-wide">
                                    BORRADOR
                                </div>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="p-3 flex flex-col flex-1">
                            <h3 class="text-[13px] font-semibold text-white leading-snug mb-1 line-clamp-2 group-hover:text-[#e0e0e0] transition">
                                {{ $album->title }}
                            </h3>

                            @if($album->description)
                                <p class="text-[11px] text-[#666666] leading-relaxed line-clamp-2 mb-2">
                                    {{ $album->description }}
                                </p>
                            @endif

                            <div class="mt-auto flex items-center justify-between gap-2">
                                {{-- Date --}}
                                @if($album->event_date)
                                    <span class="flex items-center gap-1 text-[10px] text-[#555555]">
                                        <svg class="w-2.5 h-2.5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                        {{ $album->event_date->format('d/m/Y') }}
                                    </span>
                                @else
                                    <span></span>
                                @endif

                                {{-- Author initials --}}
                                @if($album->user)
                                    <div
                                        class="w-5 h-5 rounded-full bg-[#2a2a2a] border border-[#444444] flex items-center justify-center text-[8px] font-bold text-[#aaaaaa] shrink-0"
                                        title="{{ $album->user->name }}"
                                    >
                                        {{ strtoupper(substr($album->user->name, 0, 2)) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Upload placeholder tile --}}
                <div
                    id="tile-upload"
                    class="aspect-video bg-transparent border-2 border-dashed border-[#2a2a2a] rounded-xl flex flex-col items-center justify-center gap-1.5 cursor-pointer hover:border-[#444444] hover:bg-[#1a1a1a] transition duration-200"
                >
                    <svg class="w-5 h-5 text-[#444444]" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                    <span class="text-[11px] text-[#444444]">{{ __('app.album_upload_label') }}</span>
                </div>
            </div>
        @endif
    </div>

</div>
