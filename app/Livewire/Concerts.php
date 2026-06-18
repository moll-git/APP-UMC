<?php

namespace App\Livewire;

use Livewire\Component;

class Concerts extends Component
{
    public $selectedShowId = 'show1';

    public $shows = [
        [
            'id' => 'show1',
            'title' => 'Festival de Primavera',
            'date' => '20 Jun 2026',
            'day' => 20,
            'month' => 'JUN',
            'time' => '19:30',
            'location' => 'Plaza Mayor, Madrid',
            'status' => 'En preparación',
            'repertoire' => [
                ['id' => 's1', 'order' => 1, 'title' => 'Sabor a Mí', 'duration' => '3:22'],
                ['id' => 's2', 'order' => 2, 'title' => 'El Día que me Quieras', 'duration' => '4:01'],
                ['id' => 's3', 'order' => 3, 'title' => 'Historia de un Amor', 'duration' => '3:48'],
                ['id' => 's4', 'order' => 4, 'title' => 'Quizás, Quizás, Quizás', 'duration' => '2:55'],
                ['id' => 's5', 'order' => 5, 'title' => 'Cuando Vuelva a tu Lado', 'duration' => '3:37'],
            ],
        ],
        [
            'id' => 'show2',
            'title' => 'Verano Cultural',
            'date' => '15 Jul 2026',
            'day' => 15,
            'month' => 'JUL',
            'time' => '21:00',
            'location' => 'Parque del Retiro, Madrid',
            'status' => 'Próximo',
            'repertoire' => [
                ['id' => 's6', 'order' => 1, 'title' => 'Bésame Mucho', 'duration' => '3:10'],
                ['id' => 's7', 'order' => 2, 'title' => 'Perfidia', 'duration' => '2:58'],
                ['id' => 's8', 'order' => 3, 'title' => 'Solamente una Vez', 'duration' => '3:25'],
            ],
        ],
        [
            'id' => 'show3',
            'title' => 'Gira de Otoño — Barcelona',
            'date' => '10 Oct 2026',
            'day' => 10,
            'month' => 'OCT',
            'time' => '20:00',
            'location' => 'Palau de la Música, Barcelona',
            'status' => 'Próximo',
            'repertoire' => [
                ['id' => 's9', 'order' => 1, 'title' => 'Amor Eterno', 'duration' => '4:12'],
                ['id' => 's10', 'order' => 2, 'title' => 'La Paloma', 'duration' => '3:05'],
                ['id' => 's11', 'order' => 3, 'title' => 'Cucurrucucú Paloma', 'duration' => '3:50'],
            ],
        ],
        [
            'id' => 'show4',
            'title' => 'Noche de Otoño',
            'date' => '15 Oct 2025',
            'day' => 15,
            'month' => 'OCT',
            'time' => '20:30',
            'location' => 'Teatro Lope de Vega, Sevilla',
            'status' => 'Pasado',
            'repertoire' => [
                ['id' => 's12', 'order' => 1, 'title' => 'Cielito Lindo', 'duration' => '2:45'],
                ['id' => 's13', 'order' => 2, 'title' => 'El Reloj', 'duration' => '3:20'],
                ['id' => 's14', 'order' => 3, 'title' => 'Ojalá que Llueva Café', 'duration' => '3:55'],
                ['id' => 's15', 'order' => 4, 'title' => 'La Flor de la Canela', 'duration' => '3:30'],
            ],
        ],
        [
            'id' => 'show5',
            'title' => 'Año Nuevo en el Puerto',
            'date' => '31 Dic 2025',
            'day' => 31,
            'month' => 'DIC',
            'time' => '23:00',
            'location' => 'Auditorio del Puerto, Valencia',
            'status' => 'Pasado',
            'repertoire' => [
                ['id' => 's16', 'order' => 1, 'title' => 'Caballo Viejo', 'duration' => '4:05'],
                ['id' => 's17', 'order' => 2, 'title' => 'El Manicero', 'duration' => '2:55'],
                ['id' => 's18', 'order' => 3, 'title' => 'Guantanamera', 'duration' => '3:15'],
            ],
        ],
    ];

    public function selectShow($id)
    {
        $this->selectedShowId = $id;
    }

    public function render()
    {
        $selectedShow = collect($this->shows)->firstWhere('id', $this->selectedShowId);

        return view('livewire.concerts', [
            'selectedShow' => $selectedShow,
        ]);
    }
}
