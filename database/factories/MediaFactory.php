<?php

namespace Database\Factories;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'media_title' => $this->faker->name(),
            'media_photo' => 'default_picture'.'.jpeg',
            'media_url' => fake()->url(),
            'media_type' => fake()->name(),
            'media_description' => fake()->paragraph(),

            'genre_id' => rand(1, Genre::count()),
        ];
    }
}
