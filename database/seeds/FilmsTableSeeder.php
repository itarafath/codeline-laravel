<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Film::create([
            'name' => "Mission: Impossible - Fallout",
            'slug' => str_slug('Mission: Impossible - Fallout'),
            'rating' => 4.5,
            'release_date' => '2018-08-01',
            'ticket_price' => 450,
            'description' => 'Ethan Hunt and his IMF team, along with some familiar allies, race against time after a mission gone wrong.',
            'country_id' => 1,
            'photo' => str_slug('Mission: Impossible - Fallout') . '.jpg'
        ]);

        \App\Film::create([
            'name' => "Dunkirk",
            'slug' => str_slug('Dunkirk'),
            'rating' => 4.5,
            'release_date' => '2017-08-01',
            'ticket_price' => 450,
            'description' => 'Allied soldiers from Belgium, the British Empire and France are surrounded by the German Army, and evacuated during a fierce battle in World War II.',
            'country_id' => 1,
            'photo' => str_slug('Dunkirk') . '.jpg'
        ]);

        \App\Film::create([
            'name' => "Black Panther",
            'slug' => str_slug('Black Panther'),
            'rating' => 4.5,
            'release_date' => '2017-08-01',
            'ticket_price' => 450,
            'description' => 'T\'Challa, heir to the hidden but advanced kingdom of Wakanda, must step forward to lead his people into a new future and must confront a challenger from his country\'s past.',
            'country_id' => 1,
            'photo' => str_slug('Black Panther') . '.jpg'
        ]);
    }
}
