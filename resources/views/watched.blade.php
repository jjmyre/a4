@extends('layouts.master')

@section('title')
    Movie Watchlist
@endsection
       
@section('content')
    <div class="container-fluid">
        <div id='content'>
            <div id='top_bar'>
            <form method="get" action="/show" name="sortForm" id="sortForm"> 
                <label for="show">SHOW</label>
                <select name="show" id="showSelect">
                    <option value='0'>Unwatched</option>
                    <option value='1'>Watched</option>
                </select>

                <label for="sort">SORT BY</label>
                <select name="sort" id="sortSelect">
                    <option value="title" selected>Title</option>
                    <option value="genre">Genre</option>
                    <option value="director">Director</option>
                    <option value="star">Actor</option>
                    <option value="rating" id="ratingOption">Rating</option>
                </select>
                <input type="submit" value="GO" class="sortBtn">
            </form>
            
            <h2 class="listTitle">List of Movies You Want to Watch</h2>
            <a class='addBtn' href='movies/add'><i class="fa fa-plus" aria-hidden="true"></i> ADD MOVIE</a>

            <section>
                <h2 class="seen">List of Movies You Watched & Rated</h2>
                <div class='movieList'>    
                    <p>You haven't watched any movies in your list yet.</p>
                    <h3 class='movieTitle'><a href='/movies/id/view'>Movie Title</a></h3>
                    <ul>
                        <li>Genres: action, adventure, romance</li>
                        <li>Director: Steven Spielberg</li>
                        <li>Starring: Tom Cruise</li>
                        <li>Runtime: 128mins</li>
                        <li>Your Rating: 5 stars</li>
                    </ul>  
                    <div class="actionDiv">
                        <a class='ved' href='/movies/id/edit'><i class='fa fa-pencil'></i> UPDATE</a>
                    
                        <a class='ved' href='/movies/id/delete'><i class='fa fa-trash'></i> DELETE</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
 		
    