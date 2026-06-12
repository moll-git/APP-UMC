<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-white">Shows</h2>
        @if(auth()->user()->role === 'admin')
            <button class="bg-yellow-600 hover:bg-yellow-500 text-white p-2 rounded-full shadow-lg transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            </button>
        @endif
    </div>

    <!-- Lista de Conciertos -->
    <div class="space-y-4">
        <!-- Concierto 1 -->
        <div class="bg-gradient-to-r from-[#242424] to-[#2a2a2a] border border-[#333] rounded-2xl overflow-hidden shadow-lg relative">
            <div class="absolute left-0 top-0 bottom-0 w-2 bg-yellow-500"></div>
            <div class="p-5 pl-6">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xl font-bold text-white">Festival de Verano</h3>
                    <span class="bg-yellow-500/20 text-yellow-400 text-xs font-bold px-2 py-1 rounded">Confirmado</span>
                </div>
                <div class="space-y-2 text-sm text-gray-300">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>24 de Agosto, 2026</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>22:00 hrs</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Plaza Mayor, Centro</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Concierto 2 -->
        <div class="bg-gradient-to-r from-[#242424] to-[#2a2a2a] border border-[#333] rounded-2xl overflow-hidden shadow-lg relative opacity-75">
            <div class="absolute left-0 top-0 bottom-0 w-2 bg-gray-500"></div>
            <div class="p-5 pl-6">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xl font-bold text-white">Gala Benéfica</h3>
                    <span class="bg-gray-500/20 text-gray-400 text-xs font-bold px-2 py-1 rounded">Pendiente</span>
                </div>
                <div class="space-y-2 text-sm text-gray-300">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>12 de Septiembre, 2026</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Por confirmar</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Teatro Principal</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
