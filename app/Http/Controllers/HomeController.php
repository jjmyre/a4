<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use Session;

class HomeController extends Controller
{
    function __invoke(){
        $listType = 'unwatched';
        $sortBy = 'title';
        $movies = Movie::where('watched', '=', false)->orderBy('title', 'asc')->get();

        return redirect('/list')->with([
            'listType' => $listType,
            'sortBy' => $sortBy,
            'movies' => $movies,
        ]);     
    }
}