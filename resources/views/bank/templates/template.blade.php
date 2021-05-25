<html>
	<head>
		<title>{{$title or 'IBank'}}</title>
		<meta charset=utf-8 />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Gestão de conta e movimentação financeira de bancos" />
        <meta name="author" content="Vitor Parísio" />

        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		
		<!--FontAwesome Icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
		
		<!-- Favicon -->
		<link rel="icon" type="image/png" href="{{url('assets/img/favicon.ico')}}" />
 	</head>
	<body>

		@yield('content')

		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="{{asset('js/js.js')}}"></script>
	</body>
</html>