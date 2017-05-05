<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use Session;

class MovieListController extends Controller
{
    public function index() {
    	$lists = 0;
    	$type = 0;

    	return view('index')->with([
            'lists' => $lists,
            'type' => $type,
        ]);
    }

    public function addMovieView(Request $request) {
        return view('add');
	}

     public function deleteMovie(Request $request) {
        return view('add');
    }
}
