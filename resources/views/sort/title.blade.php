@if($listType == 'unwatched')
    <h2 class="listTitle">Movies You Want to See</h2>
@elseif($listType == 'watched')
    <h2 class="listTitle">Movies You Have Already Seen</h2>
@elseif($listType == 'all')
    <h2 class="listTitle">All of Your Movies</h2>
@endif

            
@if(count($movies) == 0)
    <section class='movieList'>
        <p>There are no movies in this list.</p>
    </section>
@else
    @foreach($movies as $movie)
        <section class='movieList'>
            <h3>{{$movie->title}} &nbsp; <a href="{{ $movie->imdb_link }}" target="_blank">
            <i class="fa fa-imdb yellow" aria-hidden="true"></i></a></h3>
            
            <p>Genres:
                @foreach($movie->genres as $genre) 
                    <span class="genre">{{$genre->name.' '}}</span>
                @endforeach
            </p>  

            @if($movie->release_year)
                <p>Release Year: {{ $movie->release_year }}</p>
            @endif

            @if($movie->runtime)
                <p>Runtime: {{ $movie->runtime }} minutes</p>
            @endif
            
            <div class="actionDiv">
                <a class='ved' href='/edit/{{$movie->id}}'>EDIT MOVIE INFO</a>
                <a class='ved' href='/delete/{{$movie->id}}'>DELETE MOVIE</a>
            </div>
            <hr>
            
            @if($movie->watched)
                <p class="red"><i class="fa fa-check" aria-hidden="true"></i> WATCHED
                
                @if($movie->rating == 5)
                    <i class="fa fa-star star" aria-hidden="true"></i>&nbsp;
                    <i class="fa fa-star star" aria-hidden="true"></i>&nbsp;
                    <i class="fa fa-star star" aria-hidden="true"></i>&nbsp;
                    <i class="fa fa-star star" aria-hidden="true"></i>&nbsp;
                    <i class="fa fa-star star" aria-hidden="true"></i></p>
                @elseif($movie->rating == 4)
                    <i class="fa fa-star star" aria-hidden="true"></i>&nbsp;
                    <i class="fa fa-star star" aria-hidden="true"></i>&nbsp;
                    <i class="fa fa-star star" aria-hidden="true"></i>&nbsp;
                    <i class="fa fa-star star" aria-hidden="true"></i></p>
                @elseif($movie->rating == 3)
                    <i class="fa fa-star star" aria-hidden="true"></i>&nbsp;
                    <i class="fa fa-star star" aria-hidden="true"></i>&nbsp;
                    <i class="fa fa-star star" aria-hidden="true"></i></p>
                @elseif($movie->rating == 2)
                    <i class="fa fa-star star" aria-hidden="true"></i>&nbsp;
                    <i class="fa fa-star star" aria-hidden="true"></i></p>
                @elseif($movie->rating == 1)
                    <i class="fa fa-star star" aria-hidden="true"></i></p>
                @elseif(!$movie->rating)
                    </p>
                @endif
            @else
                <p class="gray">UNWATCHED </p>
            @endif
            <div class="actionDiv">
                <a class='ved' href='/update/{{$movie->id}}'>UPDATE STATUS / RATING</a>
            </div>

        </section>
    @endforeach
@endif
        
 		
    