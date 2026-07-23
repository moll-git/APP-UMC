<div class="flex flex-col md:flex-row h-full min-h-[calc(100vh-48px)]">

    <!-- Left side control panel -->
    <div class="w-full md:w-[280px] md:min-w-[280px] border-b md:border-b-0 md:border-r border-[#222222] py-6 overflow-y-auto flex flex-col gap-4">



        <!-- Actions -->
        <div class="px-2 space-y-0.5 flex-grow overflow-y-auto max-h-[300px] md:max-h-none py-2 md:py-0">
            @php
                $adminActionsList = [
                    ['id' => 'members',  'label' => 'Gestionar miembros',       'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>', 'badge' => ['text' => '4 activos',    'color' => '#00ff88']],
                    ['id' => 'announce', 'label' => 'Publicar anuncio',          'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 19c-1.1 0-2-.9-2-2V7c0-1.1.9-2 2-2h4v14h-4z"/><path d="M16 5h1a4 4 0 0 1 4 4v6a4 4 0 0 1-4 4h-1"/><path d="M6 9H4.5a2.5 2.5 0 0 0 0 5H6"/><line x1="10" x2="6" y1="12" y2="12"/></svg>'],
                    ['id' => 'moderate', 'label' => 'Moderar foro',              'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>', 'badge' => ['text' => '2 reportes',  'color' => '#ff6633']],
                    ['id' => 'album',    'label' => 'Gestionar álbum',           'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>', 'badge' => ['text' => '1 pendiente', 'color' => '#4488ff']],
                    ['id' => 'notify',   'label' => 'Enviar notificación',       'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>'],
                    ['id' => 'reports',  'label' => 'Ver informes',              'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/></svg>'],
                    ['id' => 'delegat',  'label' => 'Enviar formulari delegat',  'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>'],
                    ['id' => 'grups',    'label' => 'Grups de treball',          'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>'],
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
                            wire:model.live="announceText"
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

        <!-- PANEL: DELEGAT -->
        @elseif($selectedAction === 'delegat')
            <div>
                <h2 class="text-lg font-bold text-white mb-6">Enviar Notificació del Delegat</h2>

                <div class="grid grid-cols-2 gap-4 mb-6">

                    <!-- ROW 1: DIA DE LA SETMANA | NÚMERO DE DIA I MES -->
                    <div>
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            DIA DE LA SETMANA
                        </label>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="delegat.dia_setmana"
                            placeholder="Ex: dissabte, divendres..."
                            class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
                        />
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            NÚMERO DE DIA I MES
                        </label>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="delegat.numero_dia"
                            placeholder="Ex: 20 de juny"
                            class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
                        />
                    </div>

                    <!-- ROW 2: HORA | LLOC DE REUNIÓ / EIXIDA -->
                    <div>
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            HORA
                        </label>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="delegat.hora"
                            placeholder="Ex: 20:00, 13:45..."
                            class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
                        />
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            LLOC DE REUNIÓ
                        </label>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="delegat.lloc_reunio"
                            placeholder="Ex: a la UMC, els borts..."
                            class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
                        />
                    </div>

                    <!-- ROW 3: TIPUS D'ACTE | POBLE O DETALLS -->
                    <div>
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            TIPUS D'ACTE
                        </label>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="delegat.tipus_acte"
                            placeholder="Ex: una entrà cristiana..."
                            class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
                        />
                    </div>

                    <div>
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            DETALLS EXTRA (OPCIONAL)
                        </label>
                        <input
                            type="text"
                            wire:model.live.debounce.300ms="delegat.poble_detalls"
                            placeholder="Ex: en cas de dur bolset, serà el de la banda"
                            class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
                        />
                    </div>

                    <!-- ROW 4: UNIFORME -->
                    <div class="col-span-2">
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            UNIFORME
                        </label>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input
                                    type="radio"
                                    wire:model.live="delegat.uniforme"
                                    value="estiu"
                                    class="w-4 h-4 cursor-pointer accent-blue-500"
                                />
                                <span class="text-sm text-white">Estiu</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input
                                    type="radio"
                                    wire:model.live="delegat.uniforme"
                                    value="hivern"
                                    class="w-4 h-4 cursor-pointer accent-blue-500"
                                />
                                <span class="text-sm text-white">Hivern</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input
                                    type="radio"
                                    wire:model.live="delegat.uniforme"
                                    value="paisa"
                                    class="w-4 h-4 cursor-pointer accent-blue-500"
                                />
                                <span class="text-sm text-white">Paisà</span>
                            </label>
                        </div>
                    </div>

                    <!-- ROW 5: CONFIRMAR -->
                    <div class="col-span-2">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input
                                type="checkbox"
                                wire:model.live="delegat.confirmar"
                                class="w-5 h-5 cursor-pointer accent-blue-500 rounded"
                            />
                            <span class="text-sm text-white font-medium">Fer marcar CONFIRMAR al final del missatge</span>
                        </label>
                    </div>

                </div>

                <!-- PREVISUALITZACIÓ DEL MISSATGE (EDITABLE) -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase">
                            PREVISUALITZACIÓ DEL MISSATGE
                        </label>
                        <span class="text-[10px] text-[#444444] italic">Editable · els camps actualitzen la vista</span>
                    </div>
                    <textarea
                        wire:model.live="previewText"
                        placeholder="Completa els camps per veure la vista prèvia..."
                        rows="4"
                        class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-4 text-white text-sm leading-relaxed outline-none resize-y transition"
                    ></textarea>
                </div>

                <!-- BOTONES -->
                <div class="flex gap-3">
                    <button
                        wire:click="resetDelegatForm"
                        class="flex-1 py-3 px-6 rounded-lg font-semibold text-sm transition select-none flex items-center justify-center gap-2 bg-[#333333] text-[#aaaaaa] hover:bg-[#444444] cursor-pointer"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                        </svg>
                        Nou missatge
                    </button>
                    
                    <button
                        wire:click="sendDelegatMessage"
                        @if(empty(trim($previewText))) disabled @endif
                        class="flex-[2] py-3 px-6 rounded-lg font-semibold text-sm transition select-none flex items-center justify-center gap-2
                        {{ !empty(trim($previewText)) ? 'bg-[#25D366] text-white hover:opacity-90 cursor-pointer' : 'bg-[#333333] text-[#666666] cursor-not-allowed' }}"
                    >
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.272-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.73 1.122l-.339-.17-3.522.35.356 3.465-.221.339a9.9 9.9 0 00-1.51 5.026c0 5.45 4.436 9.886 9.888 9.886 1.331 0 2.622-.255 3.861-.745 5.454-1.494 9.027-6.873 9.027-12.141 0-5.468-4.437-9.886-9.888-9.886Z"/>
                        </svg>
                        Enviar per WhatsApp
                    </button>
                </div>
            </div>

        <!-- PANEL: GRUPS DE TREBALL -->
        @elseif($selectedAction === 'grups')
            <div>
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-lg font-bold text-white">Grups de treball</h2>
                        <p class="text-xs text-[#555555] mt-0.5">Gestiona els grups encarregats de muntar l'escenari</p>
                    </div>
                    <button
                        wire:click="openNewGroup"
                        class="px-4 py-2 bg-white text-black rounded-lg text-xs font-semibold hover:opacity-90 transition cursor-pointer select-none"
                    >
                        + Nou grup
                    </button>
                </div>

                {{-- New/Edit form --}}
                @if($showGroupForm)
                    <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-2xl p-5 mb-6">
                        <h3 class="text-sm font-semibold text-white mb-4">
                            {{ $editingGroupId ? 'Editar grup' : 'Nou grup' }}
                        </h3>
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">Nom *</label>
                                    <input
                                        type="text"
                                        wire:model.live="groupForm.name"
                                        placeholder="Ex: Grup 1"
                                        class="w-full bg-[#111111] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
                                    />
                                    @error('groupForm.name') <span class="text-xs text-red-400">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">Color</label>
                                    <div class="flex items-center gap-3">
                                        <input
                                            type="color"
                                            wire:model.live="groupForm.color"
                                            class="w-10 h-10 rounded-lg cursor-pointer border border-[#333333] bg-[#111111] p-0.5"
                                        />
                                        <input
                                            type="text"
                                            wire:model.live="groupForm.color"
                                            placeholder="#4488ff"
                                            class="flex-1 bg-[#111111] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">Descripció (opcional)</label>
                                <input
                                    type="text"
                                    wire:model.live="groupForm.description"
                                    placeholder="Ex: Membres: Joan, Pep, Maria..."
                                    class="w-full bg-[#111111] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
                                />
                            </div>
                            <div class="flex gap-3">
                                <button
                                    wire:click="cancelGroupForm"
                                    class="flex-1 py-2.5 px-4 rounded-lg text-sm font-semibold bg-[#2a2a2a] text-[#aaaaaa] hover:bg-[#333333] transition cursor-pointer select-none"
                                >
                                    Cancel·lar
                                </button>
                                @if($editingGroupId)
                                    <button
                                        wire:click="deleteGroup({{ $editingGroupId }})"
                                        wire:confirm="Segur que vols eliminar aquest grup?"
                                        class="px-4 py-2.5 rounded-lg text-sm font-semibold bg-[#ff444415] text-[#ff4444] border border-[#ff444430] hover:bg-[#ff444425] transition cursor-pointer select-none"
                                    >
                                        Eliminar
                                    </button>
                                @endif
                                <button
                                    wire:click="saveGroup"
                                    class="flex-[2] py-2.5 px-4 rounded-lg text-sm font-semibold bg-white text-black hover:opacity-90 transition cursor-pointer select-none"
                                >
                                    {{ $editingGroupId ? 'Guardar canvis' : 'Crear grup' }}
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Groups list --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach($allGroups as $group)
                        <div
                            wire:click="openEditGroup({{ $group->id }})"
                            class="bg-[#1a1a1a] border border-[#2a2a2a] hover:border-[#444444] rounded-2xl p-4 cursor-pointer transition group"
                        >
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0"
                                     style="background-color:{{ $group->color }}20; border:1px solid {{ $group->color }}40">
                                    <span class="w-2.5 h-2.5 rounded-full" style="background-color:{{ $group->color }}"></span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-semibold text-white truncate">{{ $group->name }}</div>
                                    <div class="text-[10px] text-[#555555]">{{ $group->color }}</div>
                                </div>
                                <svg class="w-4 h-4 text-[#333333] group-hover:text-[#666666] transition shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            </div>
                            @if($group->description)
                                <p class="text-xs text-[#555555] ml-11 leading-relaxed">{{ $group->description }}</p>
                            @else
                                <p class="text-xs text-[#333333] italic ml-11">Sense descripció · clica per editar</p>
                            @endif
                        </div>
                    @endforeach
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

    {{-- Abre WhatsApp en nueva pestaña cuando el servidor dispatcha el evento --}}
    @script
    <script>
        $wire.on('open-whatsapp', ({ url }) => window.open(url, '_blank'));
    </script>
    @endscript

</div>