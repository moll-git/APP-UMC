<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recuperar usuarios existentes
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->warn('No hay usuarios en la base de datos. Ejecuta primero el UserSeeder.');
            return;
        }

        $u1 = $users->first()->id;
        $u2 = $users->skip(1)->first()->id ?? $u1;

        // ─── Álbumes fijos representativos de la UMC ────────────────────────────
        $albumsData = [
            // Conciertos
            [
                'user_id'      => $u1,
                'category'     => 'conciertos',
                'title'        => 'Concert de Primavera 2024',
                'description'  => 'Imatges del concert de primavera celebrat al Palau de la Música. Una nit inoblidable plena d\'emoció i música.',
                'cover_image'  => null,
                'event_date'   => '2024-04-20',
                'is_published' => true,
            ],
            [
                'user_id'      => $u2,
                'category'     => 'conciertos',
                'title'        => 'Nadal a la Catedral 2023',
                'description'  => 'Concert de Nadal celebrat a la Catedral de Barcelona. Repertori nadalenc amb obres de Bach i Handel.',
                'cover_image'  => null,
                'event_date'   => '2023-12-22',
                'is_published' => true,
            ],
            // Ensayos
            [
                'user_id'      => $u1,
                'category'     => 'ensayos',
                'title'        => 'Assaig General — Temporada 2024',
                'description'  => 'Fotografies dels assaigs generals previs a la temporada 2024. El treball darrere dels escenaris.',
                'cover_image'  => null,
                'event_date'   => '2024-09-15',
                'is_published' => true,
            ],
            [
                'user_id'      => $u1,
                'category'     => 'ensayos',
                'title'        => 'Assaig Setlist — Festival Tardor',
                'description'  => 'Sessions d\'assaig per preparar el setlist del festival de tardor.',
                'cover_image'  => null,
                'event_date'   => '2024-10-03',
                'is_published' => true,
            ],
            // Carrer
            [
                'user_id'      => $u2,
                'category'     => 'carrer',
                'title'        => 'Trobada de Corals 2024',
                'description'  => 'Imatges de la gran trobada de corals de Catalunya. Participació de més de 20 grups corals.',
                'cover_image'  => null,
                'event_date'   => '2024-06-08',
                'is_published' => true,
            ],
            // Convivencias
            [
                'user_id'      => $u1,
                'category'     => 'convivencias',
                'title'        => 'Setmana Cultural — Juliol 2024',
                'description'  => 'Galeria de la setmana cultural amb actuacions, tallers i exposicions.',
                'cover_image'  => null,
                'event_date'   => '2024-07-10',
                'is_published' => true,
            ],
            [
                'user_id'      => $u2,
                'category'     => 'convivencias',
                'title'        => 'Sopar de Germanor 2023',
                'description'  => 'Sopar anual de la UMC. Una nit de convivència i celebració.',
                'cover_image'  => null,
                'event_date'   => '2023-11-18',
                'is_published' => true,
            ],
            // Risas
            [
                'user_id'      => $u1,
                'category'     => 'risas',
                'title'        => 'Moments Divertits 2024',
                'description'  => 'Les millors imatges espontànies i moments de riures de la temporada 2024.',
                'cover_image'  => null,
                'event_date'   => null,
                'is_published' => true,
            ],
            [
                'user_id'      => $u2,
                'category'     => 'risas',
                'title'        => 'Bloopers i Espontanis',
                'description'  => 'Col·lecció de moments imprevists i anècdotes gràfiques del grup.',
                'cover_image'  => null,
                'event_date'   => null,
                'is_published' => true,
            ],
            // Otros
            [
                'user_id'      => $u1,
                'category'     => 'otros',
                'title'        => 'Preparació Temporada 2025',
                'description'  => 'Esborrany — Selecció de fotografies de la nova temporada en preparació.',
                'cover_image'  => null,
                'event_date'   => null,
                'is_published' => false,  // borrador
            ],
        ];

        foreach ($albumsData as $albumData) {
            Album::create($albumData);
        }

        // ─── Álbumes aleatorios via Factory ─────────────────────────────────────
        $categories = ['conciertos', 'ensayos', 'carrer', 'convivencias', 'risas', 'otros'];

        foreach ($categories as $cat) {
            // 2 álbumes publicados por categoría
            Album::factory()
                ->count(2)
                ->published()
                ->state(['category' => $cat])
                ->recycle($users)
                ->create();
        }

        // 3 borradores aleatorios
        Album::factory()
            ->count(3)
            ->draft()
            ->recycle($users)
            ->create();

        $this->command->info('✅ AlbumSeeder completado: ' . Album::count() . ' álbumes creados.');

        // ─── Asignar fotos existentes a álbumes (si hay fotos) ──────────────────
        $photos = Photo::all();
        $albums = Album::all();

        if ($photos->isNotEmpty() && $albums->isNotEmpty()) {
            $albums->each(function (Album $album) use ($photos) {
                $randomPhotos = $photos->random(min(rand(3, 8), $photos->count()));

                $syncData = [];
                foreach ($randomPhotos as $index => $photo) {
                    $syncData[$photo->id] = ['order' => $index + 1];
                }

                $album->photos()->sync($syncData);
            });

            $this->command->info('📷 Fotos asignadas correctamente a los álbumes.');
        } else {
            $this->command->warn('⚠️  No hay fotos disponibles para asignar a los álbumes.');
        }
    }
}
