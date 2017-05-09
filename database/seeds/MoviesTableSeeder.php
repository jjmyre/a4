<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Star Wars: Episode IV - A New Hope',
            'release_year' => 1977,
            'runtime' => 121,
            'imdb_link' => 'http://www.imdb.com/title/tt0076759/?ref_=fn_al_tt_1',
            'watched' => 1,
            'rating' => 4,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Jaws',
            'release_year' => 1975,
            'runtime' => 124,
            'imdb_link' => 'http://www.imdb.com/title/tt0073195/?ref_=fn_al_tt_1',
            'watched' => 1,
            'rating' => 5,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Guardians of the Galaxy',
            'release_year' => 2014,
            'runtime' => 121,
            'imdb_link' => 'http://www.imdb.com/title/tt2015381/?ref_=fn_al_tt_1',
            'watched' => 1,
            'rating' => 4,
        ]);

         Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => "Prometheus",
            'release_year' => 2012,
            'runtime' => 124,
            'imdb_link' => 'http://www.imdb.com/title/tt1446714/?ref_=fn_al_tt_1',
            'watched' => 1,
            'rating' => 3,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => "No Country for Old Men",
            'release_year' => 2007,
            'runtime' => 122,
            'imdb_link' => 'http://www.imdb.com/title/tt0477348/?ref_=fn_al_tt_1',
            'watched' => 0,
            'rating' => null,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => "Alien",
            'release_year' => 1979,
            'runtime' =>  117,
            'imdb_link' => 'http://www.imdb.com/title/tt0078748/?ref_=fn_al_tt_1',
            'watched' => 0,
            'rating' => null,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'Oldboy',
            'release_year' => 2003,
            'runtime' => 120,
            'imdb_link' => 'http://www.imdb.com/title/tt0364569/?ref_=fn_al_tt_2',
            'watched' => 0,
            'rating' => null,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Revenant',
            'release_year' => 2015,
            'runtime' => 156,
            'imdb_link' => 'http://www.imdb.com/title/tt1663202/?ref_=fn_al_tt_1',
            'watched' => 0,
            'rating' => null,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Godfather',
            'release_year' => 1972,
            'runtime' => 175,
            'imdb_link' => 'http://www.imdb.com/title/tt0068646/?ref_=fn_al_tt_1',
            'watched' => 0,
            'rating' => null,
        ]);

        Movie::insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'title' => 'The Wolf of Wall Street',
            'release_year' => 2013,
            'runtime' => 180,
            'imdb_link' => 'http://www.imdb.com/title/tt0993846/?ref_=fn_al_tt_1',
            'watched' => 0,
            'rating' => null,
        ]);
    }
}