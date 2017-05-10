@if($listType == 'unwatched')
    <h2 class="listTitle">{{ $sortBy }} Movies You Want to See</h2>
@elseif($listType == 'watched')
    <h2 class="listTitle">{{ $sortBy }} Movies You Have Already Seen</h2>
@elseif($listType == 'all')
    <h2 class="listTitle">All {{ $sortBy }} Movies</h2>
@endif

            
@if(count($movies) == 0)
    <section class='movieList'>
        <h3>There are no movies in this list.</h3>
    </section>
@else
    @foreach($movies as $movie)
        <section class='movieList'>
            <h3>{{$movie->title}} &nbsp; 
                <a href="{{$movie->imdb_link}}" target="_blank"><i class="fa fa-imdb yellow" aria-hidden="true"></i></a>
            </h3>

            @if($movie->release_year)
                <p>Release Year: {{$movie->release_year}}</p>
            @endif

            @if($movie->runtime)
                <p>Runtime: {{$movie->runtime}} minutes</p>
            @endif

            <div class="actionDiv">
                <a class='ved' href='/edit/{{$movie->id}}'><i class='fa fa-pencil'></i> EDIT</a>

                <a class='ved' href='/delete/{{$movie->id}}'><i class='fa fa-trash'></i> DELETE</a>
            </div>
        </section>
    @endforeach
@endif