<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Country::create([
            'name' => 'United States',
            'slug' => str_slug('United States')
        ]);

        \App\Country::create([
            'name' => 'Sri Lanka',
            'slug' => str_slug('Sri Lanka')
        ]);

        \App\Country::create([
            'name' => 'Turkey',
            'slug' => str_slug('Turkey')
        ]);
    }
}
