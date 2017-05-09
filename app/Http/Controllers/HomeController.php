<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use Session;

class HomeController extends Controller
{
    function __invoke(){
        $listType = 'default';
        $sortBy = 'default';

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
            'genreOptions' => $genreOptions,
        ]);     
    }
}