@extends('layouts.master')

@section('title')
    Movie Watchlist
@endsection
       
@section('content')
    <div class="container-fluid">
        <div id='content'>
            <div id='top_bar'>
            <form method="get" action="/list" name="sortForm" id="sortForm"> 
                <label for="listType">SHOW</label>
                <select name="listType" id="showSelect">
                    <option value='unwatched' {{ $listType == "unwatched" ? 'SELECTED' : '' }}>UNWATCHED</option>
                    <option value='watched' {{ $listType == "watched" ? 'SELECTED' : '' }}>WATCHED</option>
                    <option value='all' {{ $listType == "all" ? 'SELECTED' : '' }}
                            >ALL</option>
                </select>

                <label for="sortBy">SORT BY</label>
                <select name="sortBy" id="sortSelect">
                    <option value="title" {{ $sortBy == "title" ? 'SELECTED' : '' }}> TITLE</option>
                    <option value="genre" {{ $sortBy == "genre" ? 'SELECTED' : '' }}> GENRE</option>
                    <option value="director" {{$sortBy == "director" ? 'SELECTED' : '' }}> DIRECTOR</option>
                    <option value="star" {{ $sortBy == "star" ? 'SELECTED' : '' }}> ACTOR</option>
                    <option value="rating" id="ratingOption" {{ $sortBy == "rating" ? 'SELECTED' : '' }}> RATING</option>
                </select>
                <input type="submit" value="GO" class="sortBtn">
            </form>
            </div>
            <button type="button" class='addBtn'><i class="fa fa-plus" aria-hidden="true"></i> ADD MOVIE</button>
            <button type="button" class='addBtn'><i class="fa fa-close" aria-hidden="true"></i> DONE</button>
           
            <h2 class="listTitle">List of Movies You Want to Watch</h2>
            
            @if(count($movies) == 0)
                <section class='movieList'>
                    <h3>There are no movies in your list.</h3>
                </section>
            @else

                @foreach($movies as $movie)
                    <section class='movieList'>
                        <h3>{{$movie->title}}</h3>
                        <p>Genres:
                            @foreach($movie->genres as $genre) 
                                <span>{{$genre->name.' '}}</span>
                            @endforeach
                        </p>

                            @if($movie->director)
                                <p>Directed By: {{$movie->director}}</p>
                            @endif

                            @if($movie->cast)
                                <p>Starring: {{$movie->cast}} </p>
                            @endif

                            @if($movie->runtime)
                                <p>Runtime: {{$movie->runtime}}</p>
                            @endif

                        <div class="actionDiv">
                            <a class='ved' href='/update/{{$movie->id}}'><i class='fa fa-pencil'></i> UPDATE</a>

                            <a class='ved' href='/delete/{{$movie->id}}'><i class='fa fa-trash'></i> DELETE</a>
                        </div>
                    </section>
                @endforeach
            @endif
        </div>
    </div>

@endsection
 		
    