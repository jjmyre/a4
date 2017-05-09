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
            'Star Wars: Episode IV - A New Hope' => ['Sci-fi','Classic','Adventure'],
            'The Revenant' => ['Historical','Western','Adventure'],
            'The Godfather' => ['Classic','Crime','Drama'],
            'Oldboy' => ['Foreign','Action','Thriller'],
            'The Wolf of Wall Street' => ['Crime', 'Drama', 'Biopic'],
            'Alien' => ['Sci-fi','Classic','Horror'],
            'No Country for Old Men' => ['Crime','Thriller','Action'],
            'Prometheus' => ['Sci-fi','Horror'],
            'Guardians of the Galaxy' => ['Sci-fi', 'Adventure', 'Comedy'],
            'Jaws' => ['Horror','Classic']
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

        