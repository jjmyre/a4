@extends('layouts.master')

@section('content')
 <div class="container-fluid">
    <div id='content'>

        <form method='POST' action='/movies/add'>
            {{ csrf_field() }}

            <input type='hidden' name='id' value=''>

            <label for='title'><span class="red">*</span>Title</label>
            <input type='text' name='title' id='title' value=''><br>

            <label for='title'>Year of Release</label>
            <input type='number' placeholder="YYYY" name='title' id='title' value=''><br>

            <label for='directed'>Directed By</label>
            <input type='text' name='directed' id='directed' value=''><br>

            <label for='written'>Written By</label>
            <input type='text' name='title' id='written' value=''><br>

            <label for='starring'>Starring</label>
            <input type='text' name='starring' id='starring' value=''><br>

            <p>Check all genres that apply</p>
      {{--      <ul id='genres'>
                @foreach($genresCheckboxes as $id => $name)
                    <li><input
                        type='checkbox'
                        value='{{ $id }}'
                        id='tag_{{ $id }}'
                        name='genres[]'
                        {{ (in_array($name, $tagsForThisBook)) ? 'CHECKED' : '' }}
                    >&nbsp;
                    <label for='genre_{{ $id }}'>{{ $name }}</label></li>
                @endforeach
            </ul>
           --}}
            <p><span class="red">*</span>Have you watched this movie?</p>
            <label><input type='radio' name='watched' value='no' id="watched_no" {{ old('watched') == "no" ? 'CHECKED' : '' }}  />No</label>
            <label><input type='radio' name='watched' value='yes' id="watched_yes" {{ old('watched') == "yes" ? 'CHECKED' : '' }} />Yes</label><br>
            
            
            <div id="moviePriority">
                <p>Since you haven't watched this movie, what is your priority level to see it?</p>
                <label><input type="radio" class="moviePriority" name="movieRating" value="1">1</label>
                <label><input type="radio" class="moviePriority" name="movieRating" value="2">2</label> 
                <label><input type="radio" class="moviePriority" name="movieRating" value="3">3</label> 
                <label><input type="radio" class="moviePriority" name="movieRating" value="4">4</label> 
                <label><input type="radio" class="moviePriority" name="movieRating" value="5">5</label>   
            </div>

            <div id="movieRating">
                <p>Since you've watched this movie, how do you rate it?</p>
                <label><input type="radio" class="movieRating" name="movieRating" value="1">1</label>
                <label><input type="radio" class="movieRating" name="movieRating" value="2">2</label> 
                <label><input type="radio" class="movieRating" name="movieRating" value="3">3</label> 
                <label><input type="radio" class="movieRating" name="movieRating" value="4">4</label> 
                <label><input type="radio" class="movieRating" name="movieRating" value="5">5</label>      
            </div>  
        
            <input class='btn btn-primary' type='submit' value='ADD MOVIE'>
            <button class="btn btn-primary"><a href='/'>DONE</a></button>
        </form>
    </div>
</div>

@endsection