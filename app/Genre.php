<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	public function movies() {
    	return $this->belongsToMany('App\Movie')->withTimestamps();
    }

    public static function getGenresCheckboxes() {

    	$genres = Genre::orderBy('name','ASC')->get();

        $genresCheckboxes = [];

        foreach($genres as $genre) {
            $genresCheckboxes[$genre['id']] = $genre->name;
        }

        return $genresCheckboxes;

    }
}
