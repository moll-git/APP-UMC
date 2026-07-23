<?php

namespace App\Livewire;

use Livewire\Component;

class Calendar extends Component
{
    public $viewYear = 2026;
    public $viewMonth = 5; // June = 5 (0-indexed)
    public $selectedDay = 18;

    public $events = [];

    public function mount()
    {
        $this->viewYear = date('Y');
        $this->viewMonth = date('n') - 1; // 0-indexed month
        $this->selectedDay = date('j');
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $m = $this->viewMonth + 1;
        $y = $this->viewYear;

        $concerts = \App\Models\Concert::whereMonth('date', $m)->whereYear('date', $y)->get();
        $eventsDB = \App\Models\Event::whereMonth('start_time', $m)->whereYear('start_time', $y)->get();

        $merged = [];
        
        foreach ($concerts as $c) {
            if (!$c->date) continue;
            $date = \Carbon\Carbon::parse($c->date);
            $merged[] = [
                'id' => 'c_'.$c->id,
                'title' => __($c->title),
                'date' => $date->format('M d'),
                'dayNum' => $date->day,
                'monthStr' => mb_strtoupper($date->translatedFormat('M')),
                'time' => $c->time ? \Carbon\Carbon::parse($c->time)->format('H:i') : '',
                'location' => $c->location ?? 'Por determinar',
                'type' => 'Concierto',
                'calendarDay' => $date->day,
            ];
        }

        foreach ($eventsDB as $e) {
            if (!$e->start_time) continue;
            $date = \Carbon\Carbon::parse($e->start_time);
            $merged[] = [
                'id' => 'e_'.$e->id,
                'title' => $e->title,
                'date' => $date->format('M d'),
                'dayNum' => $date->day,
                'monthStr' => mb_strtoupper($date->translatedFormat('M')),
                'time' => $e->is_all_day ? 'Todo el día' : $date->format('H:i'),
                'location' => '',
                'type' => 'Ensayo', // Assuming most general events are rehearsals for now
                'calendarDay' => $date->day,
            ];
        }

        usort($merged, fn($a, $b) => $a['dayNum'] <=> $b['dayNum']);
        $this->events = $merged;
    }

    public function prevMonth()
    {
        if ($this->viewMonth === 0) {
            $this->viewMonth = 11;
            $this->viewYear--;
        } else {
            $this->viewMonth--;
        }
        $this->loadEvents();
    }

    public function nextMonth()
    {
        if ($this->viewMonth === 11) {
            $this->viewMonth = 0;
            $this->viewYear++;
        } else {
            $this->viewMonth++;
        }
        $this->loadEvents();
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
