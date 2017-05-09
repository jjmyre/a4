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
            'Star Wars: Episode IV - A New Hope' => ['Adventure','Classic','Sci-fi'],
            'The Revenant' => ['Adventure','Historical','Western'],
            'The Godfather' => ['Classic','Crime','Drama'],
            'Oldboy' => ['Action','Foreign','Thriller'],
            'The Wolf of Wall Street' => ['Biopic','Crime','Drama'],
            'Alien' => ['Classic','Horror','Sci-fi'],
            'No Country for Old Men' => ['Action','Crime','Thriller'],
            'Prometheus' => ['Horror','Sci-fi'],
            'Guardians of the Galaxy' => ['Adventure','Comedy','Sci-fi'],
            'Jaws' => ['Classic','Horror','Monster']
        ];

        foreach($movies as $title => $genres) {

            $movie = Movie::where('title','like', $title)->first();
            
            foreach($genres as $genreName) {
                $genre = Genre::where('name','like',$genreName)->first();
                $movie->genres()->save($genre);
            }
        }
    }
}

        