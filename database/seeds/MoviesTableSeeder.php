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
            'director' => 'George Lucas',
            'cast' => 'Mark Hamill',
            'watched' => 0,
            'rating' => null,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Jaws',
            'director' => 'Steven Spielberg',
            'cast' => 'Richard Dreyfuss',
            'watched' => 0,
            'rating' => null,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Guardians of the Galaxy',
            'director' => 'James Gunn',
            'cast' => 'Chris Pratt',
            'watched' => 0,
            'rating' => null,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => "Schindler's List",
            'director' => 'Steven Spielberg',
            'cast' => 'Liam Niesen',
            'watched' => 0,
            'rating' => null,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Oldboy',
            'director' => 'Chanwook Park',
            'cast' => 'Min-sik Choi',
            'watched' => 0,
            'rating' => null,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Revenant',
            'director' => 'Alejandro Inarritu',
            'cast' => 'Leonardo Dicaprio',
            'watched' => 1,
            'rating' => 3,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Godfather',
            'director' => 'Francis Coppola',
            'cast' => 'Marlon Brando',
            'watched' => 1,
            'rating' => 5,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Wolf of Wall Street',
            'director' => 'Martin Scorsese',
            'cast' => 'Leonardo Dicaprio',
            'watched' => 1,
            'rating' => 4,
        ]);
    }
}