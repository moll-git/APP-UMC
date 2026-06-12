<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-white">Agenda</h2>
        @if(auth()->user()->role === 'admin')
            <button class="bg-blue-600 hover:bg-blue-500 text-white p-2 rounded-full shadow-lg transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            </button>
        @endif
    </div>

    <!-- Vista Mensual Simplificada -->
    <div class="bg-[#242424] border border-[#333] rounded-2xl p-4 shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <button class="text-gray-400 hover:text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg></button>
            <h3 class="text-lg font-semibold text-white">Junio 2026</h3>
            <button class="text-gray-400 hover:text-white"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></button>
        </div>
        <div class="grid grid-cols-7 gap-1 text-center text-xs font-medium text-gray-500 mb-2">
            <div>D</div><div>L</div><div>M</div><div>M</div><div>J</div><div>V</div><div>S</div>
        </div>
        <div class="grid grid-cols-7 gap-1 text-center text-sm">
            <!-- Días vacíos -->
            <div class="p-2"></div>
            <!-- Días del mes (Ejemplo estático para maquetación) -->
            @for ($i = 1; $i <= 30; $i++)
                <div class="p-2 rounded-lg {{ $i == 12 ? 'bg-blue-600 text-white font-bold' : 'text-gray-300 hover:bg-[#333] cursor-pointer' }}">
                    {{ $i }}
                    @if($i == 15 || $i == 22)
                        <div class="w-1.5 h-1.5 bg-blue-400 rounded-full mx-auto mt-0.5"></div>
                    @endif
                </div>
            @endfor
        </div>
    </div>

    <!-- Próximos Eventos -->
    <div>
        <h3 class="text-lg font-bold text-white mb-3">Próximos Eventos</h3>
        <div class="space-y-3">
            <div class="bg-[#242424] border border-[#333] rounded-xl p-4 flex gap-4 items-center">
                <div class="bg-[#1a1a1a] rounded-lg p-2 text-center min-w-[60px]">
                    <span class="block text-blue-400 font-bold text-lg">15</span>
                    <span class="block text-gray-500 text-xs uppercase">Jun</span>
                </div>
                <div>
                    <h4 class="text-white font-semibold">Reunión General</h4>
                    <p class="text-gray-400 text-sm">18:00 hrs - Online</p>
                </div>
            </div>
            <div class="bg-[#242424] border border-[#333] rounded-xl p-4 flex gap-4 items-center">
                <div class="bg-[#1a1a1a] rounded-lg p-2 text-center min-w-[60px]">
                    <span class="block text-blue-400 font-bold text-lg">22</span>
                    <span class="block text-gray-500 text-xs uppercase">Jun</span>
                </div>
                <div>
                    <h4 class="text-white font-semibold">Ensayo Principal</h4>
                    <p class="text-gray-400 text-sm">19:30 hrs - Auditorio</p>
                </div>
            </div>
        </div>
    </div>
</div>
