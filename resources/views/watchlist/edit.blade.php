@extends('layouts.master')

@section('title')
    Edit Movie Information
@endsection

@section('content')
    <div class="container-fluid">
        <div id='content'>
            <div id="top_bar">
                <h2>Edit: {{ $movie->title }} </h2>
            </div>
            
            @include('errors')

            <form method='POST' action='/edit/{{ $movie->id }}' name="editMovie" class="form"> 
                
                {{ csrf_field() }}
                
                <input type='hidden' name='id' value='{{ $movie->id }}'>

                <br>
                <label class="alignLabel" for='title'><span class="red">*</span>Title</label>
                <input type='text' name='title' class="alignInput"  id='title' value="{{ old('title', $movie->title) }}" required><br><br>

                <label class="alignLabel" for='release_year'>Release Year</label>
                <input type='text' class="alignInput"  placeholder="YYYY" maxlength='4' name='release_year' id='release_year' value="{{ old('release_year', $movie->release_year) }}"><br><br>

                <label class="alignLabel" for='runtime'>Runtime</label>
                <input type='text' class="alignInput" name='runtime' id='runtime' placeholder="minutes" maxlength="3" value="{{ old('runtime', $movie->runtime) }}"><br><br>

                <label class="alignLabel"><span class="red">*</span>IMDB Link</label>
                <input type='url' class="alignInput" name='imdb_link' id='imdb' placeholder="full url" value="{{ old('imdb_link', $movie->imdb_link) }}" required><br><br>
                
                <p class="genreLabel"><span class="red">*</span>Genres</p>
                <p><em>Check all that apply (but at least one)</em></p>
                   
                <div id="genreBoxContainer">
                    @foreach($genreCheckboxes as $id => $name)
                        <div class="genreBox">
                            <input type='checkbox' value='{{ $id }}' name='genres[]' id="genre_{{ $id }}" {{ (in_array($name,$genresForMovie)) ? 'CHECKED' : '' }} >
                            <label for='genre_{{ $id }}'>{{ $name }}</label>
                        </div>
                    @endforeach
                </div>

                <input class='formBtn btn btn-success' type='submit' value='UPDATE'>
                <a href="/" class="goBack"><i class="fa fa-arrow-left" aria-hidden="true"></i> GO BACK TO LIST</a>
            </form>
        </div>
    </div>
@endsection
