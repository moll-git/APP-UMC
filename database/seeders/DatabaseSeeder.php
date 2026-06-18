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

        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => '1234'
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin123'
        ]);

        User::factory()->create([
            'name' => 'Martí',
            'email' => 'marti@gmail.com',
            'password' => 'password'
        ]);

        User::factory()->create([
            'name' => 'José Luis',
            'email' => 'joseluis@gmail.com',
            'password' => 'password'
        ]);
    }
}
