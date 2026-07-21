<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'      => User::factory(),
            'category'     => $this->faker->randomElement(['conciertos', 'ensayos', 'carrer', 'convivencias', 'risas', 'otros']),
            'title'        => $this->faker->sentence(3, false),
            'description'  => $this->faker->optional(0.7)->paragraph(),
            'cover_image'  => null,
            'event_date'   => $this->faker->optional(0.8)->dateTimeBetween('-2 years', 'now'),
            'is_published' => $this->faker->boolean(70),
        ];
    }

    /**
     * Estado: álbum publicado.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => true,
        ]);
    }

    /**
     * Estado: álbum borrador (no publicado).
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => false,
        ]);
    }

    /**
     * Estado: álbum con fecha de evento.
     */
    public function withEventDate(string $date = null): static
    {
        return $this->state(fn (array $attributes) => [
            'event_date' => $date ?? $this->faker->dateTimeBetween('-1 year', 'now'),
        ]);
    }
}
