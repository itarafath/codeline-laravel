<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Comment::create([
            'name' => 'Arafath',
            'comment' => 'Awesome Movie',
            'film_id' => 1,
            'user_id' => 1
        ]);

        \App\Comment::create([
            'name' => 'Nolan',
            'comment' => 'Awesome Movie',
            'film_id' => 2,
            'user_id' => 1
        ]);

        \App\Comment::create([
            'name' => 'Tom',
            'comment' => 'Awesome Movie',
            'film_id' => 3,
            'user_id' => 1
        ]);
    }
}
