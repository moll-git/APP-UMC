<?php

namespace App\Livewire;

use Livewire\Component;

class Album extends Component
{
    public $activeCategoryId = 'conciertos';
    public $filter = 'all';

    public $categories = [
        ['id' => 'conciertos', 'emoji' => '🎸', 'name' => 'Conciertos', 'count' => 14],
        ['id' => 'ensayos', 'emoji' => '🥁', 'name' => 'Ensayos', 'count' => 9],
        ['id' => 'eventos', 'emoji' => '✨', 'name' => 'Eventos especiales', 'count' => 7],
        ['id' => 'risas', 'emoji' => '😄', 'name' => 'Risas', 'count' => 11],
        ['id' => 'estudio', 'emoji' => '🎙️', 'name' => 'Estudio de grabación', 'count' => 6],
        ['id' => 'viajes', 'emoji' => '🗺️', 'name' => 'Viajes y giras', 'count' => 4],
    ];

    public $mediaItems = [
        ['id' => 'm1', 'type' => 'photo', 'categoryId' => 'conciertos'],
        ['id' => 'm2', 'type' => 'video', 'categoryId' => 'conciertos'],
        ['id' => 'm3', 'type' => 'photo', 'categoryId' => 'conciertos'],
        ['id' => 'm4', 'type' => 'photo', 'categoryId' => 'conciertos'],
        ['id' => 'm5', 'type' => 'video', 'categoryId' => 'conciertos'],
        ['id' => 'm6', 'type' => 'photo', 'categoryId' => 'conciertos'],
        ['id' => 'm7', 'type' => 'photo', 'categoryId' => 'conciertos'],
        ['id' => 'm8', 'type' => 'video', 'categoryId' => 'conciertos'],
        ['id' => 'm9', 'type' => 'photo', 'categoryId' => 'conciertos'],
        ['id' => 'm10', 'type' => 'photo', 'categoryId' => 'conciertos'],
        ['id' => 'm11', 'type' => 'photo', 'categoryId' => 'conciertos'],
        ['id' => 'm12', 'type' => 'photo', 'categoryId' => 'conciertos'],
        ['id' => 'm13', 'type' => 'photo', 'categoryId' => 'conciertos'],
        ['id' => 'upload', 'type' => 'upload', 'categoryId' => 'conciertos'],
        
        // Items for other categories to support interaction
        ['id' => 'm14', 'type' => 'photo', 'categoryId' => 'ensayos'],
        ['id' => 'm15', 'type' => 'video', 'categoryId' => 'ensayos'],
        ['id' => 'upload', 'type' => 'upload', 'categoryId' => 'ensayos'],
    ];

    public function selectCategory($id)
    {
        $this->activeCategoryId = $id;
    }

    public function selectFilter($filter)
    {
        $this->filter = $filter;
    }

    public function getFilteredItems()
    {
        return collect($this->mediaItems)
            ->filter(function ($item) {
                if ($item['categoryId'] !== $this->activeCategoryId) {
                    return false;
                }
                if ($this->filter === 'photos') {
                    return $item['type'] === 'photo';
                }
                if ($this->filter === 'videos') {
                    return $item['type'] === 'video';
                }
                return true;
            })
            ->toArray();
    }

    public function render()
    {
        $activeCat = collect($this->categories)->firstWhere('id', $this->activeCategoryId);
        
        return view('livewire.album', [
            'filteredItems' => $this->getFilteredItems(),
            'activeCategory' => $activeCat,
        ]);
    }
}
