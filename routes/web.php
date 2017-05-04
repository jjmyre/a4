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

if(App::environment('local')) {
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
};

if(App::environment('local')) {
    Route::get('/drop', function() {
        DB::statement('DROP database movies');
        DB::statement('CREATE database movies');
        return 'Dropped movies; created movies.';
    });
};


# Route::get('/movies/{id}/view', 'MovieListController@view');
# Route::get('/movies/add', 'MovieListController@addMovieView');
# Route::post('movies/add', 'MovieListController@addMovie);
# Route::get('/movies/{id}/edit', 'MovieListController@editMovieView');
# Route::post('/movies/{id}/edit', 'MovieListController@editMovie');
# Route::post('/movies/{id}/delete', 'MovieListController@delete');