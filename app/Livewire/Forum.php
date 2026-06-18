<?php

namespace App\Livewire;

use Livewire\Component;

class Forum extends Component
{
    public $search = '';
    public $activeCategory = 'Todo';

    public $categories = ['Todo', 'Ensayos', 'Repertorio', 'Equipamiento', 'Álbum', 'General'];

    public $threads = [
        [
            'id' => 't1', 'author' => 'Ana García', 'authorInitials' => 'AN', 'time' => 'hace 2h',
            'category' => 'Ensayos', 'title' => '¿Cuándo es el próximo ensayo?',
            'preview' => 'No he visto información sobre la fecha del ensayo de la semana que viene...',
            'replies' => 8, 'likes' => 3,
        ],
        [
            'id' => 't2', 'author' => 'Miguel Rodríguez', 'authorInitials' => 'MR', 'time' => 'hace 5h',
            'category' => 'Repertorio', 'title' => 'Propuesta de nueva canción para el setlist',
            'preview' => 'He estado escuchando una canción que creo que nos quedaría perfecta...',
            'replies' => 14, 'likes' => 9,
        ],
        [
            'id' => 't3', 'author' => 'Laura Pérez', 'authorInitials' => 'LP', 'time' => 'ayer',
            'category' => 'General', 'title' => '¿Alguien tiene contacto del fotógrafo?',
            'preview' => 'Quedé en pedirle las fotos del concierto del mes pasado...',
            'replies' => 4, 'likes' => 1,
        ],
        [
            'id' => 't4', 'author' => 'Javier Martín', 'authorInitials' => 'JM', 'time' => 'ayer',
            'category' => 'Equipamiento', 'title' => 'Problema con el equipo de sonido',
            'preview' => 'El amplificador principal hace un ruido extraño desde el viernes...',
            'replies' => 6, 'likes' => 2,
        ],
        [
            'id' => 't5', 'author' => 'Carmen Sánchez', 'authorInitials' => 'CS', 'time' => 'hace 2d',
            'category' => 'Álbum', 'title' => 'Ideas para la portada del nuevo álbum',
            'preview' => 'Estuve pensando en algunos conceptos visuales que podrían funcionar bien...',
            'replies' => 11, 'likes' => 7,
        ],
        [
            'id' => 't6', 'author' => 'Miguel Rodríguez', 'authorInitials' => 'MR', 'time' => 'hace 3d',
            'category' => 'Ensayos', 'title' => 'Resumen del ensayo del jueves',
            'preview' => 'Todo fue muy bien, repasamos las tres primeras canciones del setlist...',
            'replies' => 3, 'likes' => 5,
        ],
    ];

    public function selectCategory($category)
    {
        $this->activeCategory = $category;
    }

    public function getFilteredThreads()
    {
        return collect($this->threads)
            ->filter(function ($t) {
                $matchCat = $this->activeCategory === 'Todo' || $t['category'] === $this->activeCategory;
                $matchSearch = empty($this->search) ||
                    str_contains(strtolower($t['title']), strtolower($this->search)) ||
                    str_contains(strtolower($t['preview']), strtolower($this->search));
                return $matchCat && $matchSearch;
            })
            ->toArray();
    }

    public function render()
    {
        return view('livewire.forum', [
            'filteredThreads' => $this->getFilteredThreads(),
        ]);
    }
}
