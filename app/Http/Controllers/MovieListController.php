<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use Session;

class MovieListController extends Controller
{

    public function list(Request $request) {

        # Placing default settings for redirects
    
        $this->validate($request, [
            'listType' => 'required',
            'sortBy' => 'required',
            ]);

        $listType = $request->input('listType');
        $sortBy = $request->input('sortBy');

        
        # Get genres for sortby dropdown that are actually used instead of all of them
        
        $movies = Movie::with('genres')->orderBy('title', 'asc')->get();

        $genreOptions = [];

        foreach($movies as $movie) {
            foreach($movie->genres as $genre) {
                ($genreOptions[$genre['id']] = $genre->name);
            }
        }
        
        ksort($genreOptions);

        # Determine the type of list and the corresponding movies

        if ($listType == 'unwatched') {
            if ($sortBy == 'title') {
                $movies = Movie::with('genres')->where('watched', '=', false)
                    ->orderBy('title', 'asc')->get();
            }
            elseif ($sortBy != 'title') {
                $movies = Movie::with('genres')->where('watched','=', false)->whereHas('genres', function($query) use ($sortBy) {
                    $query->where('name', '=', $sortBy);
                })->orderBy('title', 'asc')->get();
            } 
        }
        elseif ($listType == 'watched') {
            if ($sortBy == 'title') {
                $movies = Movie::with('genres')->where('watched', '=', true)->orderBy('title', 'asc')->get();
            } 
            elseif ($sortBy != 'title') {
                $movies = Movie::with('genres')->where('watched','=', true)->whereHas('genres', function($query) use ($sortBy) {
                    $query->where('name', '=', $sortBy);
                })->orderBy('title', 'asc')->get();
            }
        }
     
        return view('watchlist.list')->with([
            'listType' => $listType,
            'sortBy' => $sortBy,
            'movies' => $movies,
            'genreOptions' => $genreOptions,
        ]); 
    }



    public function addMovie() {

        $genreCheckboxes = Genre::getGenresForCheckboxes();

        return view('watchlist.add')->with([
            'genreCheckboxes' => $genreCheckboxes
        ]);
    }

    public function storeMovie(Request $request) {

        #Validate inputs using laravel class
        $this->validate($request, [
            'title' => "required|regex:/^[\pL\d\s\?\-\_\:]+$/u",  
            'release_year' => 'nullable|numeric|min:1900|max:2100',
            'runtime' => 'nullable|numeric|min:30|max:300',
            'imdb_link' => 'required|url',
            'genres' => 'required',
            'watched' => 'required',
        ]);

        #Create New Movie

        $movie = new Movie();

        # Get values from add form
   
        $movie->title = $request->title;
        $movie->release_year = $request->release_year;
        $movie->runtime = $request->runtime;
        $movie->imdb_link = $request->imdb_link;
        $movie->watched = $request->watched;

        #save movie
        $movie->save();

        #Get genres and sync with movie
        $genres = $request->genres;
        $movie->genres()->sync($genres);
        $movie->save();

        Session::flash('message', 'The movie '.$request->title.' was successfully added.');

        # Get genres for checkboxes

        $genreCheckboxes = Genre::getGenresForCheckboxes();

        # Redirect back to add with checkboxes

        return redirect('/add')->with([
            'genreCheckboxes' => $genreCheckboxes
        ]);
    }

    public function editMovie($id) {

        $movie = Movie::with('genres')->find($id);

        if(is_null($movie)) {
            Session::flash('message', "The movie that you're wanting to edit cannot be found.");
            return redirect('/');
        }

        
        $genresForMovie = [];
        foreach($movie->genres as $genre) {
            $genresForMovie[] = $genre->name;
        }

        $genreCheckboxes = Genre::getGenresForCheckboxes();

        return view('watchlist.edit')->with([
            'id' => $id,
            'movie' => $movie,
            'genreCheckboxes' => $genreCheckboxes,
            'genresForMovie' => $genresForMovie,
        ]);
    }   

    public function saveMovie(Request $request) {

        #Validate inputs using laravel class
        $this->validate($request, [
            'title' => "required|regex:/^[\pL\d\s\?\-\_\:]+$/u",  
            'release_year' => 'nullable|numeric|min:1900|max:2100',
            'runtime' => 'nullable|numeric|min:30|max:300',
            'imdb_link' => 'required|url',
            'genres' => 'required',
            'watched' => 'required',
        ]);

        # Get values from add form
        $movie = Movie::find($request->id);

        $movie->title = $request->title;
        $movie->release_year = $request->release_year;
        $movie->runtime = $request->runtime;
        $movie->imdb_link = $request->imdb_link;
        $movie->watched = $request->watched;
        $genres = $request->genres;

        # Save Changes
        $movie->genres()->sync($genres);
        $movie->save();

        return redirect('/');
    }

    public function deleteConfirm($id) {
        $movie = Movie::find($id);

        if(!$movie) {
            Session::flash('message', 'Deletion failed. The movie was not found.');
            return redirect('/');
        }

        return view('watchlist.delete')->with('movie', $movie);

    }

    public function deleteMovie(Request $request) {
        $movie = Movie::find($request->id);

        if(!$movie) {
            Session::flash('message', 'Deletion failed. The movie was not found.');
            return redirect('/');
        }

        $movie->genres()->detach();

        $movie->delete();

        
        Session::flash('message', $movie->title.' was deleted from your list.');
        
        return redirect('/');

    }
}