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
        # Also $movies will be used if $listType = 'all' 
        
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
        elseif ($listType == 'all') {
            if ($sortBy == 'title') {
                $movies = Movie::with('genres')->orderBy('title', 'asc')->get();
            } 
            elseif ($sortBy != 'title') {
                $movies = Movie::with('genres')->whereHas('genres', function($query) use ($sortBy) {
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
            'genreCheckboxes' => $genreCheckboxes,
        ]);
    }

    public function storeMovie(Request $request) {

        #Validate inputs using laravel class
        $this->validate($request, [
            'title' => "required|regex:/^[\pL\d\s\?\-\_\:]+$/u",  
            'release_year' => 'nullable|digits:4|integer|min:1900|max:'.(date('Y')),
            'runtime' => 'nullable|numeric|min:30|max:300',
            'imdb_link' => 'required|url',
            'genres' => 'required',
        ]);

        #Create New Movie

        $movie = new Movie();

        # Get values from add form
   
        $movie->title = $request->title;
        $movie->release_year = $request->release_year;
        $movie->runtime = $request->runtime;
        $movie->imdb_link = $request->imdb_link;
        $movie->watched = 0;

        #save movie
        $movie->save();

        #Get genres and sync with movie
        $genres = $request->genres;
        $movie->genres()->sync($genres);
        $movie->save();

        Session::flash('message', $request->title.' was successfully added. Add another movie if you want.');

        # Get genres for checkboxes

        $genreCheckboxes = Genre::getGenresForCheckboxes();

        # Redirect back to add with checkboxes

        return redirect('/add')->with([
            'genreCheckboxes' => $genreCheckboxes
        ]);
    }

    public function editMovieInfo($id) {

        $movie = Movie::with('genres')->find($id);

        if(is_null($movie)) {
            Session::flash('message', "The movie you're wanting to edit cannot be found.");
            return redirect('/');
        }

        #Get the genres that are associated with the movie

        $genresForMovie = [];
        foreach($movie->genres as $genre) {
            $genresForMovie[] = $genre->name;
        }

        $genreCheckboxes = Genre::getGenresForCheckboxes();

        return view('watchlist.edit')->with([
            'movie' => $movie,
            'genreCheckboxes' => $genreCheckboxes,
            'genresForMovie' => $genresForMovie,
        ]);
    }   

    public function saveMovieInfo(Request $request) {

        #Validate inputs using laravel class
        $this->validate($request, [
            'title' => "required|regex:/^[\pL\d\s\?\-\_\:]+$/u",  
            'release_year' => 'nullable|digits:4|integer|min:1900|max:'.(date('Y')),
            'runtime' => 'nullable|numeric|min:30|max:300',
            'imdb_link' => 'required|url',
            'genres' => 'required',
        ]);

        #Find movie id from table
        $movie = Movie::find($request->id);

        #Get values from form inputs
        $movie->title = $request->title;
        $movie->release_year = $request->release_year;
        $movie->runtime = $request->runtime;
        $movie->imdb_link = $request->imdb_link;
        $movie->rating = $request->rating;
        
        $genres = $request->genres;

        # Save Changes
        $movie->genres()->sync($genres);
        $movie->save();

        return redirect('/');
    }

    public function updateMovieStatus ($id){
        $movie = Movie::with('genres')->find($id);

        if(is_null($movie)) {
            Session::flash('message', "The movie you're wanting to update cannot be found.");
            return redirect('/');
        }

        return view('watchlist.update')->with([
            'movie' => $movie,
        ]);
    }   

    public function saveMovieStatus(Request $request){
                #Validate inputs using laravel class
        
        #Find movie id from table
        $movie = Movie::find($request->id);

        #Get values from form inputs
        $watched = $request->has('watched');

        if($watched) {
            $this->validate($request, [
                'rating' => 'required',
            ]);
        }
        elseif(!$watched) {
            $this->validate($request, [
                'rating' => 'nullable',
            ]);
        } 

        $movie->rating = $request->rating;

        if($watched) {
            $movie->watched = '1';

        }
        elseif(!$watched) {
            $movie->watched = '0';
            $movie->rating = null;
        }

        # Save Changes
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
            Session::flash('message', 'Deletion failed.');
            return redirect('/');
        }

        $movie->genres()->detach();

        $movie->delete();
        
        Session::flash('message', $movie->title.' was deleted from your list.');
        
        return redirect('/');

    }
}