<head>
  	<title>@if(isset($page_title) && $page_title != '' ) {{ $page_title.' - '}} @endif {{ config('constants.APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('backendAssets/auth/style.css')}}">
	<link rel="stylesheet" href="{{asset('backendAssets/auth/css/style.min.css')}}">
	<!-- jQuery CDN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	<!-- CUSTOM JS -->
	<script>var token = '{{ csrf_token() }}'; var SITE_URL = '{{ url("") }}';</script>
</head>
<body>
	@yield('content')
	<script src="{{asset('themeAssets/sweetalert/sweetalert2.js')}}"></script>
    <script src="{{asset('backendAssets/auth/custom.js')}}"></script>
</body>	
</html>