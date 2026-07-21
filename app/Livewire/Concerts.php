<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Concert;
use App\Models\ConcertWork;
use App\Models\WorkGroup;
use Illuminate\Support\Facades\Auth;

class Concerts extends Component
{
    // ── Navigation ────────────────────────────────────────────────────────
    public string $activeTab       = 'concerts'; // 'concerts' | 'groups'
    public ?int   $selectedConcertId = null;
    public ?int   $selectedGroupId   = null;   // grup obert al tab Grups

    // ── Edit modal (upcoming concerts only) ───────────────────────────────
    public bool   $showEditModal    = false;
    public bool   $showAddModal     = false;
    public ?int   $editingConcertId = null;

    public array $editForm = [
        'title'     => '',
        'date'      => '',
        'time'      => '',
        'location'  => '',
        'status'    => 'upcoming',
        'vestuario' => '',
        'notes'     => '',
    ];

    // Repertoire editing (array of works for the edit form)
    public array $editWorks       = [];
    public array $editGroupIds    = [];

    // ── Add work to repertoire ─────────────────────────────────────────────
    public string $newWorkTitle   = '';
    public string $newWorkYoutube = '';

    // ── Computed via render ───────────────────────────────────────────────
    public function mount(): void
    {
        // Select the first upcoming concert by default
        $first = Concert::where('status', '!=', 'past')
            ->orderBy('date')
            ->first();
        $this->selectedConcertId = $first?->id;
    }

    // ── Tabs ──────────────────────────────────────────────────────────────
    public function switchTab(string $tab): void
    {
        $this->activeTab = $tab;
        $this->selectedGroupId = null;
    }

    // ── Group selection ───────────────────────────────────────────────────
    public function selectGroup(?int $id): void
    {
        $this->selectedGroupId = ($this->selectedGroupId === $id) ? null : $id;
    }

    public function showGroup(int $id): void
    {
        $this->activeTab = 'groups';
        $this->selectedGroupId = $id;
    }

    // ── Concert selection ─────────────────────────────────────────────────
    public function selectConcert(int $id): void
    {
        $this->selectedConcertId = $id;
        $this->showEditModal     = false;
        $this->showAddModal      = false;
    }

    // ── Admin check ───────────────────────────────────────────────────────
    public function isAdmin(): bool
    {
        return Auth::user()->roles()->whereIn('name', ['admin', 'director'])->exists();
    }

    // ── Edit concert ──────────────────────────────────────────────────────
    public function openEdit(int $id): void
    {
        $concert = Concert::with(['works', 'workGroups'])->findOrFail($id);

        $this->editingConcertId = $id;
        $this->editForm = [
            'title'     => $concert->title,
            'date'      => $concert->date?->format('Y-m-d') ?? '',
            'time'      => $concert->time ?? '',
            'location'  => $concert->location ?? '',
            'status'    => $concert->status,
            'vestuario' => $concert->vestuario ?? '',
            'notes'     => $concert->notes ?? '',
        ];
        $this->editWorks    = $concert->works->map(fn($w) => [
            'id'          => $w->id,
            'order'       => $w->order,
            'title'       => $w->title,
            'youtube_url' => $w->youtube_url ?? '',
        ])->toArray();
        $this->editGroupIds = $concert->workGroups->pluck('id')->toArray();
        $this->showEditModal = true;
        $this->showAddModal  = false;
    }

    public function closeEdit(): void
    {
        $this->showEditModal = false;
        $this->editingConcertId = null;
        $this->editWorks = [];
        $this->editGroupIds = [];
    }

    public function saveEdit(): void
    {
        $this->validate([
            'editForm.title' => 'required|string|max:255',
            'editForm.date'  => 'required|date',
            'editForm.status' => 'required|in:upcoming,in_preparation,past',
        ]);

        $concert = Concert::findOrFail($this->editingConcertId);
        $concert->update($this->editForm);

        // Sync works
        $concert->works()->delete();
        foreach ($this->editWorks as $i => $work) {
            ConcertWork::create([
                'concert_id'  => $concert->id,
                'order'       => $i + 1,
                'title'       => $work['title'],
                'youtube_url' => $work['youtube_url'] ?: null,
            ]);
        }

        // Sync work groups
        $concert->workGroups()->sync($this->editGroupIds);

        $this->closeEdit();
        $this->selectedConcertId = $concert->id;
    }

    public function addWorkToEdit(): void
    {
        if (empty(trim($this->newWorkTitle))) return;

        $this->editWorks[] = [
            'id'          => null,
            'order'       => count($this->editWorks) + 1,
            'title'       => trim($this->newWorkTitle),
            'youtube_url' => trim($this->newWorkYoutube),
        ];
        $this->newWorkTitle   = '';
        $this->newWorkYoutube = '';
    }

    public function removeWorkFromEdit(int $index): void
    {
        array_splice($this->editWorks, $index, 1);
        // Re-number
        foreach ($this->editWorks as $i => &$w) {
            $w['order'] = $i + 1;
        }
    }

    public function toggleGroupInEdit(int $groupId): void
    {
        if (in_array($groupId, $this->editGroupIds)) {
            $this->editGroupIds = array_values(array_filter(
                $this->editGroupIds, fn($id) => $id !== $groupId
            ));
        } else {
            $this->editGroupIds[] = $groupId;
        }
    }

    // ── Add new concert ───────────────────────────────────────────────────
    public function openAddConcert(): void
    {
        $this->editForm = [
            'title'     => '',
            'date'      => '',
            'time'      => '',
            'location'  => '',
            'status'    => 'upcoming',
            'vestuario' => '',
            'notes'     => '',
        ];
        $this->editWorks    = [];
        $this->editGroupIds = [];
        $this->newWorkTitle = '';
        $this->newWorkYoutube = '';
        $this->showAddModal  = true;
        $this->showEditModal = false;
    }

    public function saveNewConcert(): void
    {
        $this->validate([
            'editForm.title' => 'required|string|max:255',
            'editForm.date'  => 'required|date',
            'editForm.status' => 'required|in:upcoming,in_preparation,past',
        ]);

        $concert = Concert::create($this->editForm);

        foreach ($this->editWorks as $i => $work) {
            ConcertWork::create([
                'concert_id'  => $concert->id,
                'order'       => $i + 1,
                'title'       => $work['title'],
                'youtube_url' => $work['youtube_url'] ?: null,
            ]);
        }

        $concert->workGroups()->sync($this->editGroupIds);

        $this->showAddModal      = false;
        $this->selectedConcertId = $concert->id;
    }

    public function closeAdd(): void
    {
        $this->showAddModal = false;
    }

    // ── Delete concert ────────────────────────────────────────────────────
    public function deleteConcert(int $id): void
    {
        Concert::findOrFail($id)->delete();
        $this->selectedConcertId = Concert::orderBy('date', 'desc')->first()?->id;
        $this->showEditModal = false;
    }

    // ── Render ────────────────────────────────────────────────────────────
    public function render()
    {
        $concerts = Concert::with(['works', 'workGroups.users'])
            ->orderBy('date', 'desc')
            ->get();

        $upcoming = $concerts->whereIn('status', ['upcoming', 'in_preparation'])->sortBy('date');
        $past     = $concerts->where('status', 'past')->sortByDesc('date');

        $selectedConcert = $this->selectedConcertId
            ? $concerts->firstWhere('id', $this->selectedConcertId)
            : null;

        $allGroups = WorkGroup::with('users')->orderBy('name')->get();

        return view('livewire.concerts', compact(
            'upcoming',
            'past',
            'selectedConcert',
            'allGroups',
        ));
    }
}
