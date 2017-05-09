@extends('layouts.master')

@section('title')
    Movie Watchlist
@endsection
       
@section('content')
    <div class="container-fluid">
        <div id='content'>
            <div id='top_bar'>
            <form method="get" action="/list" name="sortForm" id="sortForm"> 
                <label>SHOW</label>
                <select name="listType" id="showSelect">
                    <option value='unwatched' {{ $listType == "unwatched" ?
                        'SELECTED' : '' }}>UNWATCHED</option>
                    <option value='watched' {{ $listType == "watched" ?
                        'SELECTED' : '' }}>WATCHED</option>
                    <option value='all' {{ $listType == "all" ? 'SELECTED' :
                        '' }}>ALL</option>
                </select>

                <label>SORT BY</label>
                <select name="sortBy" id="sortSelect">
                    <option value="title" {{ $sortBy == "title" ? 'SELECTED' :
                        '' }}> TITLE</option>
                    <option value="rating" id="ratingOption" {{ $sortBy == "rating" ? 
                        'SELECTED' : '' }} >RATING</option>
                    <option value="genre">GENRE</option>
                </select>

         {{--       <select name="genreName" id="genreSelect">
                    @foreach($genreOptions as $genreOption)
                        <option value="{{ $genre->name }}" {{ $sortBy == "genre" ? 'SELECTED' : '' }}>{{$name}}</option>
                    @endforeach
                   
                </select>  --}}

                <input type="submit" value="GO" class="sortBtn">
            </form>
            </div>
            <a class='addBtn' href="/add"><i class="fa fa-plus" aria-hidden="true"></i>
                &nbsp;ADD MOVIE</a> 
            
            @if($sortBy == 'title')
                @include('sort.title')
            @elseif($sortBy == 'genre')
                @include('sort.genre')
            @elseif($sortBy == 'rating')
                @include('sort.rating')
            @endif

        </div>
    </div>

@endsection
 		
    