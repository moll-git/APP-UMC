<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $users = \App\Models\User::inRandomOrder()->limit(4)->get();
        
        $actions = [
            ['action' => 'publicó una foto en', 'target' => 'Ensayos', 'time' => 'hace 12 min'],
            ['action' => 'abrió un hilo en el', 'target' => 'Foro', 'time' => 'hace 1h'],
            ['action' => 'actualizó el setlist de', 'target' => 'Conciertos', 'time' => 'hace 2h'],
            ['action' => 'comentó en el', 'target' => 'Foro', 'time' => 'ayer'],
        ];

        $recentActivity = [];
        foreach ($users as $index => $user) {
            if (isset($actions[$index])) {
                $nameParts = explode(' ', trim($user->name));
                $initials = mb_strtoupper(mb_substr($nameParts[0], 0, 1));
                if (count($nameParts) > 1) {
                    $initials .= mb_strtoupper(mb_substr(end($nameParts), 0, 1));
                }

                $recentActivity[] = [
                    'id' => 'act' . ($index + 1),
                    'userInitials' => $initials,
                    'userName' => $user->name,
                    'action' => $actions[$index]['action'],
                    'target' => $actions[$index]['target'],
                    'time' => $actions[$index]['time'],
                ];
            }
        }

        $upcomingConcerts = \App\Models\Concert::whereIn('status', ['upcoming', 'in_preparation'])
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->limit(2)
            ->get();

        return view('livewire.home', [
            'recentActivity' => $recentActivity,
            'upcomingConcerts' => $upcomingConcerts,
        ]);
    }
}
