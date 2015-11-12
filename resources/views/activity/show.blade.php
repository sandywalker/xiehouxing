@extends('def')

@section('id','activity')
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
	<img src="{{asset($activity->banner)}}" alt="" class="fit">
</div>
<div id="activityNav">
	<div class="container" >
		<div class="row">
			<div class="col-md-12 pad0">
				<nav class="navbar navbar-default navbar-activity">
					<a href="#join" data-scroll class="btn btn-warning navbar-btn navbar-right" id="btnJoin" >立刻报名</a>
					<p class="navbar-text navbar-right">
						<strong>［{{$activity->start_date->format('m月d') }}］{{ $activity->title}}</strong>  &nbsp;&nbsp;
					</p>
		 			<ul class="nav navbar-nav">
		                <li class="active item"><a data-scroll href="#content"> 活动内容</a></li>
		                <li class="item"><a data-scroll href="#timeline">活动动态</a></li>
		                <li class="item"><a data-scroll href="#traffic">参考交通</a></li>
		                <li class="item"><a data-scroll href="#hotel">参考酒店</a></li>
		                <li class="item"><a data-scroll href="#join">加入活动</a></li>
		                <li class="item"><a data-scroll href="#comments">评论</a></li>
		            </ul>

				</nav>
			</div>
		</div>
	</div>
</div>
<div class="container activity-main">
	<div class="row">
		<article class="col-md-8">
			<h3 class="sec-title">{{$activity->title}}</h3>	
			

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
				<p>&nbsp;</p>
				<p>&nbsp;</p>
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
				@include('activity.join-form')
			</div>
			
			<div id="comments">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<h3 class="sec-title">评论</h3>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</div>
		</article>
		<aside class="col-md-4">
			<h2 class="text-center text-orange"><span class="text-md">活动费用:</span> {{round($activity->price)}} <span class="text-md">元</span></h2>
			<hr>

			<p class="text-center">已有 12 人报名参加</p>
			<div id="memberInfo">
				
			</div>	
			<p class="side-title">已经报名的小伙伴</p>
			@foreach($members as $member)
			<div class="member-avatar">
				<img src="{{asset($member->avatar)}}"  class="thumb-sm round" alt="" />
				<p>{{$member->name}}</p>
			</div>
			@endforeach
			<div class="clearfix"></div>
			<hr>
			<p class="side-title">关注此活动的小伙伴</p>
			@foreach($members as $member)
			<div class="member-avatar">
				<img src="{{asset($member->avatar)}}"  class="thumb-xs round" alt="" />
				<p>{{$member->name}}</p>
			</div>
			@endforeach
		</aside>
		
	</div>
</div>
@endsection

@section('js')
	<script src="/js/vendor/stickUp.min.js"></script>
	<script src="/js/vendor/smooth-scroll.min.js"></script>
	<script src="/js/vendor/progressbar.min.js"></script>
	<script>
		 jQuery(function($) {
                $(document).ready( function() {
                 
                  $('#activityNav').stickUp({
                  	 			parts: {
                                  0:'content',
                                  1:'timeline',
                                  2: 'traffic',
                                  3: 'hotel',
                                  4: 'join',
                                  5: 'comments'
                                },
                                itemClass: 'item',
                                itemHover: 'active'
                  });
                  smoothScroll.init();

                  var progressBar = new ProgressBar.Circle('#memberInfo', {
                  	  color: '#ff980a',
                  	  trailColor: '#ccc',
    				  trailWidth: 3,
                      strokeWidth: 3,
                      text:{
                      	 value:'12/20'
                      	
                      }

                  });
                  progressBar.set(12/20);
                });
          });

	</script>

@endsection



