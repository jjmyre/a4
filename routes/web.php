<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MovieListController@index');
Route::get('/movies/add', 'MovieListController@addMovieView');

if(App::environment('local')) {
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
};

if(App::environment('local')) {
    Route::get('/drop', function() {
        DB::statement('DROP database watchlist');
        DB::statement('CREATE database watchlist');
        return 'Dropped watchlist; created watchlist.';
    });
};


# Route::get('/movies/{id}/view', 'MovieListController@view');

# Route::post('movies/add', 'MovieListController@addMovie);
# Route::get('/movies/{id}/edit', 'MovieListController@editMovieView');
# Route::post('/movies/{id}/edit', 'MovieListController@editMovie');
# Route::post('/movies/{id}/delete', 'MovieListController@delete');