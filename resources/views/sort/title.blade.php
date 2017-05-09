<h2 class="listTitle">List of Movies You Want to Watch</h2>
            
@if(count($movies) == 0)
    <section class='movieList'>
        <h3>There are no movies in your list.</h3>
    </section>
@else
    @foreach($movies as $movie)
        <section class='movieList'>
            <h3>{{$movie->title}} &nbsp; 
                <a href="{{$movie->imdb_link}}" target="_blank"><i class="fa fa-imdb yellow" aria-hidden="true"></i></a>
            </h3>
            <p>Genres:
                @foreach($movie->genres as $genre) 
                    <a class="genre" href="">{{$genre->name.' '}}</a>
                @endforeach
            </p>  

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
        
 		
    