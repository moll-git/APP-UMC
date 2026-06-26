<div class="h-full min-h-[calc(100vh-48px)] bg-[#111111] p-6 md:p-10 flex flex-col gap-8">
    
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">{{ __('app.sheet_music_title') }}</h1>
            <p class="text-sm text-[#888888] mt-1"></p>
        </div>
        
        <div class="flex items-center gap-3">
            <div class="relative">
                <input type="text" placeholder="{{ __('app.sheet_music_search') }}" class="bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg pl-9 pr-4 py-2.5 text-sm text-white outline-none w-full md:w-64 transition">
                <svg class="w-4 h-4 text-[#666666] absolute left-3 top-3" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
        </div>
    </div>

    <!-- Upload Area (Compact) -->
    <div class="w-full bg-[#1a1a1a] border border-dashed border-[#444444] hover:border-[#666666] rounded-xl p-5 flex flex-col md:flex-row items-center justify-between transition-colors duration-200 relative overflow-hidden group gap-4">
        <!-- Glow effect -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#ffffff03] to-transparent opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
        
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-[#222222] rounded-full flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform duration-300">
                <svg class="w-6 h-6 text-[#aaaaaa]" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
            </div>
            <div>
                <h3 class="text-base font-semibold text-white">{{ __('app.sheet_music_upload_title') }}</h3>
                <p class="text-xs text-[#888888]">
                    {{ __('app.sheet_music_upload_sub') }}
                </p>
            </div>
        </div>

        <div class="relative z-10 w-full md:w-auto">
            <label class="w-full md:w-auto bg-white text-black hover:bg-gray-200 px-5 py-2 rounded-lg text-sm font-semibold cursor-pointer transition flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="12" x2="12" y1="18" y2="12"/><line x1="9" x2="15" y1="15" y2="15"/></svg>
                {{ __('app.sheet_music_upload_btn') }}
                <input type="file" wire:model="files" multiple class="hidden">
            </label>
        </div>
    </div>

    <!-- Categories -->
    <div class="flex-grow flex flex-col gap-6">
        
        <!-- Highlighted Category -->
        <!-- Highlighted Category -->
        <div class="bg-gradient-to-r from-[#ffcc00] to-[#ff9900] rounded-xl p-[2px] shadow-[0_0_15px_rgba(255,204,0,0.15)] hover:shadow-[0_0_30px_rgba(255,204,0,0.4)] hover:scale-[1.02] transition-all duration-300 group cursor-pointer">
            <div class="bg-[#1a1a1a] rounded-[10px] p-5 h-full flex items-center justify-between">
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-[#ffcc00] to-[#ff9900] text-black flex items-center justify-center shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M2.54 6.27A2.5 2.5 0 0 1 5 4h4.74a2.5 2.5 0 0 1 1.76.73L13.24 6.5H19a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5H5a2.5 2.5 0 0 1-2.5-2.5V6.27z"/></svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#ffcc00] to-[#ff9900] uppercase tracking-wide">{{ __('app.sheet_music_highlight') }}</h2>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-full border border-[#ffcc00] text-[#ffcc00] group-hover:bg-[#ffcc00] group-hover:text-black flex items-center justify-center transition-colors duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
                </div>
            </div>
        </div>

        <h2 class="text-sm font-bold text-[#888888] uppercase tracking-wider mt-2 mb-1">{{ __('app.sheet_music_categories') }}</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            
            <!-- Category Card -->
            <div class="bg-[#1a1a1a] border border-[#2a2a2a] hover:border-[#444444] rounded-xl p-4 cursor-pointer transition group flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-[#222222] text-[#00ff88] flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M2.54 6.27A2.5 2.5 0 0 1 5 4h4.74a2.5 2.5 0 0 1 1.76.73L13.24 6.5H19a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5H5a2.5 2.5 0 0 1-2.5-2.5V6.27z"/></svg>
                </div>
                <div class="flex-grow overflow-hidden">
                    <h3 class="text-sm font-bold text-white truncate group-hover:text-[#00ff88] transition">{{ __('app.sheet_music_cat_moras') }}</h3>
                    <p class="text-[11px] text-[#666666] mt-0.5">{{ __('app.sheet_music_explore') }}</p>
                </div>
                <svg class="w-4 h-4 text-[#444444] group-hover:text-white transition" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
            </div>

            <!-- Category Card -->
            <div class="bg-[#1a1a1a] border border-[#2a2a2a] hover:border-[#444444] rounded-xl p-4 cursor-pointer transition group flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-[#222222] text-[#ff4444] flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M2.54 6.27A2.5 2.5 0 0 1 5 4h4.74a2.5 2.5 0 0 1 1.76.73L13.24 6.5H19a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5H5a2.5 2.5 0 0 1-2.5-2.5V6.27z"/></svg>
                </div>
                <div class="flex-grow overflow-hidden">
                    <h3 class="text-sm font-bold text-white truncate group-hover:text-[#ff4444] transition">{{ __('app.sheet_music_cat_cristianas') }}</h3>
                    <p class="text-[11px] text-[#666666] mt-0.5">{{ __('app.sheet_music_explore') }}</p>
                </div>
                <svg class="w-4 h-4 text-[#444444] group-hover:text-white transition" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
            </div>

            <!-- Category Card -->
            <div class="bg-[#1a1a1a] border border-[#2a2a2a] hover:border-[#444444] rounded-xl p-4 cursor-pointer transition group flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-[#222222] text-[#4488ff] flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M2.54 6.27A2.5 2.5 0 0 1 5 4h4.74a2.5 2.5 0 0 1 1.76.73L13.24 6.5H19a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5H5a2.5 2.5 0 0 1-2.5-2.5V6.27z"/></svg>
                </div>
                <div class="flex-grow overflow-hidden">
                    <h3 class="text-sm font-bold text-white truncate group-hover:text-[#4488ff] transition">{{ __('app.sheet_music_cat_pasodobles') }}</h3>
                    <p class="text-[11px] text-[#666666] mt-0.5">{{ __('app.sheet_music_explore') }}</p>
                </div>
                <svg class="w-4 h-4 text-[#444444] group-hover:text-white transition" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
            </div>

            <!-- Category Card -->
            <div class="bg-[#1a1a1a] border border-[#2a2a2a] hover:border-[#444444] rounded-xl p-4 cursor-pointer transition group flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-[#222222] text-[#ff00ff] flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M2.54 6.27A2.5 2.5 0 0 1 5 4h4.74a2.5 2.5 0 0 1 1.76.73L13.24 6.5H19a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5H5a2.5 2.5 0 0 1-2.5-2.5V6.27z"/></svg>
                </div>
                <div class="flex-grow overflow-hidden">
                    <h3 class="text-sm font-bold text-white truncate group-hover:text-[#ff00ff] transition">{{ __('app.sheet_music_cat_xaranga') }}</h3>
                    <p class="text-[11px] text-[#666666] mt-0.5">{{ __('app.sheet_music_explore') }}</p>
                </div>
                <svg class="w-4 h-4 text-[#444444] group-hover:text-white transition" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
            </div>

            <!-- Category Card -->
            <div class="bg-[#1a1a1a] border border-[#2a2a2a] hover:border-[#444444] rounded-xl p-4 cursor-pointer transition group flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-[#222222] text-[#ffffff] flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M2.54 6.27A2.5 2.5 0 0 1 5 4h4.74a2.5 2.5 0 0 1 1.76.73L13.24 6.5H19a2.5 2.5 0 0 1 2.5 2.5v10a2.5 2.5 0 0 1-2.5 2.5H5a2.5 2.5 0 0 1-2.5-2.5V6.27z"/></svg>
                </div>
                <div class="flex-grow overflow-hidden">
                    <h3 class="text-sm font-bold text-white truncate transition">{{ __('app.sheet_music_cat_procesion') }}</h3>
                    <p class="text-[11px] text-[#666666] mt-0.5">{{ __('app.sheet_music_explore') }}</p>
                </div>
                <svg class="w-4 h-4 text-[#444444] group-hover:text-white transition" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
            </div>

        </div>
    </div>
    
</div>

