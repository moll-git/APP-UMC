<div class="flex flex-col md:flex-row h-full min-h-[calc(100vh-48px)]">

    <!-- === LEFT SIDEBAR === -->
    <div class="w-full md:w-[220px] md:min-w-[220px] bg-[#111111] border-b md:border-b-0 md:border-r border-[#222222] flex flex-col p-6">
        <div class="mb-4">
            <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-1">
                {{ __('app.album_label') }}
            </p>
            <h2 class="text-lg font-bold text-white leading-tight">{{ __('app.album_title') }}</h2>
        </div>

        <div class="flex-1 overflow-y-auto space-y-0.5 max-h-[200px] md:max-h-none py-2 md:py-0">
            @php
                $albumCatKeys = [
                    'conciertos' => 'app.album_cat_concerts',
                    'ensayos' => 'app.album_cat_rehearsals',
                    'carrer' => 'app.album_cat_carrer',
                    'convivencias' => 'app.album_cat_convivencias',
                    'risas' => 'app.album_cat_jaja',
                    'otros' => 'app.album_cat_other',
                ];
            @endphp
            @foreach($categories as $cat)
                @php
                    $isActive = ($activeCategoryId === $cat['id']);
                @endphp
                <div
                    wire:click="selectCategory('{{ $cat['id'] }}')"
                    class="flex items-center justify-between px-3 py-2.5 rounded-lg cursor-pointer transition select-none border
                    {{ $isActive ? 'bg-[#2a2a2a] border-[#444444]' : 'border-transparent hover:bg-[#1a1a1a]' }}"
                >
                    <div class="flex items-center gap-2.5">
                        <span class="text-base">{{ $cat['emoji'] }}</span>
                        <span class="text-[13px] {{ $isActive ? 'text-white font-medium' : 'text-[#888888]' }}">
                            {{ __($albumCatKeys[$cat['id']] ?? $cat['name']) }}
                        </span>
                    </div>
                    <span class="text-[11px] text-[#555555] bg-[#222222] px-2 py-0.5 rounded-full">
                        {{ $cat['count'] }}
                    </span>
                </div>
            @endforeach
        </div>

        <!-- Upload button -->
        <div class="pt-4 md:pt-6">
            <button class="w-full flex items-center justify-center gap-2 py-2.5 border border-[#333333] hover:border-[#555555] rounded-lg text-[#888888] hover:text-white text-[13px] font-medium transition cursor-pointer">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                {{ __('app.album_upload_label') }}
            </button>
        </div>
    </div>

    <!-- === RIGHT GALLERY === -->
    <div class="flex-grow p-6 md:p-8 overflow-y-auto">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    {{ $activeCategory['emoji'] }} {{ __($albumCatKeys[$activeCategory['id']] ?? $activeCategory['name']) }}
                </h2>
                <p class="text-xs text-[#666666] mt-0.5">{{ __('app.album_files', ['count' => $activeCategory['count']]) }}</p>
            </div>

            <!-- Filters -->
            <div class="flex gap-1 bg-[#1a1a1a] border border-[#333333] rounded-lg p-0.5">
                @foreach([['all', __('app.album_filter_all')], ['photos', __('app.album_filter_photos')], ['videos', __('app.album_filter_videos')]] as [$fKey, $fLabel])
                    <button
                        wire:click="selectFilter('{{ $fKey }}')"
                        class="px-3.5 py-1.5 rounded-md text-xs font-medium cursor-pointer transition duration-150 select-none
                        {{ $filter === $fKey ? 'bg-[#333333] text-white' : 'text-[#666666] hover:text-white' }}"
                    >
                        {{ $fLabel }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2">
            @foreach($filteredItems as $item)
                <div
                    class="aspect-square bg-[#1a1a1a] border border-[#2a2a2a] rounded-lg flex items-center justify-center relative cursor-pointer overflow-hidden transition hover:border-[#555555]"
                >
                    @if($item['type'] === 'photo')
                        <svg class="w-6 h-6 text-[#333333]" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                    @elseif($item['type'] === 'video')
                        <!-- VID badge -->
                        <span class="absolute top-1.5 right-1.5 text-[9px] font-bold text-white bg-[#333333] px-1.5 py-0.5 rounded tracking-wide">
                            VID
                        </span>
                        <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center border border-white/15">
                            <svg class="w-3.5 h-3.5 text-white fill-white ml-0.5" viewBox="0 0 24 24"><path d="M5 3l14 9-14 9V3z"/></svg>
                        </div>
                    @elseif($item['type'] === 'upload')
                        <div class="flex flex-col items-center gap-1.5">
                            <svg class="w-5 h-5 text-[#444444]" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                            <span class="text-[10px] text-[#444444]">{{ __('app.album_upload_label') }}</span>
                        </div>
                        <div class="absolute inset-0 border-2 border-dashed border-[#2a2a2a] rounded-lg pointer-events-none"></div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

</div>
