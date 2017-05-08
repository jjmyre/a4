<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Genre;



class GenreMovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies =[
            'The Revenant' => ['historical','western','adventure'],
            'The Godfather' => ['classic','crime','drama'],
            "Schindler's List" => ['historical','drama','biopic'],
            "Oldboy" => ['foreign','action','thriller']
        ];

        foreach($movies as $title => $genres) {

            $movie = Movie::where('title','like',$title)->first();
            
            foreach($genres as $genreName) {
                $genre = Genre::where('name','like',$genreName)->first();
                $movie->genres()->save($genre);
            }
        }
    }
}

        