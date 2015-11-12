@extends('def')

@section('id','space')
@section('title')
 {{ $user->name}}的空间
@endsection
@section('content')
@include('common.space-banner')
<div class="container space-main">
	@include('common.space-menu',['menu'=>'favs'])
	<div class="row">
		@include('common.space-side')
		<article class="col-md-9">
			<p>&nbsp;</p>
				@if (count($guides)>0)
					@foreach($guides as $guide)
					<div class="row">
						<div class="col-md-2">
							<div class="thumb-guide">
								<a href="/guides/{{$guide->id}}" target="_blank" ><img src="{{asset($guide->thumb)}}" alt="" class="full-width ">	</a>
							</div>
							
						</div>
						<div class="col-md-10">
							<h5 class="guides-title">
								<span class="pull-right text-sm text-muted">
									<i class="glyphicon glyphicon-eye-open text-main"></i> {{$guide->hits}} &nbsp; 
									<i class="glyphicon glyphicon-star text-main"></i> {{$guide->favs}}
									<i class="glyphicon glyphicon-comment text-main"></i> {{$guide->cmts}} &nbsp;
									<i class="glyphicon glyphicon-heart text-main"></i> {{$guide->likes}}
								</span>
								
								<a href="/guides/{{$guide->id}}" target="_blank" class="link-orange"><strong>{{$guide->title}}</strong></a>
							</h5>
							<p class="text-muted text-sm guides-description">
								{{$guide->description}}
							</p>
							<p class="text-sm">
								<span class="pull-right text-orange"> <i class="glyphicon glyphicon-map-marker"></i> 
								{{$guide->area}} &nbsp;&nbsp;
								{{ substr($guide->created_at,0,10)}}</span>
								@if($user->isme())
								<span class="pull-left">
									<a href="/fav/guide/{{$guide->id}}/unFav">取消收藏</a>
								</span>
								@endif
							</p>
						</div>
					</div>

					<div class="divider"></div>

				@endforeach
				@else
					<div class=" well-space  text-center text-muted">
						还没有收藏，去看看 <a href="/guides">攻略吧！</a>！
					</div>
				@endif
			<p>&nbsp;</p>
		</article>
	</div>
</div>

@endsection