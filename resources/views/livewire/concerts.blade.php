<div class="flex flex-col md:flex-row h-full min-h-[calc(100vh-48px)]">

    {{-- ================================================================
         LEFT SIDEBAR
    ================================================================ --}}
    <div
        class="w-full md:w-[280px] md:min-w-[280px] bg-[#111111] border-b md:border-b-0 md:border-r border-[#222222] overflow-y-auto flex flex-col">

        {{-- Header + tab switcher --}}
        <div class="p-5 border-b border-[#1e1e1e]">
            <p class="text-[10px] font-semibold tracking-widest uppercase text-[#555555] mb-0.5">
                {{ __('app.band_name') }}
            </p>
            <h2 class="text-xl font-bold text-white mb-4">{{ __('app.concerts_agenda') }}</h2>

            {{-- Tabs --}}
            <div class="flex gap-1 bg-[#1a1a1a] rounded-lg p-1 border border-[#2a2a2a]">
                <button wire:click="switchTab('concerts')"
                    class="flex-1 py-1.5 rounded-md text-[11px] font-semibold transition select-none
                    {{ $activeTab === 'concerts' ? 'bg-[#2e2e2e] text-white border border-[#444]' : 'text-[#666666] hover:text-[#aaaaaa]' }}">
                    🎶 {{ __('app.concerts_tab') }}
                </button>
                <button wire:click="switchTab('groups')"
                    class="flex-1 py-1.5 rounded-md text-[11px] font-semibold transition select-none
                    {{ $activeTab === 'groups' ? 'bg-[#2e2e2e] text-white border border-[#444]' : 'text-[#666666] hover:text-[#aaaaaa]' }}">
                    👷 {{ __('app.groups_tab') }}
                </button>
            </div>
        </div>

        {{-- Concerts list --}}
        @if ($activeTab === 'concerts')
            <div class="flex-1 overflow-y-auto py-3 px-2 space-y-4">

                {{-- Upcoming --}}
                @if ($upcoming->isNotEmpty())
                    <div>
                        <div
                            class="px-2 py-1 text-[10px] font-semibold tracking-widest text-[#555555] flex items-center gap-1.5 uppercase mb-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#00ff88] inline-block"></span>
                            {{ __('app.status_label_upcoming') }}
                        </div>
                        @foreach ($upcoming as $concert)
                            @php $isActive = $selectedConcertId === $concert->id; @endphp
                            <div wire:click="selectConcert({{ $concert->id }})"
                                class="px-3 py-2.5 my-0.5 rounded-lg cursor-pointer transition select-none border
                                {{ $isActive ? 'bg-[#2a2a2a] border-[#444444]' : 'border-transparent hover:bg-[#1a1a1a]' }}">
                                <div class="flex gap-3 items-start">
                                    <div class="text-center min-w-8 shrink-0 bg-[#1e1e1e] rounded p-1">
                                        <div class="text-[9px] font-semibold text-[#666666] tracking-wide uppercase">
                                            {{ $concert->date?->format('M') }}
                                        </div>
                                        <div class="text-base font-bold leading-tight text-white">
                                            {{ $concert->date?->format('d') }}
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-[13px] font-semibold leading-tight mb-1 truncate text-white">
                                            {{ $concert->title }}
                                        </div>
                                        @if ($concert->location)
                                            <div class="text-[11px] text-[#555555] truncate mb-0.5">
                                                {{ $concert->location }}
                                            </div>
                                        @endif
                                        <div class="flex items-center gap-2">
                                            @php
                                                $badge =
                                                    $concert->status === 'in_preparation'
                                                        ? ['text' => __('app.status_preparing'), 'color' => '#ffcc00']
                                                        : ['text' => __('app.status_upcoming'), 'color' => '#00ff88'];
                                            @endphp
                                            <span class="text-[9px] font-semibold px-1.5 py-0.5 rounded-sm"
                                                style="color:{{ $badge['color'] }}; background-color:{{ $badge['color'] }}18">
                                                {{ $badge['text'] }}
                                            </span>
                                            @if ($concert->works->count() > 0)
                                                <span class="text-[10px] text-[#444444]">
                                                    🎵
                                                    {{ trans_choice('app.concerts_works', $concert->works->count(), ['count' => $concert->works->count()]) }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Past --}}
                @if ($past->isNotEmpty())
                    <div>
                        <div
                            class="px-2 py-1 text-[10px] font-semibold tracking-widest text-[#555555] flex items-center gap-1.5 uppercase mb-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#555555] inline-block"></span>
                            {{ __('app.status_label_past') }}
                        </div>
                        @foreach ($past as $concert)
                            @php $isActive = $selectedConcertId === $concert->id; @endphp
                            <div wire:click="selectConcert({{ $concert->id }})"
                                class="px-3 py-2.5 my-0.5 rounded-lg cursor-pointer transition select-none border
                                {{ $isActive ? 'bg-[#2a2a2a] border-[#444444]' : 'border-transparent hover:bg-[#1a1a1a]' }}">
                                <div class="flex gap-3 items-start">
                                    <div class="text-center min-w-8 shrink-0 bg-[#1e1e1e] rounded p-1">
                                        <div class="text-[9px] font-semibold text-[#555555] tracking-wide uppercase">
                                            {{ $concert->date?->format('M') }}
                                        </div>
                                        <div class="text-base font-bold leading-tight text-[#555555]">
                                            {{ $concert->date?->format('d') }}
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div
                                            class="text-[13px] font-semibold leading-tight mb-0.5 truncate text-[#666666]">
                                            {{ $concert->title }}
                                        </div>
                                        @if ($concert->location)
                                            <div class="text-[11px] text-[#444444] truncate">{{ $concert->location }}
                                            </div>
                                        @endif
                                        <div class="text-[10px] text-[#3a3a3a] mt-0.5">
                                            🎵
                                            {{ trans_choice('app.concerts_works', $concert->works->count(), ['count' => $concert->works->count()]) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ($upcoming->isEmpty() && $past->isEmpty())
                    <div class="text-center py-10 text-[#444444] text-sm">
                        {{ __('app.concerts_no_records') }}
                    </div>
                @endif
            </div>

            {{-- Add concert button (admin only) --}}
            @if ($this->isAdmin())
                <div class="p-3 border-t border-[#1e1e1e]">
                    <button wire:click="openAddConcert"
                        class="w-full py-2 px-4 rounded-lg text-xs font-semibold bg-white text-black hover:opacity-90 transition select-none cursor-pointer flex items-center justify-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <line x1="12" x2="12" y1="5" y2="19" />
                            <line x1="5" x2="19" y1="12" y2="12" />
                        </svg>
                        {{ __('app.concerts_new') }}
                    </button>
                </div>
            @endif

            {{-- Groups list (sidebar) --}}
        @else
            <div class="flex-1 overflow-y-auto py-3 px-3 space-y-2">
                <p class="text-[10px] font-semibold tracking-widest text-[#555555] uppercase px-1 mb-2">
                    {{ __('app.work_groups_title') }}
                </p>
                @foreach ($allGroups as $group)
                    @php $isActive = $selectedGroupId === $group->id; @endphp
                    <div wire:click="selectGroup({{ $group->id }})"
                        class="bg-[#1a1a1a] border rounded-xl p-3.5 cursor-pointer transition select-none hover:bg-[#222222]
                        {{ $isActive ? 'border-white' : 'border-[#2a2a2a]' }}">
                        <div class="flex items-center gap-2.5 mb-1">
                            <span class="w-2.5 h-2.5 rounded-full shrink-0"
                                style="background-color:{{ $group->color }}"></span>
                            <span class="text-sm font-semibold text-white">{{ $group->name }}</span>
                        </div>
                        @if ($group->description)
                            <p class="text-xs text-[#666666] ml-5">{{ $group->description }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- ================================================================
         RIGHT PANEL
    ================================================================ --}}
    <div class="flex-grow overflow-y-auto">

        {{-- ── CONCERTS TAB ──────────────────────────────────────────── --}}
        @if ($activeTab === 'concerts')

            {{-- ADD CONCERT MODAL --}}
            @if ($showAddModal)
                <div class="p-6 md:p-10 max-w-2xl">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-bold text-white">{{ __('app.concerts_modal_new_title') }}</h1>
                        <button wire:click="closeAdd" class="text-[#555555] hover:text-white transition cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <line x1="18" x2="6" y1="6" y2="18" />
                                <line x1="6" x2="18" y1="6" y2="18" />
                            </svg>
                        </button>
                    </div>
                    @include('livewire.concerts.partials.concert-form', ['isNew' => true])
                </div>

                {{-- EDIT CONCERT MODAL --}}
            @elseif($showEditModal)
                <div class="p-6 md:p-10 max-w-2xl">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-bold text-white">{{ __('app.concerts_modal_edit_title') }}</h1>
                        <div class="flex items-center gap-3">
                            <button wire:click="deleteConcert({{ $editingConcertId }})"
                                wire:confirm="{{ __('app.concerts_confirm_delete') }}"
                                class="text-[#ff4444] hover:text-red-300 transition text-xs font-semibold cursor-pointer flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M3 6h18" />
                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                </svg>
                                {{ __('app.delete') }}
                            </button>
                            <button wire:click="closeEdit"
                                class="text-[#555555] hover:text-white transition cursor-pointer">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <line x1="18" x2="6" y1="6" y2="18" />
                                    <line x1="6" x2="18" y1="6" y2="18" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    @include('livewire.concerts.partials.concert-form', ['isNew' => false])
                </div>

                {{-- CONCERT DETAIL --}}
            @elseif($selectedConcert)
                <div class="p-6 md:p-10">

                    {{-- Status badge + edit button --}}
                    <div class="flex items-start justify-between mb-4 gap-4">
                        @php
                            $statusConfig = [
                                'upcoming' => ['label' => __('app.status_upcoming'), 'color' => '#00ff88'],
                                'in_preparation' => ['label' => __('app.status_preparing'), 'color' => '#ffcc00'],
                                'past' => ['label' => __('app.status_past'), 'color' => '#555555'],
                            ];
                            $sc = $statusConfig[$selectedConcert->status] ?? ['label' => '—', 'color' => '#888'];
                        @endphp
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 border rounded-full text-xs font-medium"
                            style="color:{{ $sc['color'] }}; border-color:{{ $sc['color'] }}40; background-color:{{ $sc['color'] }}15">
                            <span class="w-1.5 h-1.5 rounded-full inline-block"
                                style="background-color:{{ $sc['color'] }}"></span>
                            {{ $sc['label'] }}
                        </div>

                        @if ($this->isAdmin())
                            <button wire:click="openEdit({{ $selectedConcert->id }})"
                                class="flex items-center gap-1.5 text-xs text-[#888888] hover:text-white border border-[#333333] hover:border-[#555555] rounded-lg px-3 py-1.5 transition cursor-pointer shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                                {{ __('app.edit') }}
                            </button>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h1 class="text-3xl md:text-[32px] font-bold text-white mb-5 leading-tight">
                        {{ $selectedConcert->title }}
                    </h1>

                    {{-- Meta info --}}
                    <div class="flex flex-wrap gap-5 mb-8 text-sm text-[#888888]">
                        @if ($selectedConcert->date)
                            <div class="flex items-center gap-1.5">
                                <span>📅</span>
                                <span>{{ $selectedConcert->date->translatedFormat('j \d\e F \d\e Y') }}</span>
                            </div>
                        @endif
                        @if ($selectedConcert->time)
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($selectedConcert->time)->format('H:i') }} h</span>
                            </div>
                        @endif
                        @if ($selectedConcert->location)
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                <span>{{ $selectedConcert->location }}</span>
                            </div>
                        @endif
                        @if ($selectedConcert->vestuario)
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path
                                        d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.57a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.57a2 2 0 0 0-1.34-2.23z" />
                                </svg>
                                <span>{{ $selectedConcert->vestuario }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Notes --}}
                    @if ($selectedConcert->notes)
                        <div
                            class="mb-8 bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl p-4 text-sm text-[#aaaaaa] leading-relaxed">
                            {{ $selectedConcert->notes }}
                        </div>
                    @endif

                    {{-- ── Repertoire ──────────────────────────────── --}}
                    <div class="mb-8">
                        <p
                            class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-4 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M9 18V5l12-2v13" />
                                <circle cx="6" cy="18" r="3" />
                                <circle cx="18" cy="16" r="3" />
                            </svg>
                            {{ __('app.concerts_repertoire_label') }}
                            @if ($selectedConcert->works->count() > 0)
                                —
                                {{ mb_strtoupper(trans_choice('app.concerts_works', $selectedConcert->works->count(), ['count' => $selectedConcert->works->count()])) }}
                            @endif
                        </p>

                        @if ($selectedConcert->works->isEmpty())
                            <div class="bg-[#1a1a1a] border border-dashed border-[#2a2a2a] rounded-xl p-8 text-center">
                                <div class="text-3xl mb-3">🎼</div>
                                <p class="text-sm text-[#555555] font-medium">
                                    {{ __('app.concerts_repertoire_pending') }}</p>
                                @if ($this->isAdmin())
                                    <button wire:click="openEdit({{ $selectedConcert->id }})"
                                        class="mt-3 text-xs text-[#4488ff] hover:underline cursor-pointer">
                                        {{ __('app.concerts_add_works') }}
                                    </button>
                                @endif
                            </div>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2.5">
                                @foreach ($selectedConcert->works as $work)
                                    <div
                                        class="bg-[#1a1a1a] border border-[#2a2a2a] hover:border-[#444444] rounded-lg px-3.5 py-2.5 flex items-center justify-between gap-3 transition duration-150">
                                        <div class="flex items-center gap-2.5 min-w-0 flex-grow">
                                            <span class="text-xs text-[#555555] font-semibold min-w-5 shrink-0">
                                                {{ str_pad($work->order, 2, '0', STR_PAD_LEFT) }}
                                            </span>
                                            <div class="text-sm font-semibold text-white truncate"
                                                title="{{ $work->title }}">{{ $work->title }}</div>
                                        </div>
                                        @if ($work->youtube_url)
                                            <a href="{{ $work->youtube_url }}" target="_blank"
                                                rel="noopener noreferrer"
                                                class="flex items-center gap-1.5 text-xs text-[#ff4444] hover:text-red-300 border border-[#333333] hover:border-[#ff444440] bg-[#ff444410] px-2.5 py-1 rounded-md shrink-0 transition"
                                                title="YouTube">
                                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                                </svg>
                                                <span class="hidden sm:inline">YouTube</span>
                                            </a>
                                        @else
                                            <a href="https://www.youtube.com/results?search_query={{ urlencode($work->title . ' banda de musica') }}"
                                                target="_blank" rel="noopener noreferrer"
                                                class="flex items-center gap-1 text-xs text-[#555555] hover:text-white border border-[#2a2a2a] hover:border-[#555555] bg-[#222222] px-2.5 py-1 rounded-md shrink-0 transition"
                                                title="{{ __('app.search') }}">
                                                <span class="text-[10px]">▶</span>
                                                <span class="hidden sm:inline">{{ __('app.search') }}</span>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    {{-- ── Work Groups assigned (at the bottom) ─────────────────────── --}}
                    <div class="mt-8 border-t border-[#222222] pt-8">
                        <p
                            class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-4 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            {{ __('app.concerts_setup_label') }}
                        </p>

                        @if ($selectedConcert->workGroups->isEmpty())
                            <div class="bg-[#1a1a1a] border border-dashed border-[#2a2a2a] rounded-xl p-5 text-center">
                                <p class="text-xs text-[#444444]">{{ __('app.concerts_no_groups_assigned') }}</p>
                            </div>
                        @else
                            <div class="flex flex-col sm:flex-row flex-wrap gap-4">
                                @foreach ($selectedConcert->workGroups as $group)
                                    <div wire:click="showGroup({{ $group->id }})"
                                        class="flex-1 min-w-[280px] bg-[#1a1a1a] border border-[#2a2a2a] hover:border-[#555555] rounded-2xl p-4 cursor-pointer select-none transition flex flex-col justify-between gap-3 group">
                                        
                                        <div>
                                            <div class="flex items-center justify-between gap-2 mb-1.5">
                                                <div class="flex items-center gap-2.5 min-w-0">
                                                    <span class="w-3 h-3 rounded-full shrink-0"
                                                        style="background-color:{{ $group->color }}"></span>
                                                    <h3 class="text-base font-bold text-white group-hover:text-white truncate">
                                                        {{ $group->name }}
                                                    </h3>
                                                </div>
                                                <span class="text-[11px] font-medium text-[#777777] bg-[#222222] border border-[#333333] px-2.5 py-0.5 rounded-full shrink-0">
                                                    {{ trans_choice('app.group_participants_count', $group->users->count(), ['count' => $group->users->count()]) }}
                                                </span>
                                            </div>

                                            @if ($group->description)
                                                <p class="text-xs text-[#666666] leading-relaxed line-clamp-2">
                                                    {{ $group->description }}
                                                </p>
                                            @endif
                                        </div>

                                        {{-- Members preview --}}
                                        <div class="border-t border-[#262626] pt-3 mt-1">
                                            @if ($group->users->isEmpty())
                                                <p class="text-xs text-[#444444] italic">Sin integrantes asignados</p>
                                            @else
                                                <div class="flex flex-wrap items-center gap-1.5">
                                                    @foreach ($group->users->take(4) as $user)
                                                        @php
                                                            $words = explode(' ', $user->name);
                                                            $initials = '';
                                                            foreach (array_slice($words, 0, 2) as $w) {
                                                                $initials .= mb_substr($w, 0, 1);
                                                            }
                                                            $initials = mb_strtoupper($initials);
                                                        @endphp
                                                        <div class="inline-flex items-center gap-1.5 bg-[#222222] border border-[#2e2e2e] rounded-full pl-1 pr-2.5 py-0.5 text-xs text-[#cccccc]"
                                                            title="{{ $user->name }} ({{ $user->instrument ?? __('app.role_musician') }})">
                                                            <span class="w-5 h-5 rounded-full bg-[#333333] text-[9px] font-bold text-white flex items-center justify-center shrink-0">
                                                                {{ $initials }}
                                                            </span>
                                                            <span class="truncate max-w-[110px] text-[11px] font-medium text-white">{{ $user->name }}</span>
                                                        </div>
                                                    @endforeach

                                                    @if ($group->users->count() > 4)
                                                        <span class="text-[11px] font-semibold text-[#888888] bg-[#222222] px-2.5 py-0.5 rounded-full border border-[#2e2e2e]">
                                                            +{{ $group->users->count() - 4 }} más
                                                        </span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="flex items-center justify-center h-full min-h-[300px]">
                    <p class="text-sm text-[#444444]">{{ __('app.concerts_select_to_view') }}</p>
                </div>
            @endif

            {{-- ── GROUPS TAB ────────────────────────────────────────────── --}}
        @else
            <div class="p-6 md:p-10">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-[10px] font-semibold tracking-widest uppercase text-[#555555] mb-0.5">
                            {{ __('app.organization_label') }}</p>
                        <h1 class="text-2xl font-bold text-white">{{ __('app.work_groups_title') }}</h1>
                    </div>
                </div>

                <p class="text-sm text-[#666666] mb-8 max-w-lg">
                    {{ __('app.work_groups_description', ['count' => $allGroups->count()]) }}
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
                    @foreach ($allGroups as $group)
                        @php
                            $isGroupSelected = $selectedGroupId === $group->id;
                            $memberCount = $group->users->count();
                        @endphp
                        <div wire:click="selectGroup({{ $group->id }})"
                            class="bg-[#1a1a1a] border rounded-2xl p-6 cursor-pointer transition select-none hover:border-[#555555]
                            {{ $isGroupSelected ? 'border-white' : 'border-[#2a2a2a]' }}">
                            {{-- Color stripe accent --}}
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center mb-4"
                                style="background-color:{{ $group->color }}20; border: 1px solid {{ $group->color }}40">
                                <span class="w-3.5 h-3.5 rounded-full"
                                    style="background-color:{{ $group->color }}"></span>
                            </div>

                            <div class="text-xl md:text-2xl font-bold text-white mb-1.5">{{ $group->name }}</div>

                            @if ($group->description)
                                <p class="text-xs text-[#666666] leading-relaxed mb-3">{{ $group->description }}</p>
                            @else
                                <p class="text-xs text-[#3a3a3a] italic mb-3">{{ __('app.no_description') }}</p>
                            @endif

                            <div class="flex items-center gap-1.5 text-[11px] text-[#555555] mt-auto">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                                {{ trans_choice('app.group_participants_count', $memberCount, ['count' => $memberCount]) }}
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Group Members list --}}
                @if ($selectedGroupId)
                    @php
                        $activeGroup = $allGroups->firstWhere('id', $selectedGroupId);
                    @endphp
                    @if ($activeGroup)
                        <div class="mt-8 bg-[#161616] border border-[#2a2a2a] rounded-2xl p-6">
                            <div class="flex items-center gap-3 border-b border-[#222222] pb-4 mb-6">
                                <span class="w-3.5 h-3.5 rounded-full"
                                    style="background-color:{{ $activeGroup->color }}"></span>
                                <h2 class="text-lg font-bold text-white">
                                    {{ __('app.group_members_of', ['name' => $activeGroup->name]) }}</h2>
                                <span
                                    class="text-xs text-[#555555] font-semibold">({{ __('app.group_musicians_count', ['count' => $activeGroup->users->count()]) }})</span>
                            </div>

                            @if ($activeGroup->users->isEmpty())
                                <p class="text-sm text-[#555555] italic">{{ __('app.group_no_participants') }}</p>
                            @else
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                    @foreach ($activeGroup->users as $user)
                                        @php
                                            // Generate initials for name
                                            $words = explode(' ', $user->name);
                                            $initials = '';
                                            foreach (array_slice($words, 0, 2) as $w) {
                                                $initials .= mb_substr($w, 0, 1);
                                            }
                                            $initials = mb_strtoupper($initials);
                                        @endphp
                                        <div
                                            class="bg-[#1a1a1a] border border-[#222222] rounded-xl p-3 flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-[#2a2a2a] flex items-center justify-center text-xs font-bold text-white shrink-0">
                                                {{ $initials }}
                                            </div>
                                            <div class="min-w-0">
                                                <div class="text-sm font-semibold text-white truncate leading-tight">
                                                    {{ $user->name }}</div>
                                                <div class="text-[11px] text-[#666666] leading-tight mt-0.5">
                                                    {{ $user->instrument ?? __('app.role_musician') }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif
                @else
                    <div class="bg-[#161616] border border-dashed border-[#222222] rounded-2xl p-8 text-center mt-8">
                        <div class="text-3xl mb-3">👷</div>
                        <p class="text-sm text-[#555555] font-medium">{{ __('app.group_select_to_view') }}</p>
                    </div>
                @endif
            </div>
        @endif

    </div>{{-- /right panel --}}
</div>
