<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="wb:webmaster" content="52ae6570fb323f38" />
	<meta property="qc:admins" content="3317673677601507501676375" />
	<title>邂逅行 - @yield('title','缘份随行') </title>
	@include('common.seo')

	
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
	<script src="{{ asset('/js/vendor/jquery.qqFace.js') }}"></script>

	<script src="{{ asset('/js/main.js') }}"></script>
	
	<script>
		(function(){
			$('#userMenu').webuiPopover({
				padding:0,
				width:160,
				trigger:'hover',
				animation:'pop',
				offsetTop:-10
			});
		})();
	</script>
	@if (session()->has('flash_message'))
	<script>
		swal({
			title:"{{session('flash_message.title')}}",
			text:"{{session('flash_message.message')}}",
			type:"{{session('flash_message.level')}}",
			timer:1700,
			showConfirmButton:false
		});
	</script>
	@endif

	@if (session()->has('flash_message_overlay'))
	<script>
		swal({
			title:"{{session('flash_message_overlay.title')}}",
			text:"{{session('flash_message_overlay.message')}}",
			type:"{{session('flash_message_overlay.level')}}",
			confirmButtonText:'确定'
		});
	</script>
	@endif

	@yield('js')

</body>
</html>