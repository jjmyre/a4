@extends('layouts.master')

@section('title')
    Movie Watchlist
@endsection
       
@section('content')
    <div class="container-fluid">
        <div id='content'>

            <a class='addBtn' href='lists/create'><i class="fa fa-plus" aria-hidden="true"></i> ADD MOVIE</a>
            
            <form method="get" action="/sort" id="sortForm"> 
                <select name="sort" id="sortSelect" required>
                    <option disabled selected>SORT BY</option>
                    <option value="title" >Title</option>
                    <option value="genre">Genre</option>
                    <option value="rating">Priority/Rating</option>
                    <option value="star">Star</option>
                    <option value="director">Director</option>
                    <option value="writer">Writer</option>
                    <option value="year">Release Year</option>
                </select>

                <input type="submit" value="GO" class="sortBtn">
            </form>
<option disabled selected value>Select Tax Year</option>
            <section>
                <h2 class="notSeen">Movies You Want to Watch</h2>
            
                <div class='movieList'>
                    <p>There are no movies in your list yet.</p>  
                    <h3 class='movieTitle'><a href='/movies/id/view'>Movie Title</a></h3>  
                    <div class="actionDiv">
                        <a class="ved" href="/movies/id/view"><i class='fa fa-eye'></i></a>

                        <a class='ved' href='/movies/id/edit'><i class='fa fa-pencil'></i></a>
                    
                        <a class='ved' href='/movies/id/delete'><i class='fa fa-trash'></i></a>
                    </div>
                </div>   

            </section>

            <section>
                <h2 class="seen">Movies You Have Watched</h2>
                <div class='movieList'>    
                    <p>You haven't seen any movies in your list yet.</p>
                    <h3 class='movieTitle'><a href='/movies/id/view'>Movie Title</a></h3>
                    <div class="actionDiv">
                        <a class="ved" href="/movies/id/view"><i class='fa fa-eye'></i></a>
                        <a class='ved' href='/movies/id/edit'><i class='fa fa-pencil'></i></a>
                        <a class='ved' href='/movies/id/delete'><i class='fa fa-trash'></i></a>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
 		
    