<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'note_nmbr' => fake()-> numberBetween(1,5),
            'comment' => fake()-> paragraph(),

            'user_id' => rand(1, User::count()),
            'medias_id' => rand(1, Media::count()),
        ];
    }
}
