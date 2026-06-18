<div x-data="{ open: false }" class="relative z-50">
    <!-- Mobile Hamburger Header -->
    <div class="fixed top-0 left-0 right-0 h-12 bg-[#111111] border-b border-[#222222] flex items-center justify-between px-4 md:hidden">
        <button @click="open = true" class="text-gray-400 hover:text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
        </button>
        <span class="text-sm font-bold text-white tracking-wide">UMC App</span>
        <div class="w-6 h-6"></div> <!-- Spacer to center title -->
    </div>

    <!-- Mobile Drawer Backdroop -->
    <div x-show="open" 
         x-transition:enter="transition-opacity ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="open = false" 
         class="fixed inset-0 bg-black/60 md:hidden z-40"></div>

    <!-- Mobile Drawer Content -->
    <div x-show="open"
         x-transition:enter="transition-transform ease-out duration-300"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition-transform ease-in duration-200"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="fixed top-0 bottom-0 left-0 w-[240px] bg-[#111111] border-r border-[#222222] flex flex-col z-50 md:hidden overflow-y-auto">
        
        <!-- Drawer Header -->
        <div class="p-4 border-b border-[#222222] flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center text-xs font-bold text-black shrink-0">
                    UMC
                </div>
                <div>
                    <div class="text-[13px] font-semibold text-white leading-tight">UMC App</div>
                    <div class="text-[10px] text-[#666666] leading-tight">Banda Musical</div>
                </div>
            </div>
            <button @click="open = false" class="text-gray-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
            </button>
        </div>

        <!-- Drawer Links -->
        <nav class="p-2 flex-grow space-y-0.5">
            @php
                $mobileNav = [
                    ['route' => 'home', 'label' => 'Inicio', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>'],
                    ['route' => 'calendar', 'label' => 'Calendario', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>'],
                    ['route' => 'album', 'label' => 'Álbum', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>'],
                    ['route' => 'forum', 'label' => 'Foro', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>', 'badge' => 12],
                    ['route' => 'concerts', 'label' => 'Shows', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>'],
                ];
                $mobileSecNav = [
                    ['route' => 'admin', 'label' => 'Administración', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M20 13c0 5-3.5 7.5-7.66 9.7a1 1 0 0 1-.68 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.8 17 5 19 5a1 1 0 0 1 1 1z"/></svg>'],
                    ['route' => 'configuracion', 'label' => 'Configuración', 'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.1a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>'],
                ];
            @endphp

            @foreach($mobileNav as $item)
                @php $isActive = request()->routeIs($item['route']); @endphp
                <a href="{{ route($item['route']) }}" @click="open = false" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ $isActive ? 'bg-[#333333] text-white font-semibold' : 'text-[#888888] hover:bg-[#222222] hover:text-[#cccccc]' }}">
                    <span class="{{ $isActive ? 'text-white' : 'text-[#666666]' }}">{!! $item['icon'] !!}</span>
                    <span class="flex-grow">{{ $item['label'] }}</span>
                    @if(isset($item['badge']))
                        <span class="bg-[#cc0000] text-white text-[10px] px-1.5 py-0.5 rounded-full min-w-[18px] text-center font-bold">{{ $item['badge'] }}</span>
                    @endif
                </a>
            @endforeach

            <div class="h-[1px] bg-[#222222] my-2 mx-1"></div>

            @foreach($mobileSecNav as $item)
                @php $isActive = request()->routeIs($item['route']); @endphp
                <a href="{{ route($item['route']) }}" @click="open = false" class="flex items-center gap-2.5 px-3 py-2.5 rounded-lg text-sm font-medium transition {{ $isActive ? 'bg-[#333333] text-white font-semibold' : 'text-[#888888] hover:bg-[#222222] hover:text-[#cccccc]' }}">
                    <span class="{{ $isActive ? 'text-white' : 'text-[#666666]' }}">{!! $item['icon'] !!}</span>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <!-- Profile / Logout -->
        <div class="p-3 border-t border-[#222222]">
            <div class="flex items-center gap-2.5 p-2 rounded-lg bg-[#1a1a1a] border border-[#222222] mb-2">
                <div class="w-8 h-8 rounded-full bg-[#444444] flex items-center justify-center text-xs font-bold text-white">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="truncate">
                    <div class="text-[13px] font-semibold text-white truncate leading-tight">{{ auth()->user()->name }}</div>
                    <div class="text-[11px] text-[#666666] leading-tight">Guitarra</div>
                </div>
            </div>
            <a href="{{ route('profile') }}" @click="open = false" class="block text-center bg-[#222222] hover:bg-[#2a2a2a] text-gray-300 text-xs py-2 rounded-lg mb-1.5 transition">
                Editar Perfil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-center bg-[#cc0000]/10 hover:bg-[#cc0000]/20 text-red-400 text-xs py-2 rounded-lg transition">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
</div>
