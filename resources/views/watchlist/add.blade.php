@extends('layouts.master')

@section('title')
    Add Movie
@endsection

@section('content')
 <div class="container-fluid">
    <div id='content'>
              @if(count($errors) > 0)
                <div class='alert alert-danger error'>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <form method='POST' action='/add'>
            {{ csrf_field() }}

            <p><span class="red">*</span> - required </p>

            <label for='title'><span class="red">*</span>Title</label>
            <input type='text' name='title' id='title' value="{{ old('title'), ''}}"
                required><br>

            <label for='release_year'>Year of Release</label>
            <input type='text' placeholder="YYYY" maxlength='4' name='release_year' 
                id='release_year' value="{{old('release_year'), ''}}"><br>

            <label for='runtime'>Runtime</label>
            <input type='text' name='runtime' id='runtime' placeholder="minutes" 
                value="{{old('runtime'),''}}"><br>

            <label for='imdb_link'><span class="red">*</span>Link to IMDB</label>
            <input type='text' name='imdb_link' id='imdb' placeholder="imdb url" 
                value="{{old('imdb_link'),''}}" required>
            
            <p><span class="red">*</span>Genres (check all that apply to this movie)</p>
                
                @foreach($genreCheckboxes as $id => $name)
                    <input type='checkbox' value='{{ $id }}' class="genreCheckbox" 
                        name='genres' id="genre_{{ $id }}">
                    <label for='genre_{{ $id }}'>{{ $name }}</label>
                @endforeach
            <br>
            <p>Have you watched this movie?</p>
            <input type='radio' name='watched' value='0' checked />No</input>
            <input type='radio' name='watched' value='1' {{ old('watched') == 1 ? 'CHECKED' : '' }} />Yes</input>

             <div id="movieRating">
                <p><span class="red">*</span>Since you've seen this movie, what rating do you give it?</p>
                <label><input type="radio" class="movieRating" name="rating" value="1">1</label>
                <label><input type="radio" class="movieRating" name="rating" value="2">2</label> 
                <label><input type="radio" class="movieRating" name="rating" value="3">3</label> 
                <label><input type="radio" class="movieRating" name="rating" value="4">4</label> 
                <label><input type="radio" class="movieRating" name="rating" value="5">5</label>      
            </div>  
        
            <input class='btn' type='submit' value='ADD MOVIE'>
            <a class='btn' href="/">DONE</a>

        </form>
    </div>
</div>

@endsection