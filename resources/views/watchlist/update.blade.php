@extends('layouts.master')

@section('title')
    Edit Movie Information
@endsection

@section('content')
    <div class="container-fluid">
        <div id='content'>
            <div id="top_bar">
                <h2>Update: {{ $movie->title }} </h2>
            </div>
            
            @include('errors')

            <form method='POST' action='/update/{{ $movie->id }}' name="updateMovie" class="form"> 
                
                {{ csrf_field() }}
                
                <input type='hidden' name='id' value='{{ $movie->id }}'>
                <br>
                <div id="watchedCheckbox">    
                    <label id="watchedBox"><input type='checkbox' name='watched' id="watched" 
                        value='checked' {{ $movie->watched == '1' ? 'CHECKED' : '' }} /> Watched?</label>
                </div><br>

                <div id="movieRating">
                    <p><span class="red">*</span>Movie Rating</p>
                    <div class="ratingRadios">
                        <label><input type="radio" class="movieRating" name="rating" value="1" 
                            {{ $movie->rating == '1' ? 'CHECKED' : '' }}>1 <i class="fa fa-star" aria-hidden="true"></i></label>
                        <label><input type="radio" class="movieRating" name="rating" value="2" 
                            {{ $movie->rating == '2' ? 'CHECKED' : '' }}>2 <i class="fa fa-star" aria-hidden="true"></i></label> 
                        <label><input type="radio" class="movieRating" name="rating" value="3" 
                            {{ $movie->rating == '3' ? 'CHECKED' : '' }}>3 <i class="fa fa-star" aria-hidden="true"></i></label> 
                        <label><input type="radio" class="movieRating" name="rating" value="4" 
                            {{ $movie->rating == '4' ? 'CHECKED' : '' }}>4 <i class="fa fa-star" aria-hidden="true"></i></label> 
                        <label><input type="radio" class="movieRating" name="rating" value="5" 
                            {{ $movie->rating == '5' ? 'CHECKED' : '' }}>5 <i class="fa fa-star" aria-hidden="true"></i></label>      
                    </div>
                </div><br>  

                <input class='formBtn btn btn-success' type='submit' value='UPDATE'>
                <a href="/" class="goBack"><i class="fa fa-arrow-left" aria-hidden="true"></i> GO BACK TO LIST</a>
            </form>
        </div>
    </div>
@endsection
