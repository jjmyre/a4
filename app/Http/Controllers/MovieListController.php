<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use Session;

class MovieListController extends Controller
{

    public function list(Request $request) {
        
        $this->validate($request, [
            'listType' => 'alpha',
            'sortBy' => 'alpha',
            ]);

        $listType = $request->input('listType');
        $sortBy = $request->input('sortBy');

      

        # Determine the type of list and the corresponding movies
   /*     if ($listType == 'unwatched') {
            $movies = Movie::with('genres')->where('watched', '=', false)
                ->orderBy('title', 'asc')->get();
        }
        elseif ($listType == 'watched') {
            $movies = Movie::with('genres')->where('watched', '=', true)
                ->orderBy('title', 'asc')->get();
        }
        elseif ($listType == 'all') {
            $movies = Movie::with('genres')->orderBy('title','asc')->get();
        }
        
        # Determine sroting method for display
        if ($sortBy == 'genre') {

        }
        elseif ($sortBy == 'rating') {

        }

*/
        $movies = Movie::with('genres')->where('watched', '=', false)
                ->orderBy('title', 'asc')->get();


        return view('watchlist.list')->with([
            'listType' => $listType,
            'sortBy' => $sortBy,
            'movies' => $movies,
 //           'genreOptions' => $genreOptions,
            ]); 

	}

    public function addMovie() {

        $genreCheckboxes = Genre::getGenresForCheckboxes();

        return view('watchlist.add')->with([
            'genreCheckboxes' => $genreCheckboxes
        ]);
    }

    public function storeMovie(Request $request) {
        
        $genreCheckboxes = Genre::getGenresForCheckboxes();

        #Validate inputs using laravel class
        $this->validate($request, [
            'title' => "required|regex:/^[\pL\d\s\?\-\_\:]+$/u",  
            'release_year' => 'nullable|numeric|min:1900',
            'runtime' => 'nullable|numeric|min:30|max:300',
            'imdb_link' => 'required|url',
            'genres' => 'required',
            'watched' => 'required',
            'rating' => 'integer',
        ]);

        # Get values from add form
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->release_year = $request->release_year;
        $movie->runtime = $request->runtime;
        $movie->imdb_link = $request->imdb_link;
        $movie->watched = $request->watched;
        $movie->rating = $request->rating;

        if($request->watched == '1') {
            $this->validate($request, [
                'rating' => 'required|integer', 
            ]);
        }

        #save movie
        $movie->save();

        #Get genres and sync with movie
        $genres = ($request->genres);
        $movie->genres()->sync($genres);
        $movie->save();

        Session::flash('message', 'The movie '.$request->title.' was successfully added.');

        # Redirect the user to book index
        return redirect('/add')->with([
            'genreCheckboxes' => $genreCheckboxes
        ]);
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
        return view('watchlist.update');
    }

}
