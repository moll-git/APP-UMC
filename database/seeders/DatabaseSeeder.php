<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => '1234'
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin123'
        ]);

        User::create([
            'name' => 'Martí',
            'email' => 'marti@gmail.com',
            'password' => 'password'
        ]);

        User::create([
            'name' => 'José Luis',
            'email' => 'joseluis@gmail.com',
            'password' => 'password'
        ]);

        $this->call([
            RoleSeeder::class,        // 1º Crear roles
            UserSeeder::class,        // 2º Crear usuarios
            UserRolesSeeder::class,   // 3º Asignar roles a usuarios
            AlbumSeeder::class,       // 4º Crear álbumes
            ConcertSeeder::class,     // 5º Crear conciertos y grupos
            WorkGroupMembersSeeder::class, // 6º Asignar miembros a grupos
        ]);
    }
}
