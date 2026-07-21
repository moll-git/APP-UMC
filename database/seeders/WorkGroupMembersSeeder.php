<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkGroup;
use App\Models\User;

class WorkGroupMembersSeeder extends Seeder
{
    public function run(): void
    {
        // Asignar usuarios a grupos divididos en 4 bloques (ya los cambiarás tú)
        $groups = WorkGroup::orderBy('id')->get();

        if ($groups->count() < 4) {
            $this->command->warn('Cal tenir almenys 4 grups creats. Executa primer ConcertSeeder.');
            return;
        }

        // Todos los user IDs ordenados (excluimos el user_id=100 que tiene nombre vacío)
        $allUserIds = User::whereNotNull('name')
            ->where('name', '!=', '')
            ->orderBy('id')
            ->pluck('id')
            ->toArray();

        $total  = count($allUserIds);
        $chunk  = (int) ceil($total / 4);

        // Grupo 1 → primer cuarto
        $g1ids = array_slice($allUserIds, 0, $chunk);
        // Grupo 2 → segundo cuarto
        $g2ids = array_slice($allUserIds, $chunk, $chunk);
        // Grupo 3 → tercer cuarto
        $g3ids = array_slice($allUserIds, $chunk * 2, $chunk);
        // Grupo 4 → resto
        $g4ids = array_slice($allUserIds, $chunk * 3);

        $groups[0]->users()->syncWithoutDetaching($g1ids);
        $groups[1]->users()->syncWithoutDetaching($g2ids);
        $groups[2]->users()->syncWithoutDetaching($g3ids);
        $groups[3]->users()->syncWithoutDetaching($g4ids);

        $this->command->info("Assignats {$total} usuaris als 4 grups de treball.");
    }
}
