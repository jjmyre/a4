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
        $genres = [ 'Action', 'Adventure', 'Animation', 'Avant-garde', 'Biopic', 'Classic',
            'Comedy', 'Crime', 'Documentary', 'Drama', 'Epic', 'Family', 'Fantasy', 'Foreign',
            'Historical', 'Horror', 'Melodrama', 'Musical', 'Mystery', 'Political', 'Romance',
            'Sci-fi', 'Sport','Thriller', 'War', 'Western' ];
	
	    foreach($genres as $genreName) {
            $genre = new Genre();
            $genre->name = $genreName;
            $genre->save();
        }
    }
}
