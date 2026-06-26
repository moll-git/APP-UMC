<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
    $roles = [
        ['name' => 'admin'],                  // admin
        ['name' => 'director'],               // director
        ['name' => 'member'],                 // miembro
        ['name' => 'delegate'],                // delegat
        ['name' => 'president'],              // presidente
        ['name' => 'vice_president'],         // vicepresidente
        ['name' => 'secretary'],              // secretario
        ['name' => 'chronicler'],             // cronista
        ['name' => 'treasurer'],              // tesorero
        ['name' => 'payments'],               // pagos
        ['name' => 'school'],                 // escola
        ['name' => 'school_treasurer'],       // tesorero_escola
        ['name' => 'social_media'],           // xarxes
        ['name' => 'wardrobe'],               // roperia
        ['name' => 'instruments'],            // instruments
        ['name' => 'maintenance'],            // manteniment
        ['name' => 'artistic_advisory'],      // assesoreria_artistica
        ['name' => 'events'],                 // eventos
        ['name' => 'lottery'],                // loteria
        ['name' => 'archive'],                // arxiu
        ['name' => 'members_manager'],        // socis
        ['name' => 'institutional_relations'],// relacions_institucionals
    ];

        // firstOrCreate evita duplicados si ejecuta el seeder varias veces
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role['name']]);
        }
    }
}