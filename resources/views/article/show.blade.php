@extends('def')


@section('content')
	<img src="{{asset('img/article-photo.jpg')}}" class="fit" alt="">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><br></div>
		</div>
		<div class="row">
			@include('article.menu',['menu'=>$tag])
			<div class="col-md-10">
				<h4 class="text-center"><strong>{{$article->title}}</strong></h4>
				<hr>
				<div class="content">
					{!!$article->content!!}
				</div>
			</div>
		</div>
	</div>
@endsection