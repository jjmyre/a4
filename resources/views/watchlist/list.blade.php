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
                        <option disabled>-----------------</option> 
                        <option value='unwatched' {{ $listType == "unwatched" ?
                            'SELECTED' : '' }}>Unwatched</option>
                        <option value='watched' {{ $listType == "watched" ?
                            'SELECTED' : '' }}>Watched</option>
                        <option value='all' {{ $listType == "all" ? 'SELECTED' :
                            '' }}>All</option>
                    </select>
                    <label>SORT BY</label>
                    <select name="sortBy" id="sortSelect">
                        <option disabled>-----------------</option>                    
                        <option value="title" {{ $sortBy == "title" ? 'SELECTED' :
                            '' }}> Title</option>
                        <optgroup label="Genre">
                            @foreach($genreOptions as $id => $name)
                                <option value="{{ $name }}" {{ $sortBy == $name 
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
            @else
                @include('sort.genre')
            @endif

        </div>
    </div>

@endsection
 		
    