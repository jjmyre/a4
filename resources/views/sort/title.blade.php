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
                    <a href="">{{$genre->name.' '}}</a>
                @endforeach
            </p>  

            @if($movie->release_year)
                <p>Released: {{$movie->release_year}}</p>
            @endif

            @if($movie->runtime)
                <p>Runtime: {{$movie->runtime}} minutes</p>
            @endif

            <a href="{{$movie->imdb_link}}"><i class="fa fa-imdb yellow fa-2x" aria-hidden="true"></i></a>

            <div class="actionDiv">
                <a class='ved' href='/update/{{$movie->id}}'><i class='fa fa-pencil'></i> UPDATE</a>

                <a class='ved' href='/delete/{{$movie->id}}'><i class='fa fa-trash'></i> DELETE</a>
            </div>
        </section>
    @endforeach
@endif
        
 		
    