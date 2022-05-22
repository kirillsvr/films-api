<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::factory(10)->create();
        Actor::factory(10)->create();
        Film::factory(50)->create();

        Film::all()->each(function ($film) {
            $randomFields = Actor::all()->random(rand(1, 4))->pluck('id');
            $film->actors()->attach($randomFields);
        });
    }
}
