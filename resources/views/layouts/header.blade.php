<header class="h-12 bg-[#0d0d0d] border-b border-[#222222] flex items-center justify-between px-6 fixed top-0 md:left-[200px] left-0 right-0 z-40">
    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-[13px]">
        <!-- X icon (or menu button on mobile) -->
        <span class="text-[#555555]">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
        </span>
        <span class="text-[#666666]">UMC App</span>
        <span class="text-[#444444]">/</span>
        <span class="text-white font-medium">
            @if(request()->routeIs('home'))
                Inicio
            @elseif(request()->routeIs('calendar'))
                Calendario
            @elseif(request()->routeIs('album'))
                Álbum
            @elseif(request()->routeIs('forum'))
                Foro
            @elseif(request()->routeIs('concerts'))
                Shows
            @elseif(request()->routeIs('admin'))
                Administración
            @elseif(request()->routeIs('configuracion'))
                Configuración
            @elseif(request()->routeIs('profile'))
                Perfil
            @else
                Panel
            @endif
        </span>
    </div>

    <!-- Right Side -->
    <div class="flex items-center gap-4 text-[13px]">
        @php
            $months = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'];
            $currentMonth = $months[date('n') - 1];
            $currentYear = date('Y');
        @endphp
        <span class="text-[#666666]">{{ $currentMonth }} {{ $currentYear }}</span>
        
        <a href="{{ route('profile') }}" class="w-7 h-7 rounded-full bg-[#333333] flex items-center justify-center text-[10px] font-bold text-white cursor-pointer border border-[#444444] hover:border-[#666666] transition duration-150">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}{{ strlen(auth()->user()->name) > 1 ? strtoupper(substr(explode(' ', auth()->user()->name)[1] ?? '', 0, 1)) : '' }}
        </a>
    </div>
</header>
