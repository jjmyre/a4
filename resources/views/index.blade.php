@extends('layouts.master')

@section('title')
    Movie Watchlist
@endsection
       
@section('content')
    <div class="container-fluid">
        <div id='content'>

            <a class='addBtn' href='lists/create'><i class="fa fa-plus" aria-hidden="true"></i> ADD MOVIE</a>


            <h2 class="notSeen">YOU WANT TO SEE</h2>
            
            <div class="sortDiv">
                <a href="movies/sort/title">SORT BY TITLE</a>

                <a href="movies/sort/genre">SORT BY GENRE</a>

                <a href="movies/sort/title">SORT BY PRIORITY</a>

            </div>

            <section>
                <p>There are no movies in your list yet.</p>    

                <div class='movieListDiv'>
                    <h3 class='movieTitle'><a href='/movies/id/view'>Movie Title</a></h3>
                    <div class="actionDiv">
                        <a class="ved" href="/movies/id/view"><i class='fa fa-eye'></i></a>

                        <a class='ved' href='/movies/id/edit'><i class='fa fa-pencil'></i></a>
                    
                        <a class='ved' href='/movies/id/delete'><i class='fa fa-trash'></i></a>
                    </div>
                </div>
                
                <div id="movieRating">
                    <p>Now that you've seen it, how do you rate this movie?</p>
                    <label><input type="radio" class="movieRating" name="movieRating" value="1">1</label>
                    <label><input type="radio" class="movieRating" name="movieRating" value="2">2</label> 
                    <label><input type="radio" class="movieRating" name="movieRating" value="3">3</label> 
                    <label><input type="radio" class="movieRating" name="movieRating" value="4">4</label> 
                    <label><input type="radio" class="movieRating" name="movieRating" value="5">5</label>      
                </div>     

            </section>    

            <h2 class="seen">YOU HAVE SEEN</h2>
            
            <div class="sortDiv">
                <a href="movies/sort/title">SORT BY TITLE</a>

                <a href="movies/sort/genre">SORT BY GENRE</a>

                <a href="movies/sort/rating">SORT BY RATING</a>
            </div>

            <p>You haven't seen any movies in your list yet.</p>  



        </div>
    </div>

@endsection
 		
    