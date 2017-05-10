<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use Session;

class HomeController extends Controller
{
    function __invoke(){
        
        # Default home values (nothing will list)

        $listType = 'all';
        $sortBy = 'title';

        # Get genre options for 'sort by' dropdown that are actually used by movies

        $movies = Movie::with('genres')->orderBy('title', 'asc')->get();

        $genreOptions = [];

        foreach($movies as $movie) {
            foreach($movie->genres as $genre) {
                ($genreOptions[$genre['id']] = $genre->name);
            }
        }
        
        ksort($genreOptions);

        return view('watchlist.list')->with([
            'listType' => $listType,
            'sortBy' => $sortBy,
            'movies' => $movies,
            'genreOptions' => $genreOptions,
        ]);     
    }
}