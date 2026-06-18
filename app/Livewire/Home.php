<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $recentActivity = [
        [
            'id' => 'act1',
            'userInitials' => 'AN',
            'userName' => 'Ana García',
            'action' => 'publicó una foto en',
            'target' => 'Ensayos',
            'time' => 'hace 12 min',
        ],
        [
            'id' => 'act2',
            'userInitials' => 'LP',
            'userName' => 'Laura Pérez',
            'action' => 'abrió un hilo en el',
            'target' => 'Foro',
            'time' => 'hace 1h',
        ],
        [
            'id' => 'act3',
            'userInitials' => 'MR',
            'userName' => 'Miguel R.',
            'action' => 'actualizó el setlist de',
            'target' => 'Conciertos',
            'time' => 'hace 2h',
        ],
        [
            'id' => 'act4',
            'userInitials' => 'JM',
            'userName' => 'Javier Martín',
            'action' => 'comentó en el',
            'target' => 'Foro',
            'time' => 'ayer',
        ],
    ];

    public function render()
    {
        return view('livewire.home');
    }
}
