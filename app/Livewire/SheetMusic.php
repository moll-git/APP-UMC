<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class SheetMusic extends Component
{
    use WithFileUploads;

    public $files = [];

    public function updatedFiles()
    {
        // TODO: Handle file saving
        $this->validate([
            'files.*' => 'max:10240', // 10MB Max
        ]);
    }

    public function render()
    {
        return view('livewire.sheet-music');
    }
}
