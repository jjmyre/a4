<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	public function movies() {
    	return $this->belongsToMany('App\Movie')->withTimestamps();
    }

    public static function getGenresForCheckboxes() {

    	$genres = Genre::orderBy('name','ASC')->get();

        $genreCheckboxes = [];

        foreach($genres as $genre) {
            $genreCheckboxes[$genre['id']] = $genre->name;
        }

        return $genreCheckboxes;

    }

    public static function getGenresForOptions() {

        $genres = Genre::orderBy('name','ASC')->get();

        $genreOptions = [];

        foreach($genres as $genre) {
            $genreOptions[$genre['id']] = $genre->name;
        }

        return $genreOptions;
    }
}

