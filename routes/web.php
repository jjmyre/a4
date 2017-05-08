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

# Show sorted movies on list
Route::get('/list', 'MovieListController@list');

# Add Movie to List
Route::get('/add', 'MovieListController@add');
Route::post('/add', 'MovieListController@add');

# Edit/update Movie from list
Route::get('/update/{id}', 'MovieListController@update');
Route::post('/update/{id}', 'MovieListController@update');

# Delete Movie from List
Route::get('/delete{id}', 'MovieListController@delete');
Route::post('/delete{id}', 'MovieListController@delete');




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