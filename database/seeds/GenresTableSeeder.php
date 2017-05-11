<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [ 'Action','Adventure','Animated','Biopic','Classic',
            'Comedy','Crime','Documentary','Drama','Epic','Experimental','Family','Fantasy','Foreign',
            'Historical','Horror','Melodrama','Monster','Musical','Mystery','Political',
            'Romance','Sci-fi','Sport','Thriller','War','Western' ];
	
	    foreach($genres as $genreName) {
            $genre = new Genre();
            $genre->name = $genreName;
            $genre->save();
        }
    }
}
