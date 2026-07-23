<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Concert;
use App\Models\ConcertWork;
use App\Models\WorkGroup;

class ConcertSeeder extends Seeder
{
    public function run(): void
    {
        // ── Grupos de trabajo ──────────────────────────────────────────
        $colors = ['#00ff88', '#4488ff', '#ff6633', '#ffcc00'];
        $groups = [];
        foreach (['Grup 1', 'Grup 2', 'Grup 3', 'Grup 4'] as $i => $name) {
            $groups[] = WorkGroup::firstOrCreate(
                ['name' => $name],
                ['color' => $colors[$i], 'description' => null]
            );
        }

        // ── Concierto próximo: Concert festes 6 d'agost ───────────────
        $concert = Concert::firstOrCreate(
            ['title' => "app.concert_festes"],
            [
                'date'      => '2026-08-06',
                'time'      => '22:00',
                'location'  => null,
                'status'    => 'upcoming',
                'vestuario' => "Uniforme d'estiu",
                'notes'     => null,
            ]
        );

        // Repertori (14 obres)
        $repertori = [
            ['order' => 1,  'title' => 'El Mahdi',                    'youtube_url' => null],
            ['order' => 2,  'title' => 'Canticum Laudis',              'youtube_url' => null],
            ['order' => 3,  'title' => "L'Entrà",                     'youtube_url' => null],
            ['order' => 4,  'title' => 'Pasodoble de festes',          'youtube_url' => null],
            ['order' => 5,  'title' => 'Himne de la Comunitat',        'youtube_url' => null],
            ['order' => 6,  'title' => 'La Processonera',              'youtube_url' => null],
            ['order' => 7,  'title' => 'Mig Any',                     'youtube_url' => null],
            ['order' => 8,  'title' => 'Mare de Déu dels Desemparats', 'youtube_url' => null],
            ['order' => 9,  'title' => 'Gràcia i Justícia',            'youtube_url' => null],
            ['order' => 10, 'title' => 'La Barraca',                   'youtube_url' => null],
            ['order' => 11, 'title' => 'El Fallero',                   'youtube_url' => null],
            ['order' => 12, 'title' => 'Paquito el Chocolatero',       'youtube_url' => null],
            ['order' => 13, 'title' => 'Sortida',                     'youtube_url' => null],
            ['order' => 14, 'title' => 'Himne Nacional',               'youtube_url' => null],
        ];

        if ($concert->works()->count() === 0) {
            foreach ($repertori as $obra) {
                ConcertWork::create(array_merge($obra, ['concert_id' => $concert->id]));
            }
        }

        // Asignar grupos 1 y 2 a este concierto
        $concert->workGroups()->syncWithoutDetaching([$groups[0]->id, $groups[1]->id]);

        // ── Concierto pasado de ejemplo ────────────────────────────────
        $past = Concert::firstOrCreate(
            ['title' => 'app.concert_pasqua'],
            [
                'date'      => '2026-04-12',
                'time'      => '20:00',
                'location'  => 'Plaça Major',
                'status'    => 'past',
                'vestuario' => "Uniforme d'hivern",
                'notes'     => null,
            ]
        );

        $pastRepertori = [
            ['order' => 1, 'title' => 'Marxa de Processó',   'youtube_url' => null],
            ['order' => 2, 'title' => 'Ave Maria',            'youtube_url' => null],
            ['order' => 3, 'title' => 'Miserere',             'youtube_url' => null],
            ['order' => 4, 'title' => 'Stabat Mater',         'youtube_url' => null],
            ['order' => 5, 'title' => 'El Cant dels Ocells',  'youtube_url' => null],
        ];

        if ($past->works()->count() === 0) {
            foreach ($pastRepertori as $obra) {
                ConcertWork::create(array_merge($obra, ['concert_id' => $past->id]));
            }
        }

        $past->workGroups()->syncWithoutDetaching([$groups[2]->id, $groups[3]->id]);
    }
}
