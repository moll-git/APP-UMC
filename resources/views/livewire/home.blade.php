<div class="space-y-6">
    <!-- Encabezado de bienvenida -->
    <div class="flex items-center space-x-4">
        @if(auth()->user()->avatar_url)
            <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="w-12 h-12 rounded-full object-cover border-2 border-gray-600">
        @else
            <div class="w-12 h-12 rounded-full bg-gray-700 flex items-center justify-center border-2 border-gray-600">
                <span class="text-xl font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
            </div>
        @endif
        <div>
            <h1 class="text-2xl font-bold">¡Hola, {{ explode(' ', auth()->user()->name)[0] }}!</h1>
            <p class="text-gray-400 text-sm">Bienvenido de nuevo a UMC</p>
        </div>
    </div>

    <!-- Accesos Directos (Grid 2x2) -->
    <div class="grid grid-cols-2 gap-4">
        <a href="{{ route('calendar') }}" class="bg-[#242424] hover:bg-[#2a2a2a] transition border border-[#333] rounded-2xl p-4 flex flex-col items-center justify-center text-center shadow-lg aspect-square">
            <div class="bg-blue-500/20 p-3 rounded-full mb-3 text-blue-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <h2 class="font-semibold text-lg">Agenda</h2>
            <p class="text-xs text-gray-400 mt-1">Próximos eventos</p>
        </a>

        <a href="{{ route('album') }}" class="bg-[#242424] hover:bg-[#2a2a2a] transition border border-[#333] rounded-2xl p-4 flex flex-col items-center justify-center text-center shadow-lg aspect-square">
            <div class="bg-pink-500/20 p-3 rounded-full mb-3 text-pink-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <h2 class="font-semibold text-lg">Álbum</h2>
            <p class="text-xs text-gray-400 mt-1">Fotos y vídeos</p>
        </a>

        <a href="{{ route('forum') }}" class="bg-[#242424] hover:bg-[#2a2a2a] transition border border-[#333] rounded-2xl p-4 flex flex-col items-center justify-center text-center shadow-lg aspect-square">
            <div class="bg-green-500/20 p-3 rounded-full mb-3 text-green-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
            </div>
            <h2 class="font-semibold text-lg">Foro</h2>
            <p class="text-xs text-gray-400 mt-1">Discusiones</p>
        </a>

        <a href="{{ route('concerts') }}" class="bg-[#242424] hover:bg-[#2a2a2a] transition border border-[#333] rounded-2xl p-4 flex flex-col items-center justify-center text-center shadow-lg aspect-square">
            <div class="bg-yellow-500/20 p-3 rounded-full mb-3 text-yellow-400">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
            </div>
            <h2 class="font-semibold text-lg">Shows</h2>
            <p class="text-xs text-gray-400 mt-1">Nuestras fechas</p>
        </a>
    </div>

    <!-- Panel de Administración (solo visible para admin) -->
    @if(auth()->user()->role === 'admin')
        <div class="bg-gradient-to-br from-[#2a2a2a] to-[#242424] border border-[#444] rounded-2xl p-5 shadow-xl mt-6 relative overflow-hidden">
            <!-- Decorative element -->
            <div class="absolute top-0 right-0 -mr-8 -mt-8 w-24 h-24 rounded-full bg-purple-500/10 blur-xl"></div>
            
            <div class="flex items-center space-x-3 mb-4 relative z-10">
                <div class="bg-purple-500/20 p-2 rounded-lg text-purple-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h2 class="text-xl font-bold text-white">Administración</h2>
            </div>
            
            <p class="text-gray-400 text-sm mb-5 relative z-10">Gestiona usuarios, aprueba fotos y modera el foro.</p>
            
            <div class="flex gap-3 relative z-10">
                <a href="#" class="flex-1 bg-white text-black font-semibold text-center py-2 rounded-lg text-sm hover:bg-gray-200 transition shadow">
                    Dashboard
                </a>
                <a href="#" class="flex-1 bg-[#333] text-white font-semibold text-center py-2 rounded-lg text-sm hover:bg-[#444] transition border border-[#444]">
                    Invitar
                </a>
            </div>
        </div>
    @endif
</div>
