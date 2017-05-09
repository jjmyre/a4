<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('favicon.ico') }}" rel="shortcut icon" />
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/movies.css') }}" type='text/css' rel='stylesheet' />
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.js' type='text/javascript' ></script>
    <script src="{{ asset('js/movies.js') }}" type='text/javascript'></script>

	<title>
        @yield('title')
    </title>

</head>

<body>
	<h1 id='banner'><i class="fa fa-film" aria-hidden="true"></i> MOVIE WATCHLIST <i class="fa fa-film" aria-hidden="true"></i></h1>

	@yield('content')


</body>

</html>