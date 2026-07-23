{{-- Shared form for creating and editing a concert --}}
{{-- Variables: $isNew (bool) --}}

<div class="space-y-5">

    {{-- Title + Status row --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="sm:col-span-2">
            <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                {{ __('app.concert_form_title') }}
            </label>
            <input
                type="text"
                wire:model.live="editForm.title"
                placeholder="{{ __('app.concert_form_title_placeholder') }}"
                class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
            />
            @error('editForm.title') <span class="text-xs text-red-400 mt-1">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                {{ __('app.concert_form_status') }}
            </label>
            <select
                wire:model.live="editForm.status"
                class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
            >
                <option value="upcoming">{{ __('app.status_upcoming') }}</option>
                <option value="in_preparation">{{ __('app.status_preparing') }}</option>
                <option value="past">{{ __('app.status_past') }}</option>
            </select>
        </div>
    </div>

    {{-- Date + Time --}}
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                {{ __('app.concert_form_date') }}
            </label>
            <input
                type="date"
                wire:model.live="editForm.date"
                class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
            />
            @error('editForm.date') <span class="text-xs text-red-400 mt-1">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                {{ __('app.concert_form_time') }}
            </label>
            <input
                type="time"
                wire:model.live="editForm.time"
                class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
            />
        </div>
    </div>

    {{-- Location + Vestuario --}}
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                {{ __('app.concert_form_location') }}
            </label>
            <input
                type="text"
                wire:model.live="editForm.location"
                placeholder="{{ __('app.concert_form_location_placeholder') }}"
                class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
            />
        </div>
        <div>
            <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
                {{ __('app.concert_form_vestuario') }}
            </label>
            <input
                type="text"
                wire:model.live="editForm.vestuario"
                placeholder="{{ __('app.concert_form_vestuario_placeholder') }}"
                class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition"
            />
        </div>
    </div>

    {{-- Notes --}}
    <div>
        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
            {{ __('app.concert_form_notes') }}
        </label>
        <textarea
            wire:model.live="editForm.notes"
            placeholder="{{ __('app.concert_form_notes_placeholder') }}"
            rows="2"
            class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-lg p-3 text-white text-sm outline-none transition resize-y"
        ></textarea>
    </div>

    {{-- Work groups --}}
    <div>
        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-2">
            {{ __('app.concert_form_groups') }}
        </label>
        <div class="flex flex-wrap gap-2">
            @foreach($allGroups as $group)
                @php $active = in_array($group->id, $editGroupIds); @endphp
                <button
                    type="button"
                    wire:click="toggleGroupInEdit({{ $group->id }})"
                    class="flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-semibold border transition cursor-pointer select-none"
                    style="{{ $active
                        ? 'background-color:'.$group->color.'25; color:'.$group->color.'; border-color:'.$group->color.'60;'
                        : 'background-color:#1e1e1e; color:#555555; border-color:#333333;' }}"
                >
                    <span class="w-1.5 h-1.5 rounded-full" style="background-color:{{ $active ? $group->color : '#444444' }}"></span>
                    {{ $group->name }}
                </button>
            @endforeach
        </div>
    </div>

    {{-- Repertoire --}}
    <div>
        <label class="block text-[11px] font-semibold tracking-wider text-[#888888] uppercase mb-3">
            {{ __('app.concerts_repertoire_label') }}
            @if(count($editWorks) > 0)
                <span class="ml-1 text-[#555555]">({{ trans_choice('app.concerts_works', count($editWorks), ['count' => count($editWorks)]) }})</span>
            @endif
        </label>

        {{-- Current works list --}}
        @if(count($editWorks) > 0)
            <div class="space-y-1.5 mb-3">
                @foreach($editWorks as $i => $work)
                    <div class="bg-[#1e1e1e] border border-[#2a2a2a] rounded-lg px-3 py-2.5 flex items-center gap-3">
                        <span class="text-xs text-[#444444] font-semibold min-w-5 shrink-0">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </span>
                        <div class="flex-1 min-w-0">
                            <input
                                type="text"
                                wire:model.live="editWorks.{{ $i }}.title"
                                class="w-full bg-transparent text-sm text-white outline-none placeholder-[#444444]"
                                placeholder="{{ __('app.concert_form_work_title_placeholder') }}"
                            />
                            <input
                                type="url"
                                wire:model.live="editWorks.{{ $i }}.youtube_url"
                                class="w-full bg-transparent text-xs text-[#666666] outline-none placeholder-[#333333] mt-0.5"
                                placeholder="{{ __('app.concert_form_youtube_placeholder') }}"
                            />
                        </div>
                        <button
                            type="button"
                            wire:click="removeWorkFromEdit({{ $i }})"
                            class="text-[#444444] hover:text-red-400 transition cursor-pointer shrink-0"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                        </button>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Add new work --}}
        <div class="bg-[#161616] border border-dashed border-[#2a2a2a] rounded-lg p-3">
            <div class="flex gap-2 mb-2">
                <input
                    type="text"
                    wire:model.live="newWorkTitle"
                    wire:keydown.enter="addWorkToEdit"
                    placeholder="{{ __('app.concert_form_new_work_title_placeholder') }}"
                    class="flex-1 bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-md px-3 py-2 text-sm text-white outline-none transition"
                />
                <button
                    type="button"
                    wire:click="addWorkToEdit"
                    class="px-3 py-2 bg-[#2a2a2a] hover:bg-[#3a3a3a] border border-[#444444] rounded-md text-sm text-white transition cursor-pointer select-none"
                >
                    +
                </button>
            </div>
            <input
                type="url"
                wire:model.live="newWorkYoutube"
                placeholder="{{ __('app.concert_form_youtube_placeholder') }}"
                class="w-full bg-[#1a1a1a] border border-[#333333] focus:border-[#555555] rounded-md px-3 py-2 text-xs text-[#888888] outline-none transition"
            />
        </div>
    </div>

    {{-- Save / Cancel buttons --}}
    <div class="flex gap-3 pt-2">
        <button
            type="button"
            wire:click="{{ $isNew ? 'closeAdd' : 'closeEdit' }}"
            class="flex-1 py-2.5 px-5 rounded-lg text-sm font-semibold bg-[#2a2a2a] text-[#aaaaaa] hover:bg-[#333333] transition cursor-pointer select-none"
        >
            {{ __('app.cancel') }}
        </button>
        <button
            type="button"
            wire:click="{{ $isNew ? 'saveNewConcert' : 'saveEdit' }}"
            class="flex-[2] py-2.5 px-5 rounded-lg text-sm font-semibold bg-white text-black hover:opacity-90 transition cursor-pointer select-none"
        >
            {{ $isNew ? __('app.concert_form_create') : __('app.save_changes') }}
        </button>
    </div>

</div>

