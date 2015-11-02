<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>邂逅行 - @yield('title','缘份随行') </title>

	
	<link href="{{ asset('/css/libs.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/main.css') }}" rel="stylesheet">
	@yield('css')

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="{{ asset('/js/shims.js')}}"></script>
	<![endif]-->
</head>
<body id="@yield('id')">
	

	@include('common.header')


	@yield('content')


	@include('common.footer')

	
	<script src="{{ asset('/js/libs.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}"></script>
	@yield('js')

</body>
</html>