<div class="p-6 md:p-10 min-h-full">

    <!-- Header -->
    <div class="mb-8">
        <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-2">
            AGENDA
        </p>
        <h1 class="text-3xl font-bold text-white">Calendario</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-[1fr_340px] gap-6 items-start">

        <!-- === CALENDAR === -->
        <div class="bg-[#1a1a1a] border border-[#333333] rounded-xl p-6">
            <!-- Month Nav -->
            <div class="flex items-center justify-between mb-6">
                <button
                    wire:click="prevMonth"
                    class="bg-none border-none cursor-pointer text-[#888888] hover:text-white p-1 flex items-center transition"
                >
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                @php
                    $months = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                    $monthName = $months[$viewMonth];
                @endphp
                <span class="text-[15px] font-bold text-white tracking-wider">
                    {{ $monthName }} {{ $viewYear }}
                </span>
                <button
                    wire:click="nextMonth"
                    class="bg-none border-none cursor-pointer text-[#888888] hover:text-white p-1 flex items-center transition"
                >
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>

            <!-- Day headers -->
            <div class="grid grid-cols-7 mb-2">
                @foreach(['LUN', 'MAR', 'MIÉ', 'JUE', 'VIE', 'SÁB', 'DOM'] as $d)
                    <div class="text-center text-[11px] font-semibold text-[#555555] py-1 tracking-wider">
                        {{ $d }}
                    </div>
                @endforeach
            </div>

            <!-- Day cells -->
            <div class="grid grid-cols-7 gap-0.5">
                @foreach($cells as $index => $day)
                    @if(is_null($day))
                        <div></div>
                    @else
                        @php
                            $isToday = ($day === 18 && $viewMonth === 5 && $viewYear === 2026);
                            $isSelected = ($day === $selectedDay);
                            $hasEvent = in_array($day, $eventDays);
                        @endphp
                        <div
                            wire:click="selectDay({{ $day }})"
                            class="relative flex flex-col items-center justify-center h-11 rounded-lg cursor-pointer transition select-none
                            {{ $isToday ? 'bg-white text-black font-bold' : ($isSelected ? 'bg-[#333333] border border-[#555555] text-white' : 'text-white hover:bg-[#2a2a2a]') }}"
                        >
                            <span>{{ $day }}</span>
                            @if($hasEvent)
                                <span class="absolute bottom-1 w-1 h-1 rounded-full {{ $isToday ? 'bg-black' : 'bg-[#888888]' }}"></span>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Legend -->
            <div class="flex flex-wrap gap-5 mt-5 pt-4 border-t border-[#222222]">
                @php
                    $colors = [
                        'Ensayo' => '#4488ff',
                        'Concierto' => '#ff6633',
                        'Estudio' => '#aa44ff',
                        'Reunión' => '#ffaa00',
                    ];
                @endphp
                @foreach($colors as $type => $color)
                    <div class="flex items-center gap-1.5 text-xs text-[#888888]">
                        <span class="width-2 h-2 w-2 rounded-full inline-block" style="background-color: {{ $color }};"></span>
                        {{ $type }}
                    </div>
                @endforeach
            </div>
        </div>

        <!-- === EVENT LIST === -->
        <div>
            <div class="flex justify-between items-center mb-4">
                <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888]">
                    DESDE EL 12 JUN
                </p>
                <span class="text-xs text-[#888888] cursor-pointer underline hover:text-white transition">Ver todos</span>
            </div>

            <div class="flex flex-col gap-2.5">
                @foreach($events as $ev)
                    @php
                        $eventColors = [
                            'Ensayo' => '#4488ff',
                            'Concierto' => '#ff6633',
                            'Estudio' => '#aa44ff',
                            'Reunión' => '#ffaa00',
                        ];
                        $borderColor = $ev['calendarDay'] === $selectedDay ? 'border-[#555555] bg-[#222222]' : 'border-[#333333] bg-[#1a1a1a]';
                    @endphp
                    <div
                        wire:click="selectDay({{ $ev['calendarDay'] }})"
                        class="border rounded-xl p-3.5 flex gap-3.5 transition cursor-pointer hover:border-[#555555] {{ $borderColor }}"
                    >
                        <!-- Date badge -->
                        <div class="text-center min-w-9 shrink-0 flex flex-col justify-center">
                            <div class="text-[10px] font-semibold text-[#888888] tracking-wider">{{ $ev['monthStr'] }}</div>
                            <div class="text-xl font-bold text-white leading-tight">{{ $ev['dayNum'] }}</div>
                        </div>
                        <div class="flex-grow">
                            <div class="text-sm font-semibold text-white mb-1.5">{{ $ev['title'] }}</div>
                            <div class="flex flex-col gap-0.5 mb-2 text-xs text-[#888888]">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    {{ $ev['time'] }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                    {{ $ev['location'] }}
                                </span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-medium bg-[#222222] border border-[#333333]" style="color: {{ $eventColors[$ev['type']] }};">
                                {{ $ev['type'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
