<div class="flex flex-col md:flex-row h-full min-h-[calc(100vh-48px)]">

    <!-- Left side control panel -->
    <div class="w-full md:w-[280px] md:min-w-[280px] border-b md:border-b-0 md:border-r border-[#222222] py-6 overflow-y-auto flex flex-col gap-4">
        
        <!-- Role switcher -->
        <div class="px-4 pb-2">
            <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-3">
                ACCESO ACTUAL
            </p>
            <div class="flex gap-2">
                <button 
                    wire:click="toggleRole('admin')"
                    class="flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-[13px] font-semibold transition cursor-pointer select-none
                    {{ $currentRole === 'admin' ? 'bg-white text-black' : 'bg-transparent text-[#888888] border border-[#333333]' }}"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 13c0 5-3.5 7.5-7.66 9.7a1 1 0 0 1-.68 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.8 17 5 19 5a1 1 0 0 1 1 1z"/></svg>
                    Administrador
                </button>
                <button 
                    wire:click="toggleRole('member')"
                    class="flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-[13px] font-semibold transition cursor-pointer select-none
                    {{ $currentRole === 'member' ? 'bg-white text-black' : 'bg-transparent text-[#888888] border border-[#333333]' }}"
                >
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    Miembro
                </button>
            </div>
        </div>

        <!-- Stats summary -->
        <div class="px-4">
            <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl p-4">
                <div class="grid grid-cols-3 gap-2 text-center">
                    <div>
                        <div class="text-xl font-bold text-white">4</div>
                        <div class="text-[9px] font-semibold tracking-wider text-[#555555]">MIEMBROS</div>
                    </div>
                    <div>
                        <div class="text-xl font-bold text-white">5</div>
                        <div class="text-[9px] font-semibold tracking-wider text-[#555555]">EVENTOS</div>
                    </div>
                    <div>
                        <div class="text-xl font-bold text-white">12</div>
                        <div class="text-[9px] font-semibold tracking-wider text-[#555555]">HILOS</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="px-2 space-y-0.5 flex-grow overflow-y-auto max-h-[300px] md:max-h-none py-2 md:py-0">
            @php
                $adminActionsList = [
                    ['id' => 'members', 'label' => 'Gestionar miembros', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>', 'badge' => ['text' => '4 activos', 'color' => '#00ff88']],
                    ['id' => 'announce', 'label' => 'Publicar anuncio', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 19c-1.1 0-2-.9-2-2V7c0-1.1.9-2 2-2h4v14h-4z"/><path d="M16 5h1a4 4 0 0 1 4 4v6a4 4 0 0 1-4 4h-1"/><path d="M6 9H4.5a2.5 2.5 0 0 0 0 5H6"/><line x1="10" x2="6" y1="12" y2="12"/></svg>'],
                    ['id' => 'moderate', 'label' => 'Moderar foro', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>', 'badge' => ['text' => '2 reportes', 'color' => '#ff6633']],
                    ['id' => 'album', 'label' => 'Gestionar álbum', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>', 'badge' => ['text' => '1 pendiente', 'color' => '#4488ff']],
                    ['id' => 'notify', 'label' => 'Enviar notificación', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>'],
                    ['id' => 'reports', 'label' => 'Ver informes', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>'],
                ];
            @endphp

            @foreach($adminActionsList as $action)
                @php $isActiveAction = ($selectedAction === $action['id']); @endphp
                <div
                    wire:click="selectAction('{{ $action['id'] }}')"
                    class="flex items-center gap-3 p-3 rounded-lg cursor-pointer border transition select-none
                    {{ $isActiveAction ? 'bg-[#2a2a2a] border-[#444444]' : 'border-transparent hover:bg-[#1a1a1a]' }}"
                >
                    <span class="shrink-0 {{ $isActiveAction ? 'text-white' : 'text-[#666666]' }}">
                        {!! $action['icon'] !!}
                    </span>
                    <span class="flex-grow text-sm truncate {{ $isActiveAction ? 'text-white font-medium' : 'text-[#aaaaaa]' }}">
                        {{ $action['label'] }}
                    </span>
                    @if(isset($action['badge']))
                        <span class="text-[9px] px-2 py-0.5 rounded-full border shrink-0 font-medium tracking-wide"
                              style="background-color: {{ $action['badge']['color'] }}20; color: {{ $action['badge']['color'] }}; border-color: {{ $action['badge']['color'] }}40;">
                            {{ $action['badge']['text'] }}
                        </span>
                    @endif
                    <svg class="w-3.5 h-3.5 text-[#444444] shrink-0 ml-1" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            @endforeach
        </div>

    </div>

    <!-- Right Side Detail Panel -->
    <div class="flex-grow p-6 md:p-10 overflow-y-auto">

        <!-- PANEL: MEMBERS -->
        @if($selectedAction === 'members')
            <div>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold text-white">Miembros</h2>
                    <button class="px-4 py-2 bg-white text-black rounded-lg text-xs font-semibold hover:opacity-90 transition cursor-pointer select-none">
                        + Añadir
                    </button>
                </div>
                <div class="space-y-2">
                    @foreach($membersList as $m)
                        <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-xl p-3.5 flex items-center gap-3.5">
                            <div class="w-9 h-9 rounded-full bg-[#333333] flex items-center justify-center text-xs font-bold text-white shrink-0">
                                {{ $m['initials'] }}
                            </div>
                            <div class="flex-grow min-w-0">
                                <div class="text-sm font-semibold text-white truncate leading-tight">{{ $m['name'] }}</div>
                                <div class="text-xs text-[#666666] leading-tight mt-0.5">{{ $m['role'] }}</div>
                            </div>
                            @if($m['isAdmin'])
                                <span class="text-[10px] font-semibold text-[#00ff88] bg-[#00ff8820] border border-[#00ff8840] px-2.5 py-0.5 rounded-full uppercase shrink-0">
                                    Admin
                                </span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

        <!-- PANEL: ANNOUNCE -->
        @elseif($selectedAction === 'announce')
            <div>
                <h2 class="text-lg font-bold text-white mb-6">Publicar anuncio</h2>
                
                @if($announceSent)
                    <div class="p-5 bg-[#0d2a1a] border border-[#00aa5540] rounded-xl text-center mb-5">
                        <div class="text-2xl mb-2">📢</div>
                        <div class="text-[15px] font-bold text-[#00ff88]">¡Anuncio publicado con éxito!</div>
                        <div class="text-xs text-[#888888] mt-1">Todos los miembros de la banda recibirán la alerta.</div>
                    </div>
                @endif

                <div class="space-y-4">
                    <div>
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            MENSAJE
                        </label>
                        <textarea
                            wire:model="announceText"
                            placeholder="Escribe el anuncio para toda la banda..."
                            rows="5"
                            class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none resize-y transition"
                        ></textarea>
                    </div>
                    <button
                        wire:click="publishAnnouncement"
                        @if(empty(trim($announceText))) disabled @endif
                        class="py-2.5 px-6 rounded-lg font-semibold text-sm transition select-none
                        {{ !empty(trim($announceText)) ? 'bg-white text-black hover:opacity-90 cursor-pointer' : 'bg-[#333333] text-[#666666] cursor-not-allowed' }}"
                    >
                        Publicar
                    </button>
                </div>
            </div>

        <!-- OTHERS PLACEHOLDER -->
        @else
            <div class="flex flex-col items-center justify-center min-h-[200px] gap-3">
                <div class="text-[#333333]">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                </div>
                <p class="text-xs text-[#555555] capitalize">{{ $selectedAction }} — próximamente</p>
            </div>
        @endif

    </div>

</div>
