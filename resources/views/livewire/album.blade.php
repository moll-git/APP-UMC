<div x-data="{ tab: 'gallery' }" class="space-y-6">
    <div class="flex items-center justify-between mb-2">
        <h2 class="text-2xl font-bold text-white">Álbum</h2>
        <!-- Custom Tabs -->
        <div class="bg-[#242424] p-1 rounded-xl flex space-x-1 border border-[#333]">
            <button @click="tab = 'gallery'" :class="tab === 'gallery' ? 'bg-[#333] text-white shadow' : 'text-gray-400 hover:text-gray-200'" class="px-4 py-1.5 text-sm font-medium rounded-lg transition">Galería</button>
            <button @click="tab = 'upload'" :class="tab === 'upload' ? 'bg-[#333] text-white shadow' : 'text-gray-400 hover:text-gray-200'" class="px-4 py-1.5 text-sm font-medium rounded-lg transition">Subir</button>
        </div>
    </div>

    <!-- Tab: Galería -->
    <div x-show="tab === 'gallery'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
        <div class="grid grid-cols-3 gap-2">
            <!-- Mock Photos -->
            @for ($i = 1; $i <= 12; $i++)
                <div class="aspect-square bg-[#242424] rounded-lg overflow-hidden border border-[#333] relative group">
                    <!-- Placeholder de imagen -->
                    <div class="w-full h-full bg-gradient-to-br from-purple-500/20 to-pink-500/20 flex items-center justify-center">
                        <svg class="w-8 h-8 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- Tab: Subir -->
    <div x-show="tab === 'upload'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="space-y-4">
        
        <div class="bg-[#242424] border-2 border-dashed border-[#444] rounded-2xl p-8 text-center hover:bg-[#2a2a2a] hover:border-pink-500/50 transition cursor-pointer flex flex-col items-center justify-center min-h-[250px]">
            <div class="bg-pink-500/20 p-4 rounded-full mb-4 text-pink-400">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
            </div>
            <p class="text-white font-medium mb-1">Arrastra tus fotos o vídeos aquí</p>
            <p class="text-gray-400 text-sm mb-4">o haz clic para explorar tus archivos</p>
            <button class="bg-[#333] hover:bg-[#444] text-white px-6 py-2 rounded-lg text-sm font-medium transition border border-[#555]">
                Seleccionar archivos
            </button>
        </div>

        <div class="bg-blue-500/10 border border-blue-500/20 rounded-xl p-4 flex gap-3 items-start">
            <svg class="w-5 h-5 text-blue-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <div>
                <h4 class="text-blue-400 font-medium text-sm">Proceso de Aprobación</h4>
                <p class="text-gray-400 text-xs mt-1">Todos los archivos subidos serán revisados por un administrador antes de ser visibles en la galería pública.</p>
            </div>
        </div>
        
    </div>
</div>
