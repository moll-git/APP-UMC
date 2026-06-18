<?php

namespace App\Livewire;

use Livewire\Component;

class Admin extends Component
{
    public $selectedAction = 'members';
    public $announceText = '';
    public $announceSent = false;
    public $currentRole = 'admin'; // admin or member toggle simulated

    public $membersList = [
        ['initials' => 'MR', 'name' => 'Miguel Rodríguez', 'role' => 'Guitarra', 'isAdmin' => true],
        ['initials' => 'AN', 'name' => 'Ana García', 'role' => 'Voz', 'isAdmin' => false],
        ['initials' => 'LP', 'name' => 'Laura Pérez', 'role' => 'Batería', 'isAdmin' => false],
        ['initials' => 'JM', 'name' => 'Javier Martín', 'role' => 'Bajo', 'isAdmin' => false],
    ];

    public function selectAction($action)
    {
        $this->selectedAction = $action;
        $this->announceSent = false;
    }

    public function toggleRole($role)
    {
        $this->currentRole = $role;
    }

    public function publishAnnouncement()
    {
        if (empty(trim($this->announceText))) {
            return;
        }

        // Simulate publishing
        $this->announceSent = true;
        $this->announceText = '';
    }

    public function render()
    {
        return view('livewire.admin');
    }
}
