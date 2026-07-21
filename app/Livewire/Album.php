<?php

namespace App\Livewire;

use App\Models\Album as AlbumModel;
use Livewire\Component;

class Album extends Component
{
    public string $activeCategoryId = 'todo';
    public string $filter = 'all';   // all | photos | videos (futuro uso)

    /** Definición de las categorías con emoji y clave de traducción */
    public array $categories = [
        ['id' => 'todo',        'emoji' => '🗂️', 'trans' => 'app.album_cat_all'],
        ['id' => 'conciertos',  'emoji' => '🎺', 'trans' => 'app.album_cat_concerts'],
        ['id' => 'ensayos',     'emoji' => '🎼', 'trans' => 'app.album_cat_rehearsals'],
        ['id' => 'carrer',      'emoji' => '🏘️', 'trans' => 'app.album_cat_carrer'],
        ['id' => 'convivencias','emoji' => '🍻', 'trans' => 'app.album_cat_convivencias'],
        ['id' => 'risas',       'emoji' => '😂', 'trans' => 'app.album_cat_jaja'],
        ['id' => 'otros',       'emoji' => '📁', 'trans' => 'app.album_cat_other'],
    ];

    public function selectCategory(string $id): void
    {
        $this->activeCategoryId = $id;
    }

    public function selectFilter(string $filter): void
    {
        $this->filter = $filter;
    }

    public function render()
    {
        // Conteos por categoría para el sidebar
        $counts = AlbumModel::selectRaw('category, count(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category')
            ->toArray();

        // Total global para la categoría "Todo"
        $counts['todo'] = AlbumModel::count();

        // Álbumes: si es "todo" se muestran todos, si no, filtramos por categoría
        $query = AlbumModel::with('user')->withCount('photos')->latest('event_date');

        if ($this->activeCategoryId !== 'todo') {
            $query->where('category', $this->activeCategoryId);
        }

        $albums = $query->get();

        // Categoría activa (para el header del panel derecho)
        $activeCategory = collect($this->categories)
            ->firstWhere('id', $this->activeCategoryId);

        return view('livewire.album', [
            'albums'         => $albums,
            'counts'         => $counts,
            'activeCategory' => $activeCategory,
        ]);
    }
}
