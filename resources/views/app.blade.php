<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>邂逅行</title>

	
	<link href="{{ asset('/css/libs.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	@yield('css')

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="{{ asset('/js/shims.js')}}"></script>
	<![endif]-->
</head>
<body id="@yield('id')">
	

	@yield('content')
	
	<script src="{{ asset('/js/libs.js') }}"></script>
	<script src="{{ asset('/js/app.js') }}"></script>
	@yield('js')

</body>
</html>