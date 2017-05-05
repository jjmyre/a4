<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Star Wars: Episode IV - A New Hope',
            'released' => 1977,
            'director' => 'George Lucas',
            'star' => 'Mark Hamill',
            'watched' => 1,
            'priority' => 5,
            'rating' => 5,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Jaws',
            'released' => 1975,
            'director' => 'Steven Spielberg',
            'star' => 'Richard Dreyfuss',
            'watched' => 1,
            'priority' => ,
            'rating' => 5,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Guardians of the Galaxy',
            'released' => 2014,
            'director' => 'James Gunn',
            'star' => 'Chris Pratt',
            'watched' => 0,
            'priority' => 5,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => "Schindler's List",
            'released' => 1993,
            'director' => 'Steven Spielberg',
            'star' => 'Liam Niesen',
            'watched' => 0,
            'priority' => 5,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => '',
            'released' => ,
            'director' => '',
            'star' => '',
            'watched' => ,
            'priority' => ,
            'rating' => ,
        ]);
    }
}