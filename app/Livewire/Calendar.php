<?php

namespace App\Livewire;

use Livewire\Component;

class Calendar extends Component
{
    public $viewYear = 2026;
    public $viewMonth = 5; // June = 5 (0-indexed)
    public $selectedDay = 18;

    public $events = [
        [
            'id' => 'ev1',
            'title' => 'Concierto apertura',
            'date' => 'JUN 12',
            'dayNum' => 12,
            'monthStr' => 'JUN',
            'time' => '21:00',
            'location' => 'Teatro Municipal',
            'type' => 'Concierto',
            'calendarDay' => 12,
        ],
        [
            'id' => 'ev2',
            'title' => 'Ensayo setlist',
            'date' => 'JUN 14',
            'dayNum' => 14,
            'monthStr' => 'JUN',
            'time' => '19:00',
            'location' => 'Sala de ensayo A',
            'type' => 'Ensayo',
            'calendarDay' => 14,
        ],
        [
            'id' => 'ev3',
            'title' => 'Sesión de grabación',
            'date' => 'JUN 18',
            'dayNum' => 18,
            'monthStr' => 'JUN',
            'time' => '10:00',
            'location' => 'Estudio Norte',
            'type' => 'Estudio',
            'calendarDay' => 18,
        ],
        [
            'id' => 'ev4',
            'title' => 'Festival de Primavera',
            'date' => 'JUN 20',
            'dayNum' => 20,
            'monthStr' => 'JUN',
            'time' => '19:30',
            'location' => 'Plaza Mayor',
            'type' => 'Concierto',
            'calendarDay' => 20,
        ],
        [
            'id' => 'ev5',
            'title' => 'Reunión de banda',
            'date' => 'JUN 25',
            'dayNum' => 25,
            'monthStr' => 'JUN',
            'time' => '17:00',
            'location' => 'Local UMC',
            'type' => 'Reunión',
            'calendarDay' => 25,
        ],
    ];

    public function prevMonth()
    {
        if ($this->viewMonth === 0) {
            $this->viewMonth = 11;
            $this->viewYear--;
        } else {
            $this->viewMonth--;
        }
    }

    public function nextMonth()
    {
        if ($this->viewMonth === 11) {
            $this->viewMonth = 0;
            $this->viewYear++;
        } else {
            $this->viewMonth++;
        }
    }

    public function selectDay($day)
    {
        $this->selectedDay = $day;
    }

    public function getCells()
    {
        // 1-based index for month in PHP functions
        $m = $this->viewMonth + 1;
        $firstDayOfWeek = date('N', strtotime("{$this->viewYear}-{$m}-01")); // 1 = Mon, 7 = Sun
        $startOffset = $firstDayOfWeek - 1; // Convert to Mon = 0
        $daysInMonth = date('t', strtotime("{$this->viewYear}-{$m}-01"));

        $cells = [];
        for ($i = 0; $i < $startOffset; $i++) {
            $cells[] = null;
        }
        for ($d = 1; $d <= $daysInMonth; $d++) {
            $cells[] = $d;
        }
        return $cells;
    }

    public function render()
    {
        return view('livewire.calendar', [
            'cells' => $this->getCells(),
            'eventDays' => collect($this->events)->pluck('calendarDay')->toArray(),
        ]);
    }
}
