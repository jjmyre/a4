<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use Session;

class MovieListController extends Controller
{

    public function list(Request $request) {
        
        $listType = $request->input('listType');
        $sortBy = $request->input('sortBy');

        $this->validate($request, [
            'listType' => 'alpha',
            'sortBy' => 'alpha',
            ]);

        if ($sortBy == 'title') {
            if ($listType == 'unwatched') {
                $movies = Movie::with('genres')->where('watched', '=', false)->orderBy('title', 'asc')->get();
            }
            elseif ($listType == 'watched') {
                $movies = Movie::with('genres')->where('watched', '=', true)->orderBy('title', 'asc')->get();
            }
            elseif ($listType == 'all') {
                $movies = Movie::with('genres')->orderBy('title','asc')->get();
                              
            }
        }       
     
    /*     
        elseif ($sortBy == 'actor'){
            
        }
        
        elseif ($sortBy == 'genre'){
            
        }
        
        elseif ($sortBy == 'director'){
            
        }
        
        elseif ($sortBy == 'director'){
            
        }   */

        return view('list')->with([
            'listType' => $listType,
            'sortBy' => $sortBy,
            'movies' => $movies,
        //    'genres' => $genres,
            ]);     
	}

    public function add() {
        return view('add');
    }

    public function delete(Request $request) {
        $movie = Book::find($request->id);

        if(!$movie) {
            Session::flash('message', 'Deletion failed. The movie was not found.');
            return redirect('/list');
        }

        $movie->genres()->detach();

        $movie->delete();

        # Finish
        Session::flash('message', $movie->title.' was deleted.');
        return redirect('/list');
    }

    public function update() {
        return view('update');
    }

}
