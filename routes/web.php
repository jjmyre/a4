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

# Home
Route::get('/', 'HomeController');

# Show & sort movies to list
Route::get('/list', 'MovieListController@list');

# Add Movie to List
Route::get('/add', 'MovieListController@addMovie');
Route::post('/add', 'MovieListController@storeMovie');

#Edit movie info
Route::get('/edit/{id}', 'MovieListController@editMovieInfo');
Route::post('/edit/{id}', 'MovieListController@saveMovieInfo');

# Update Movie from list
Route::get('/update/{id}', 'MovieListController@updateMovieStatus');
Route::post('/update/{id}', 'MovieListController@saveMovieStatus');

# Delete Movie from List
Route::get('/delete/{id}', 'MovieListController@deleteConfirm');
Route::post('/delete', 'MovieListController@deleteMovie');


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