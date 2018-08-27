<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Genre::create([
            'name' => 'Action',
            'slug' => str_slug('Action'),
            'film_id' => 1,
        ]);

        \App\Genre::create([
            'name' => 'History',
            'slug' => str_slug('History'),
            'film_id' => 1,
        ]);

        \App\Genre::create([
            'name' => 'Drama',
            'slug' => str_slug('Drama'),
            'film_id' => 2,
        ]);

        \App\Genre::create([
            'name' => 'Scientific',
            'slug' => str_slug('Scientific'),
            'film_id' => 2,
        ]);

        \App\Genre::create([
            'name' => 'Comedy',
            'slug' => str_slug('Comedy'),
            'film_id' => 3,
        ]);
    }
}
