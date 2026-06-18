<aside class="w-[200px] min-w-[200px] h-screen bg-[#111111] border-r border-[#222222] flex flex-col fixed left-0 top-0 z-50 overflow-y-auto">
    <!-- Logo -->
    <div class="p-4 border-b border-[#222222]">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center text-xs font-bold text-black shrink-0">
                UMC
            </div>
            <div>
                <div class="text-[13px] font-semibold text-white leading-tight">UMC App</div>
                <div class="text-[10px] text-[#666666] leading-tight">Banda Musical</div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="p-2 flex-1 space-y-0.5">
        @php
            $mainNav = [
                ['id' => 'home', 'label' => 'Inicio', 'route' => 'home', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>'],
                ['id' => 'calendar', 'label' => 'Calendario', 'route' => 'calendar', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>'],
                ['id' => 'album', 'label' => 'Álbum', 'route' => 'album', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>'],
                ['id' => 'forum', 'label' => 'Foro', 'route' => 'forum', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>', 'badge' => 12],
                ['id' => 'concerts', 'label' => 'Shows', 'route' => 'concerts', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>'],
            ];

            $secondaryNav = [
                ['id' => 'admin', 'label' => 'Administración', 'route' => 'admin', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 13c0 5-3.5 7.5-7.66 9.7a1 1 0 0 1-.68 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.8 17 5 19 5a1 1 0 0 1 1 1z"/></svg>'],
                ['id' => 'configuracion', 'label' => 'Configuración', 'route' => 'configuracion', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.1a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>'],
            ];
        @endphp

        @foreach($mainNav as $item)
            @php
                $isActive = request()->routeIs($item['route']);
            @endphp
            <a href="{{ route($item['route']) }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm font-medium transition duration-150 ease-in-out {{ $isActive ? 'bg-[#333333] text-white font-semibold' : 'text-[#888888] hover:bg-[#222222] hover:text-[#cccccc]' }}">
                <span class="{{ $isActive ? 'text-white' : 'text-[#666666]' }}">
                    {!! $item['icon'] !!}
                </span>
                <span class="flex-1">{{ $item['label'] }}</span>
                @if(isset($item['badge']))
                    <span class="bg-[#cc0000] text-white text-[10px] font-semibold px-1.5 py-0.5 rounded-full min-w-[18px] text-center">
                        {{ $item['badge'] }}
                    </span>
                @endif
            </a>
        @endforeach

        <!-- Separator -->
        <div class="h-[1px] bg-[#222222] my-2 mx-1"></div>

        @foreach($secondaryNav as $item)
            @php
                $isActive = request()->routeIs($item['route']);
            @endphp
            <a href="{{ route($item['route']) }}" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm font-medium transition duration-150 ease-in-out {{ $isActive ? 'bg-[#333333] text-white font-semibold' : 'text-[#888888] hover:bg-[#222222] hover:text-[#cccccc]' }}">
                <span class="{{ $isActive ? 'text-white' : 'text-[#666666]' }}">
                    {!! $item['icon'] !!}
                </span>
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <!-- Separator -->
    <div class="h-[1px] bg-[#222222] mx-2"></div>

    <!-- User Card & Logout -->
    <div class="p-3">
        <div x-data="{ open: false }" class="relative">
            <div @click="open = !open" class="flex items-center gap-2.5 p-2.5 rounded-lg bg-[#1a1a1a] border border-[#222222] cursor-pointer hover:border-[#333333] transition duration-150">
                @if(auth()->user()->avatar_url)
                    <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-7 h-7 rounded-full object-cover shrink-0">
                @else
                    <div class="w-7 h-7 rounded-full bg-[#444444] flex items-center justify-center text-[10px] font-bold text-white shrink-0">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}{{ strlen(auth()->user()->name) > 1 ? strtoupper(substr(explode(' ', auth()->user()->name)[1] ?? '', 0, 1)) : '' }}
                    </div>
                @endif
                <div class="truncate flex-1">
                    <div class="text-[13px] font-medium text-white leading-tight truncate">{{ auth()->user()->name }}</div>
                    <div class="text-[11px] text-[#666666] leading-tight truncate">Miembro</div>
                </div>
            </div>
            
            <!-- Dropdown for Logout -->
            <div x-show="open" @click.away="open = false" class="absolute bottom-full left-0 w-full mb-1 bg-[#1a1a1a] border border-[#222222] rounded-lg shadow-xl py-1 z-50">
                <a href="{{ route('profile') }}" class="block px-4 py-2 text-xs text-gray-300 hover:bg-[#2a2a2a] hover:text-white transition">
                    Editar Perfil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-xs text-red-400 hover:bg-[#2a2a2a] hover:text-red-300 transition">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</aside>
