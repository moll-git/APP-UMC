<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-white">Foro</h2>
        <button class="bg-green-600 hover:bg-green-500 text-white p-2 rounded-full shadow-lg transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        </button>
    </div>

    <!-- Buscador -->
    <div class="relative">
        <input type="text" placeholder="Buscar en el foro..." class="w-full bg-[#242424] border border-[#333] rounded-xl pl-10 pr-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500 transition">
        <svg class="w-5 h-5 text-gray-500 absolute left-3 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
    </div>

    <!-- Lista de Hilos -->
    <div class="space-y-3">
        <!-- Hilo 1 -->
        <div class="bg-[#242424] border border-[#333] rounded-xl p-4 hover:bg-[#2a2a2a] transition cursor-pointer relative group">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center shrink-0 font-bold text-white">M</div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-white font-semibold truncate">¿Qué canciones tocaremos en el próximo show?</h3>
                    <p class="text-gray-400 text-sm truncate mt-0.5">Tengo un par de ideas para incluir en el setlist...</p>
                    <div class="flex items-center gap-4 mt-2 text-xs text-gray-500">
                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg> 12</span>
                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg> 5</span>
                        <span>Hace 2h</span>
                    </div>
                </div>
                <!-- Menú de opciones (Reportar) -->
                <button class="text-gray-500 hover:text-white p-1 rounded-md opacity-0 group-hover:opacity-100 transition absolute top-3 right-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                </button>
            </div>
        </div>

        <!-- Hilo 2 -->
        <div class="bg-[#242424] border border-[#333] rounded-xl p-4 hover:bg-[#2a2a2a] transition cursor-pointer relative group">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-full bg-pink-500 flex items-center justify-center shrink-0 font-bold text-white">L</div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-white font-semibold truncate">Vestuario para la gala</h3>
                    <p class="text-gray-400 text-sm truncate mt-0.5">Recordad que todos tenemos que ir de negro absoluto...</p>
                    <div class="flex items-center gap-4 mt-2 text-xs text-gray-500">
                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg> 24</span>
                        <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg> 18</span>
                        <span>Ayer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
