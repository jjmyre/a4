@extends('layouts.master')

@section('title')
    Delete Movie
@endsection

@section('content')
 <div class="container-fluid">
    <div id='content'>
        <div id="top_bar">
            <h2>DELETE: {{ $movie->title }} </h2>
        </div>
        @include('errors')
        
        <p>Are you sure you want to delete this movie completely?</p>
        <form method='POST' action='/delete' name="deleteMovie" id="deleteForm"> 
            {{ csrf_field() }}

            <p><span class="red">*</span> - required </p>

            <input type='hidden' name='id' value='{{ $movie->id }}'>
            
            <a class="formBtn" href="/">CANCEL</a>
            
            <input type='submit' value='CONFIRM'>

        </form>
    </div>
</div>

@endsection

