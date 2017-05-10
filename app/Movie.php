<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function genres() {
    	return $this->belongsToMany('App\Genre')->withTimestamps();
    }

    public static function getGenresForDropdown() {

    	$movies = Movie::with('genres')->orderBy('title', 'asc')->get();

    	$genreOptions = [];

        foreach($movies as $movie) {
            foreach($movie->genres as $genre) {
                ($genreOptions[$genre['id']] = $genre->name);
            }
        }
        
        return ksort($genreOptions);
    }

}
