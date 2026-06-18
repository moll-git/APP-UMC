<header class="h-12 bg-[#0d0d0d] border-b border-[#222222] flex items-center justify-between px-6 fixed top-0 md:left-[200px] left-0 right-0 z-40">
    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 text-[13px]">
        <!-- X icon (or menu button on mobile) -->
        <span class="text-[#555555]">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
        </span>
        <span class="text-[#666666]">{{ __('app.breadcrumb_app') }}</span>
        <span class="text-[#444444]">/</span>
        <span class="text-white font-medium">
            @if(request()->routeIs('home'))
                {{ __('app.nav_home') }}
            @elseif(request()->routeIs('calendar'))
                {{ __('app.nav_calendar') }}
            @elseif(request()->routeIs('album'))
                {{ __('app.nav_album') }}
            @elseif(request()->routeIs('forum'))
                {{ __('app.nav_forum') }}
            @elseif(request()->routeIs('concerts'))
                {{ __('app.nav_shows') }}
            @elseif(request()->routeIs('admin'))
                {{ __('app.nav_admin') }}
            @elseif(request()->routeIs('configuracion'))
                {{ __('app.nav_settings') }}
            @elseif(request()->routeIs('profile'))
                {{ __('app.profile_title') }}
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
