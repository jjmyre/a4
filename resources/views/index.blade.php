@extends('layouts.master')

@section('title')
    Movie Watchlist
@endsection
       
@section('content')
    <div class="container-fluid">
        <div id='content'>
            <a class='addBtn' href='movies/add'><i class="fa fa-plus" aria-hidden="true"></i> ADD MOVIE</a>
            
            <form method="get" action="/sort" id="sortForm"> 
                <label for="sort">SORT BY</label>
                <select name="sort" id="sortSelect">
                    <option value="title" selected> Title</option>
                    <option value="genre"> Genre</option>
                    <option value="rating"> Priority/Rating</option>
                    <option value="star"> Star</option>
                    <option value="director"> Director</option>
                    <option value="year"> Release Year</option>
                </select>
                <input type="submit" value="GO" class="sortBtn">
            </form>

            <section>
                <h2 class="notSeen">Movies You Want to Watch</h2>
            
                <div class='movieList'>
                    <p>There are no movies in your list.</p>
                    <h3 class='movieTitle'><a href='/movies/id/view'>Movie Title</a></h3>  
                    <div class="actionDiv">
                        <a class="ved" href="/movies/id/view"><i class='fa fa-eye'></i> VIEW</a>

                        <a class='ved' href='/movies/id/edit'><i class='fa fa-pencil'></i> UPDATE</a>
                    
                        <a class='ved' href='/movies/id/delete'><i class='fa fa-trash'></i> DELETE</a>
                    </div>
                </div>   

            </section>

            <section>
                <h2 class="seen">Movies You Watched & Rated</h2>
                <div class='movieList'>    
                    <p>You haven't watched any movies in your list yet.</p>
                    <h3 class='movieTitle'><a href='/movies/id/view'>Movie Title</a></h3>
                    <div class="actionDiv">
                        <a class="ved" href="/movies/id/view"><i class='fa fa-eye'></i> VIEW</a>

                        <a class='ved' href='/movies/id/edit'><i class='fa fa-pencil'></i> UPDATE</a>
                    
                        <a class='ved' href='/movies/id/delete'><i class='fa fa-trash'></i> DELETE</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
 		
    