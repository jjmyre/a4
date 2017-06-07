@extends('layouts.master')

@section('title')
    Add Movie
@endsection

@section('content')
    <div class="container-fluid">
        <div id='content'>
            <div id="top_bar">
                <h2>Add a Movie You Want to See</h2>
            </div>
            @include('errors')

            <form method='POST' action='/add' name="addMovie" class="form">
                
                {{ csrf_field() }}
                <br>    
                
                <label for='title' class="alignLabel"><span class="red">*</span>Title</label>

                <input type='text' name='title' class="alignInput" id='title' value="{{ old('title'), ''}}" required><br><br>

                <label for='release_year' class="alignLabel">Release Year</label>
                <input type='text' class="alignInput" placeholder="YYYY" maxlength='4' name='release_year' id='release_year' value="{{old('release_year'), ''}}"><br><br>

                <label for='runtime' class="alignLabel">Runtime</label>
                <input type='text' name='runtime' class="alignInput"  id='runtime' placeholder="minutes" maxlength="3" value="{{old('runtime'),''}}"><br><br>

                <label class="alignLabel"><span class="red">*</span>IMDB Link</label>
                <input type='url' name='imdb_link' class="alignInput" id='imdb' placeholder="full url" value="{{old('imdb_link'),''}}" required><br><br>
                
                <p class="genreLabel"><span class="red">*</span>Genres</p> 
                <p><em>Check all that apply (but at least one)</em></p>

                <div id="genreBoxContainer">     
                    @foreach($genreCheckboxes as $id => $name)
                        <div class="genreBox">
                            <input type='checkbox' value='{{ $id }}' name='genres[]' id="genre_{{ $id }}" >  
                            <label for='genre_{{ $id }}'>{{ $name }}</label>
                        </div>
                    @endforeach  
                </div>

                <input class='formBtn btn btn-success' type='submit' value='ADD'><br>
                
                <a href="/" class="goBack"><i class="fa fa-arrow-left" aria-hidden="true">
                
                </i> DONE / GO BACK TO LIST</a>
            </form>
        </div>
    </div>
@endsection