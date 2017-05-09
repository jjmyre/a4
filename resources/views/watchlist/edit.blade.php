@extends('layouts.master')

@section('title')
    Edit Movie
@endsection

@section('content')
 <div class="container-fluid">
    <div id='content'>
        <div id="top_bar">
            <h2>EDIT: {{ $movie->title }} </h2>
        </div>
        @include('errors')

        <form method='POST' action='/edit/{{ $movie->id }}' name="editMovie" id="editForm"> 
            {{ csrf_field() }}

            <p><span class="red">*</span> - required </p>

            <input type='hidden' name='id' value='{{ $movie->id }}'>

            <label for='title'><span class="red">*</span>Title</label>
            <input type='text' name='title' id='title' value="{{ old('title', $movie->title) }}"
                required><br>

            <label for='release_year'>Year of Release</label>
            <input type='text' placeholder="YYYY" maxlength='4' name='release_year' 
                id='release_year' value="{{ old('release_year', $movie->release_year) }}"><br>

            <label for='runtime'>Runtime</label>
            <input type='text' name='runtime' id='runtime' placeholder="minutes" 
                value="{{ old('runtime', $movie->runtime) }}"><br>

            <label><span class="red">*</span>Link to IMDB</label>
            <input type='text' name='imdb_link' id='imdb' placeholder="imdb url" 
                value="{{ old('imdb_link', $movie->imdb_link) }}" required>
            
            <p><span class="red">*</span>Genres (check all that apply to this movie)</p>
                
                @foreach($genreCheckboxes as $id => $name)
                    <input type='checkbox' value='{{ $id }}' class="genreCheckbox" 
                        name='genres[]' id="genre_{{ $id }}" {{ (in_array($name,$genresForMovie)) ? 'CHECKED' : '' }} >
                    <label for='genre_{{ $id }}'>{{ $name }}</label>
                @endforeach
            <br>
            <p>Have you watched this movie?</p>
            <label><input type='radio' name='watched' value='0' checked />No</label>
            <label><input type='radio' name='watched' value='1' {{ $movie->watched == true ? 'CHECKED' : '' }} />Yes</label>

             <div id="movieRating">
                <p><span class="red">*</span>Since you've seen this movie, what rating do you give it?</p>
                <label><input type="radio" class="movieRating" name="rating" value="1" 
                    {{ (old('rating') == 1 or $movie->rating == 1) ? 'CHECKED' : ''}}>1</label>
                <label><input type="radio" class="movieRating" name="rating" value="2" 
                    {{ (old('rating') == 2 or $movie->rating == 2) ? 'CHECKED' : ''}}>2</label> 
                <label><input type="radio" class="movieRating" name="rating" value="3" 
                    {{ (old('rating') == 3 or $movie->rating == 3) ? 'CHECKED' : ''}}>3</label> 
                <label><input type="radio" class="movieRating" name="rating" value="4" 
                    {{ (old('rating') == 4 or $movie->rating == 4) ? 'CHECKED' : ''}}>4</label> 
                <label><input type="radio" class="movieRating" name="rating" value="5" 
                    {{ (old('rating') == 5 or $movie->rating == 5) ? 'CHECKED' : ''}}>5</label>      
            </div>  
        
            <input class='btn' type='submit' value='SAVE CHANGES'>

        </form>
    </div>
</div>

@endsection
