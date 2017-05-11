@extends('layouts.master')

@section('title')
    Delete Movie
@endsection

@section('content')
 <div class="container-fluid">
    <div id='content'>
        <div id="top_bar">
            <h2>Delete {{ $movie->title }} </h2>
        </div>
        @include('errors')
        
        <form method='POST' action='/delete' name="deleteMovie" class="form"> 
            {{ csrf_field() }}
            <br>
            <p>Are you sure you want to delete this movie completely?</p>

            <input type='hidden' name='id' value='{{ $movie->id }}'>

            
            <input type='submit' value='CONFIRM' class="btn btn-success formBtn">
            <a class="goBack" href="/"><i class="fa fa-arrow-left" aria-hidden="true"></i> CANCEL / GO BACK TO LIST</a>

        </form>
    </div>
</div>

@endsection

