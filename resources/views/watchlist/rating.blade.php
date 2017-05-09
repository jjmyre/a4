
@if(count($movies) == 0)
    <section class='movieList'>
        <h3>No movies have rating of 5.</h3>
        <h3>No movies have rating of 4.</h3>
        <h3>No movies have rating of 3.</h3>
        <h3>There are no movies rating of 2.</h3>
        <h3>There are no movies rated 1.</h3>
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

                        @if($movie->year)
                            <p>Runtime: {{$movie->runtime}}</p>
                        @endif

                        @if($movie->runtime)
                            <p>Runtime: {{$movie->runtime}}</p>
                        @endif

                        <a href="{{$movie->imdb_link}}"><i class="fa fa-imdb" aria-hidden="true"></i></a>

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