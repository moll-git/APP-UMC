<?php

namespace App\Livewire;

use Livewire\Component;

class Forum extends Component
{
    public $search = '';
    public $activeCategory = 'Todo';

    public $categories = ['Todo', 'Ensayos', 'Repertorio', 'Equipamiento', 'Álbum', 'General'];

    public $threads = [];

    public function mount()
    {
        $users = \App\Models\User::inRandomOrder()->limit(6)->get();

        $threadTemplates = [
            ['time' => 'hace 2h', 'category' => 'Ensayos', 'titleKey' => 'app.forum_q1_title', 'previewKey' => 'app.forum_q1_preview', 'replies' => 8, 'likes' => 3],
            ['time' => 'hace 5h', 'category' => 'Repertorio', 'titleKey' => 'app.forum_q2_title', 'previewKey' => 'app.forum_q2_preview', 'replies' => 14, 'likes' => 9],
            ['time' => 'ayer', 'category' => 'General', 'titleKey' => 'app.forum_q3_title', 'previewKey' => 'app.forum_q3_preview', 'replies' => 4, 'likes' => 1],
            ['time' => 'ayer', 'category' => 'Equipamiento', 'titleKey' => 'app.forum_q4_title', 'previewKey' => 'app.forum_q4_preview', 'replies' => 6, 'likes' => 2],
            ['time' => 'hace 2d', 'category' => 'Álbum', 'titleKey' => 'app.forum_q5_title', 'previewKey' => 'app.forum_q5_preview', 'replies' => 11, 'likes' => 7],
            ['time' => 'hace 3d', 'category' => 'Ensayos', 'titleKey' => 'app.forum_q6_title', 'previewKey' => 'app.forum_q6_preview', 'replies' => 3, 'likes' => 5],
        ];

        foreach ($threadTemplates as $index => $template) {
            $user = $users[$index % count($users)];
            $nameParts = explode(' ', trim($user->name));
            $initials = mb_strtoupper(mb_substr($nameParts[0], 0, 1));
            if (count($nameParts) > 1) {
                $initials .= mb_strtoupper(mb_substr(end($nameParts), 0, 1));
            }

            $this->threads[] = [
                'id' => 't' . ($index + 1),
                'author' => $user->name,
                'authorInitials' => $initials,
                'time' => $template['time'],
                'category' => $template['category'],
                'title' => __($template['titleKey']),
                'preview' => __($template['previewKey']),
                'replies' => $template['replies'],
                'likes' => $template['likes'],
            ];
        }
    }

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
