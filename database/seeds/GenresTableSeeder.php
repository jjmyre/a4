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
        $genres = [ 'Action', 'Adventure', 'Biopic', 'Classic', 'Comedy', 'Crime', 'Documentary', 'Drama', 'Epic', 'Family', 'Foreign', 'Historical', 'Horror', 'Musical', 'Mystery', 'Romance', 'Science fiction', 'Thriller', 'War', 'Western' ];
	
	    foreach($genres as $genreName) {
            $genre = new Genre();
            $genre->name = $genreName;
            $genre->save();
        }
    }
}
