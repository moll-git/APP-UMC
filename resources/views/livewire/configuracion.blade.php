<div class="flex flex-col md:flex-row h-full min-h-[calc(100vh-48px)]">

    <!-- Config Sidebar -->
    <div class="w-full md:w-[240px] md:min-w-[240px] bg-[#111111] border-b md:border-b-0 md:border-r border-[#222222] py-6 flex flex-col">
        <div class="px-4 pb-4">
            <p class="text-[11px] font-semibold tracking-widest uppercase text-[#888888] mb-1">
                PERSONALIZACIÓN
            </p>
            <h2 class="text-xl font-bold text-white">Configuración</h2>
        </div>

        <!-- User card -->
        <div class="px-2 pb-2">
            <div class="flex items-center gap-2.5 p-2.5 rounded-lg bg-[#1a1a1a] border border-[#333333] mb-2">
                <div class="w-[30px] h-[30px] rounded-full bg-[#444444] flex items-center justify-center text-xs font-semibold text-white shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="truncate">
                    <div class="text-[13px] font-medium text-white truncate leading-tight">{{ auth()->user()->name }}</div>
                    <div class="text-[11px] text-[#666666] leading-tight">{{ $instrument }}</div>
                </div>
            </div>
        </div>

        <!-- Sections -->
        <div class="px-2 flex-grow overflow-y-auto space-y-0.5">
            @php
                $sectionsList = [
                    ['id' => 'cuenta', 'label' => 'Cuenta', 'desc' => 'Foto, nombre y contraseña', 'icon' => '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>'],
                    ['id' => 'tema', 'label' => 'Tema de color', 'desc' => 'Apariencia de la aplicación', 'icon' => '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"/><path d="M12 18A6 6 0 1 0 12 6A6 6 0 0 0 12 18Z"/></svg>'],
                    ['id' => 'idioma', 'label' => 'Idioma', 'desc' => 'Idioma de la interfaz', 'icon' => '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" x2="22" y1="12" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>'],
                    ['id' => 'notif', 'label' => 'Notificaciones', 'desc' => 'Gestionar alertas', 'icon' => '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>'],
                    ['id' => 'ayuda', 'label' => 'Ayuda', 'desc' => 'Preguntas frecuentes', 'icon' => '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg>'],
                    ['id' => 'feedback', 'label' => 'Comentarios', 'desc' => 'Reportar un problema', 'icon' => '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>'],
                ];
            @endphp

            @foreach($sectionsList as $section)
                @php
                    $isSecActive = ($activeSection === $section['id']);
                @endphp
                <div
                    wire:click="changeSection('{{ $section['id'] }}')"
                    class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg cursor-pointer transition select-none border
                    {{ $isSecActive ? 'bg-[#2a2a2a] border-[#444444]' : 'border-transparent hover:bg-[#1a1a1a]' }}"
                >
                    <span class="shrink-0 {{ $isSecActive ? 'text-white' : 'text-[#555555]' }}">
                        {!! $section['icon'] !!}
                    </span>
                    <div class="min-w-0 flex-grow">
                        <div class="text-[13px] {{ $isSecActive ? 'text-white font-medium' : 'text-[#888888]' }} leading-tight">
                            {{ $section['label'] }}
                        </div>
                        <div class="text-[11px] text-[#555555] leading-tight truncate">
                            {{ $section['desc'] }}
                        </div>
                    </div>
                    @if(!$isSecActive)
                        <svg class="w-3 h-3 text-[#444444] shrink-0 ml-auto" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Footer -->
        <div class="p-3 border-t border-[#222222] mt-2">
            <p class="text-[10px] text-[#444444] text-center">UMC App · v1.0.0</p>
        </div>
    </div>

    <!-- Main Content Panel -->
    <div class="flex-grow p-6 md:p-10 md:px-12 overflow-y-auto">
        
        <!-- SECTION: CUENTA -->
        @if($activeSection === 'cuenta')
            <div class="max-w-[560px]">
                <h1 class="text-2xl font-bold text-white mb-6">Cuenta</h1>
                
                <!-- Avatar block -->
                <div class="flex gap-5 items-start mb-8">
                    <div class="relative shrink-0">
                        <div class="w-16 h-16 rounded-full bg-[#333333] border border-[#444444] flex items-center justify-center text-xl font-bold text-white">
                            {{ strtoupper(substr($name, 0, 1)) }}
                        </div>
                        <div class="absolute -bottom-0.5 -right-0.5 w-5.5 h-5.5 rounded-full bg-white flex items-center justify-center cursor-pointer border border-[#0a0a0a]">
                            <svg class="w-3 h-3 text-black" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                        </div>
                    </div>
                    <div>
                        <div class="text-base font-semibold text-white mb-0.5">{{ $name }}</div>
                        <div class="text-xs text-[#888888] mb-1.5">{{ $instrument }} · UMC Banda</div>
                        <div class="text-[10px] text-[#555555]">Pulsa el icono para cambiar la foto</div>
                    </div>
                </div>

                <!-- Fields -->
                <div class="space-y-5">
                    <div>
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            NOMBRE
                        </label>
                        <input
                            wire:model="name"
                            type="text"
                            class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg py-2 px-3 text-white text-sm outline-none transition"
                        />
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            INSTRUMENTO / ROL
                        </label>
                        <input
                            wire:model="instrument"
                            type="text"
                            class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg py-2 px-3 text-white text-sm outline-none transition"
                        />
                    </div>
                    <div>
                        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                            CORREO ELECTRÓNICO
                        </label>
                        <div class="relative">
                            <input 
                                value="{{ auth()->user()->email }}" 
                                readonly 
                                class="w-full bg-[#1a1a1a] border border-[#333333] rounded-lg py-2 pl-3 pr-24 text-[#888888] text-sm outline-none cursor-default" 
                            />
                            <div class="absolute right-2 top-1/2 -translate-y-1/2 flex items-center gap-1 text-[11px] text-[#00aa55] bg-[#0d2a1a] px-2.5 py-0.5 border border-[#00aa5530] rounded-full">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                Verificado
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <button
                            wire:click="saveCuenta"
                            class="flex-grow sm:flex-grow-0 py-2.5 px-8 rounded-lg font-semibold text-sm transition cursor-pointer select-none
                            {{ $saved ? 'bg-[#00aa55] text-white' : 'bg-white text-black hover:opacity-90' }}"
                        >
                            {{ $saved ? '✓ Guardado' : 'Guardar cambios' }}
                        </button>
                        <button class="bg-transparent text-[#888888] hover:text-white text-sm py-2 px-3 underline decoration-dotted cursor-pointer transition select-none">
                            Cambiar contraseña
                        </button>
                    </div>
                </div>
            </div>

        <!-- SECTION: TEMA DE COLOR -->
        @elseif($activeSection === 'tema')
            <div class="max-w-[560px]">
                <h1 class="text-2xl font-bold text-white mb-2">Tema de color</h1>
                <p class="text-sm text-[#888888] mb-6">Seleccione la apariencia de la aplicación. El cambio se aplica al instante.</p>
                
                @php
                    $themes = [
                        ['id' => 'dark', 'label' => 'Oscuro', 'colors' => ['#1a1a1a', '#333333']],
                        ['id' => 'slate', 'label' => 'Pizarra azul', 'colors' => ['#1e2a4a', '#2d4a8a']],
                        ['id' => 'forest', 'label' => 'Verde bosque', 'colors' => ['#1a3a2a', '#2a6a4a']],
                        ['id' => 'wine', 'label' => 'Vino tinto', 'colors' => ['#3a1a2a', '#8a2a5a']],
                        ['id' => 'light', 'label' => 'Claro', 'colors' => ['#f0f0f0', '#ffffff']],
                    ];
                @endphp

                <div class="space-y-2.5">
                    @foreach($themes as $theme)
                        @php $isThemeSelected = ($selectedTheme === $theme['id']); @endphp
                        <div
                            wire:click="$set('selectedTheme', '{{ $theme['id'] }}')"
                            class="flex items-center gap-4 p-4 rounded-xl cursor-pointer border bg-[#1a1a1a] transition select-none
                            {{ $isThemeSelected ? 'border-[#555555]' : 'border-[#2a2a2a] hover:border-[#444444]' }}"
                        >
                            <div class="flex rounded-md overflow-hidden shrink-0 border border-[#333333]">
                                <div class="w-6 h-8" style="background-color: {{ $theme['colors'][0] }};"></div>
                                <div class="w-6 h-8" style="background-color: {{ $theme['colors'][1] }};"></div>
                            </div>
                            <span class="flex-grow text-sm font-semibold text-white">{{ $theme['label'] }}</span>
                            @if($isThemeSelected)
                                <div class="w-[22px] h-[22px] rounded-full bg-[#4488ff] flex items-center justify-center shrink-0">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

        <!-- SECTION: IDIOMA -->
        @elseif($activeSection === 'idioma')
            <div class="max-w-[560px]">
                <h1 class="text-2xl font-bold text-white mb-2">Idioma</h1>
                <p class="text-sm text-[#888888] mb-6">Selecciona el idioma de la interfaz.</p>

                @php
                    $languages = [
                        ['code' => 'es', 'name' => 'Español', 'flag' => '🇪🇸', 'region' => 'España'],
                        ['code' => 'en', 'name' => 'English', 'flag' => '🇬🇧', 'region' => 'United Kingdom'],
                        ['code' => 'ca', 'name' => 'Català', 'flag' => '🏴', 'region' => 'Catalunya'],
                        ['code' => 'eu', 'name' => 'Euskara', 'flag' => '🏴', 'region' => 'País Vasco'],
                        ['code' => 'fr', 'name' => 'Français', 'flag' => '🇫🇷', 'region' => 'France'],
                        ['code' => 'de', 'name' => 'Deutsch', 'flag' => '🇩🇪', 'region' => 'Deutschland'],
                    ];
                @endphp

                <div class="space-y-2">
                    @foreach($languages as $lang)
                        @php $isLangSelected = ($selectedLanguage === $lang['code']); @endphp
                        <div
                            wire:click="$set('selectedLanguage', '{{ $lang['code'] }}')"
                            class="flex items-center gap-3.5 p-3.5 rounded-lg cursor-pointer border transition select-none
                            {{ $isLangSelected ? 'bg-[#2a2a2a] border-[#444444]' : 'bg-[#1a1a1a] border-[#2a2a2a] hover:border-[#444444]' }}"
                        >
                            <span class="text-2xl select-none">{{ $lang['flag'] }}</span>
                            <div class="flex-grow">
                                <div class="text-sm font-medium text-white">{{ $lang['name'] }}</div>
                                <div class="text-xs text-[#666666]">{{ $lang['region'] }}</div>
                            </div>
                            @if($isLangSelected)
                                <svg class="w-4 h-4 text-[#00ff88]" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

        <!-- SECTION: NOTIFICACIONES -->
        @elseif($activeSection === 'notif')
            <div class="max-w-[560px]">
                <h1 class="text-2xl font-bold text-white mb-2">Notificaciones</h1>
                <p class="text-sm text-[#888888] mb-6">Controla qué alertas deseas recibir.</p>

                <div class="space-y-2">
                    @foreach($notifications as $index => $n)
                        <div class="flex items-center gap-4 p-4 rounded-xl bg-[#1a1a1a] border border-[#2a2a2a]">
                            <div class="flex-grow min-w-0">
                                <div class="text-sm font-semibold text-white mb-0.5 truncate">{{ $n['label'] }}</div>
                                <div class="text-xs text-[#666666] leading-relaxed">{{ $n['desc'] }}</div>
                            </div>
                            <!-- Custom Switch/Toggle -->
                            <div
                                wire:click="toggleNotification({{ $index }})"
                                class="w-11 h-6 rounded-full cursor-pointer relative transition duration-200 shrink-0
                                {{ $n['enabled'] ? 'bg-[#00ff88]' : 'bg-[#333333]' }}"
                            >
                                <div class="w-4.5 h-4.5 rounded-full bg-white absolute top-0.5 transition-all duration-200
                                            {{ $n['enabled'] ? 'left-[23px]' : 'left-[3px]' }}"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        <!-- SECTION: AYUDA -->
        @elseif($activeSection === 'ayuda')
            <div class="max-w-[560px]">
                <h1 class="text-2xl font-bold text-white mb-2">Ayuda</h1>
                <p class="text-sm text-[#888888] mb-6">Preguntas frecuentes sobre la aplicación.</p>

                @php
                    $faqs = [
                        ['q' => '¿Cómo puedo cambiar mi instrumento o rol?', 'a' => 'Ve a Configuración > Cuenta y edita el campo "Instrumento / Rol". Pulsa "Guardar cambios" para aplicar.'],
                        ['q' => '¿Cómo subo fotos al álbum?', 'a' => 'Entra en la sección Álbum, selecciona la categoría y pulsa el botón "Subir archivo" en la parte inferior del panel izquierdo.'],
                        ['q' => '¿Cómo creo un nuevo evento en el calendario?', 'a' => 'Solo los administradores pueden crear eventos. Contacta con el admin de la banda para añadir nuevos eventos.'],
                        ['q' => '¿Puedo exportar el setlist de un concierto?', 'a' => 'Actualmente no está disponible la exportación, pero está planificada para próximas versiones.'],
                        ['q' => '¿Cómo reporto un problema?', 'a' => 'Ve a Configuración > Comentarios y describe el problema. También puedes contactar directamente con el administrador.'],
                    ];
                @endphp

                <div class="space-y-2">
                    @foreach($faqs as $i => $item)
                        @php $isFaqOpen = ($openFaqId === String($i)); @endphp
                        <div class="bg-[#1a1a1a] border border-[#2a2a2a] rounded-lg overflow-hidden transition">
                            <div
                                wire:click="toggleFaq('{{ $i }}')"
                                class="flex items-center justify-between p-4 cursor-pointer select-none"
                            >
                                <span class="text-sm font-semibold text-white leading-tight pr-4">{{ $item['q'] }}</span>
                                <svg class="w-4 h-4 text-[#555555] shrink-0 transition duration-150 {{ $isFaqOpen ? 'rotate-90 text-white' : '' }}" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                            </div>
                            @if($isFaqOpen)
                                <div class="px-4 pb-4 text-xs text-[#999999] leading-relaxed border-t border-[#2a2a2a] pt-3">
                                    {{ $item['a'] }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

        <!-- SECTION: COMENTARIOS -->
        @elseif($activeSection === 'feedback')
            <div class="max-w-[560px]">
                <h1 class="text-2xl font-bold text-white mb-2">Comentarios</h1>
                <p class="text-sm text-[#888888] mb-6">Ayúdanos a mejorar reportando problemas o sugiriendo mejoras.</p>

                @if($feedbackSent)
                    <div class="p-5 bg-[#0d2a1a] border border-[#00aa5540] rounded-xl text-center">
                        <div class="text-2xl mb-2">✅</div>
                        <div class="text-[15px] font-bold text-[#00ff88]">¡Gracias por tu feedback!</div>
                        <div class="text-xs text-[#888888] mt-1">Lo revisaremos pronto.</div>
                    </div>
                @else
                    <div class="space-y-5">
                        <div>
                            <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2.5">
                                TIPO
                            </label>
                            <div class="flex gap-2.5 flex-wrap">
                                @foreach([['bug', '🐛 Error'], ['mejora', '✨ Mejora'], ['otro', '💬 Otro']] as $item)
                                    <button
                                        wire:click="$set('feedbackType', '{{ $item[0] }}')"
                                        class="px-4 py-2 border rounded-lg text-xs font-semibold transition cursor-pointer select-none
                                        {{ $feedbackType === $item[0] ? 'border-[#555555] bg-[#333333] text-white' : 'border-[#333333] text-[#888888] hover:text-white' }}"
                                    >
                                        {{ $item[1] }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div>
                            <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                                DESCRIPCIÓN
                            </label>
                            <textarea
                                wire:model="feedbackText"
                                placeholder="Describe el problema o sugerencia con el mayor detalle posible..."
                                rows="6"
                                class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none resize-y transition"
                            ></textarea>
                        </div>

                        <button
                            wire:click="sendFeedback"
                            @if(empty(trim($feedbackText))) disabled @endif
                            class="py-2.5 px-8 rounded-lg font-semibold text-sm transition select-none
                            {{ !empty(trim($feedbackText)) ? 'bg-white text-black hover:opacity-90 cursor-pointer' : 'bg-[#333333] text-[#666666] cursor-not-allowed' }}"
                        >
                            Enviar comentario
                        </button>
                    </div>
                @endif
            </div>
        @endif

    </div>

</div>
