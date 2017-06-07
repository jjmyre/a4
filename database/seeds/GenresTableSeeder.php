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
        $genres = [ 'Action','Adventure','Avante-garde','Animated','Biopic','Cinema-verite','Classic',
            'Comedy','Crime','Documentary','Drama','Educational','Epic','Indie','Experimental','Family','Fantasy','Film Noir','Foreign',
            'Historical','Horror','Melodrama','Monster','Musical','Mystery','Neo Noir','Political','Realism','Religious',
            'Romance','Satire','Sci-Fi','Sport','Thriller','War','Western' ];
	
	    foreach($genres as $genreName) {
            $genre = new Genre();
            $genre->name = $genreName;
            $genre->save();
        }
    }
}
