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
            <input type='text' name='directed' id='directed' placeholder="optional" value=''><br>

            <label for='cast'>Starring</label>
            <input type='text' name='cast' id='starring' placeholder="First Name" value="">
           


<!--Change the names of your inputs:

<input name="xyz[]" value="Lorem" />
<input name="xyz[]" value="ipsum"  />
<input name="xyz[]" value="dolor" />
<input name="xyz[]" value="sit" />
<input name="xyz[]" value="amet" />
Then:

$_POST['xyz'][0] == 'Lorem'
$_POST['xyz'][4] == 'amet'  -->



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