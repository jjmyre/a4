@extends('layouts.master')

@section('title')
    Movie Watchlist
@endsection
       
@section('content')
    <div class="container-fluid">
        <div id='content'>
            <div id='top_bar'>
                <form method="get" action="/list" name="sortForm" id="sortForm"> 
                    <label>LIST</label>
                    <select name="listType" id="showSelect">
                        <option disabled selected value>-----------------</option> 
                        <option value='unwatched' {{ $listType == "unwatched" ?
                            'SELECTED' : '' }}>UNWATCHED</option>
                        <option value='watched' {{ $listType == "watched" ?
                            'SELECTED' : '' }}>WATCHED</option>
                        <option value='all' {{ $listType == "all" ? 'SELECTED' :
                            '' }}>ALL</option>
                    </select>
                    <label>SORT BY</label>
                    <select name="sortBy" id="sortSelect">
                        <option disabled selected value>-----------------</option>                    
                        <option value="title" {{ $sortBy == "title" ? 'SELECTED' :
                            '' }}> TITLE</option>
                        <optgroup label="GENRE">
                            @foreach($genreOptions as $id => $name)
                                <option value="genre_{{ $id }}" {{ $sortBy == "'genre_'.$id" 
                                    ? 'SELECTED' : '' }}>{{ $name }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <input type="submit" value="GO" class="sortBtn">
                </form>
            </div>

            @include('errors')

            <a class='addBtn' href="/add"><i class="fa fa-plus" aria-hidden="true"></i>
                &nbsp;ADD MOVIE</a> 
            
            @if($sortBy == 'title')
                @include('sort.title')
            @elseif($sortBy == 'genre')
                @include('sort.genre')
            @endif

        </div>
    </div>

@endsection
 		
    