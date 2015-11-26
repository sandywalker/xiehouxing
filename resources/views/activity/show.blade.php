@extends('def')
@section('title')
{{$activity->title}}
@endsection

@section('id','activity')

@section('css')
	<link rel="stylesheet" href="{{asset('css/vendor/magnific-popup.css')}}">
@endsection

@section('content')
<div id="activity-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>{{$activity->title}}</h2>	
				<p>{{$activity->description}}</p>			
			</div>		
		</div>
	</div>
	<div class="bg"></div>
	<img src="{{asset($activity->banner)}}" alt="" class="fit">
</div>
<div id="activityNav">
	<div class="container" >
		<div class="row">
			<div class="col-md-12 pad0">
				<nav class="navbar navbar-default navbar-activity">
					
					<a href="#join" data-scroll class="btn btn-warning navbar-btn navbar-right" id="btnJoin" >
					@if($joined)
					报名信息
					@else
					立刻报名
					@endif
					
					</a>
					<p class="navbar-text navbar-right">
						<strong>［{{$activity->start_date->format('m月d') }}］{{ $activity->title}}</strong>  &nbsp;&nbsp;
					</p>
		 			<ul class="nav navbar-nav">
		                <li class="active menu-item"><a data-scroll href="#content"> 活动内容</a></li>
		                <li class="menu-item"><a data-scroll href="#timeline">活动动态</a></li>
		                <li class="menu-item"><a data-scroll href="#traffic">参考交通</a></li>
		                <li class="menu-item"><a data-scroll href="#hotel">参考酒店</a></li>
		                <li class="menu-item"><a data-scroll href="#join">加入活动</a></li>
		                <li class="menu-item"><a data-scroll href="#comments">留言</a></li>
		            </ul>

				</nav>
			</div>
		</div>
	</div>
</div>
<div class="container activity-main">
	<div class="row">
		<article class="col-md-8">
			<h3 class="sec-title">
				<a href="#" class="btn btn-default pull-right"> <span class="text-orange"><i class="glyphicon glyphicon-heart"></i> 关注 </span></a>
				{{$activity->title}}
			</h3>	
			

			<div id="content">
				{!! $activity->content !!}
			</div> 
			<div id="timeline">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<h3 class="sec-title">活动动态</h3>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				
			</div>
			<div id="traffic">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<h3 class="sec-title">参考交通</h3>
				{!! $activity->traffic !!}
			</div>
			<div id="hotel">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<h3 class="sec-title">参考酒店</h3>
				{!! $activity->hotel !!}
			</div>
			<div id="join">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<h3 class="sec-title">报名</h3>
				@include('activity.join-info')
			</div>
			
			<div id="comments">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<h3 class="sec-title">留言</h3>
				@include('wedgits.comments',[
					'comments'=>$activity->comments,
					'action'=>'/activities/'.$activity->id.'/comments'])
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</div>
		</article>
		<aside class="col-md-4">
			@include('activity.side')
		</aside>
		
	</div>
</div>
@endsection

@section('js')
	<script src="/js/vendor/stickUp.min.js"></script>
	<script src="/js/vendor/smooth-scroll.min.js"></script>
	<script src="/js/vendor/progressbar.min.js"></script>
	<script src="/js/vendor/jquery.magnific-popup.min.js"></script>
	<script src="/js/vendor/jquery.validate.min.js"></script>
	<script>
		 jQuery(function($) {
                $(document).ready( function() {
                  	$('#joinForm').validate();

                  var memberCount = Number('{{$activity->member_count}}');
                  var memberSize = Number('{{$activity->member_size}}');
                  $('#activityNav').stickUp({
                  	 			parts: {
                                  0:'content',
                                  1:'timeline',
                                  2: 'traffic',
                                  3: 'hotel',
                                  4: 'join',
                                  5: 'comments'
                                },
                                itemClass: 'menu-item',
                                itemHover: 'active'
                  });
                  smoothScroll.init();

                  var progressBar = new ProgressBar.Circle('#memberInfo', {
                  	  color: '#ff980a',
                  	  trailColor: '#ccc',
    				  trailWidth: 3,
                      strokeWidth: 3,
                      text:{
                      	 value:memberCount +'/12'
                      	
                      }

                  });
                  var count = memberCount>memberSize?memberSize:memberCount;
                  progressBar.set(count/12);


                  $('.side-photos').magnificPopup({
                    delegate: 'a', // child items selector, by clicking on it popup will open
                    type: 'image',
                    gallery:{
                       enabled:true
                     }
                    // other options
                  });
                });
          });

	</script>

@endsection



