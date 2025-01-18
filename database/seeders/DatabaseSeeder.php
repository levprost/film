<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\GenreSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\MediaSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\NoteSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class,
            GenreSeeder::class,
            MediaSeeder::class,
            UserSeeder::class,
            NoteSeeder::class,
            EpisodeSeeder::class,
        ]);
    }
}
