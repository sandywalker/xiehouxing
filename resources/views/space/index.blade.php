@extends('def')

@section('id','space')
@section('title')
- {{ $user->name}} 的空间
@endsection
@section('content')
@include('common.space-banner')
<div class="container space-main">
	@include('common.space-menu')
	<div class="row">
		@include('common.space-side')
		<article class="col-md-9">
			<p>&nbsp;</p>
			<br>	
			@if($isme)
			<div class="row text-center">
				<div class="col-md-4"> 
					<div class="hot-nav"> 
						<p><i class="glyphicon glyphicon-map-marker hot-nav-icon" ></i></p>
						<p class="text-muted">放松一下，写下旅途的点滴吧！</p>
						<a href="" class="btn btn-success "> <i class="glyphicon glyphicon-pencil"></i> 写游记</a> 
					</div> 
				</div>
				<div class="col-md-4"> <div class="hot-nav">
					<p><i class="glyphicon glyphicon-globe hot-nav-icon" ></i></p>
					<p class="text-muted">看看攻略，找找灵感！</p>
					<a href="" class="btn btn-warning "> <i class="glyphicon glyphicon-eye-open"></i> 看攻略</a> 
					</div></div>
				<div class="col-md-4"> 
					<div class="hot-nav last">
					
						<p><i class="glyphicon glyphicon-road hot-nav-icon"></i></p>
						<p class="text-muted">背上行囊，期待旅行的邂逅！</p>
						<a href="" class="btn btn-warning"> <i class="glyphicon glyphicon-certificate"></i> 参加活动</a>
					</div>
				</div>
			</div>
			<p>&nbsp;</p>
			@endif
			<h4 class="space-head"> <a href="#" class="pull-right text-md"> 更多 </a> 我的游记</h4>
			<div class="row">
				<div class="col-md-2">
					<div class="thumb-note">
						<img src="{{asset('img/note1.jpg')}}" alt="" class="full-width ">	
					</div>
					
				</div>
				<div class="col-md-10">
					<h5>
						<span class="pull-right text-sm text-muted">
							<i class="glyphicon glyphicon-eye-open text-main"></i> 1209 &nbsp; 
							<i class="glyphicon glyphicon-comment text-main"></i> 35 &nbsp;
							<i class="glyphicon glyphicon-thumbs-up text-main"></i>185
						</span>
						
						<strong>在旅途中寻觅中葡文化的交汇</strong>
					</h5>
					<p class="text-muted text-sm">
						古老的街道、宁静的小巷、神圣的教堂、奢华的赌场、难忘的美食、热情的商铺，使得澳门成为别具一格的地方，吸引了千万游客，回收一别，澳门文化体验就此开始了
					</p>
					<p class="text-sm">
						<span class="pull-right text-orange"> <i class="glyphicon glyphicon-map-marker"></i> 葡萄牙 &nbsp;&nbsp;
						2015-01-15</span>
					</p>
				</div>
			</div>
			<div class="divider"></div>
			<div class="row">
				<div class="col-md-2">
					<div class="thumb-note">
						<img src="{{asset('img/note2.jpg')}}" alt="" class="full-width ">	
					</div>
					

				</div>
				<div class="col-md-10">
					<h5>
						<span class="pull-right text-sm text-muted">
							<i class="glyphicon glyphicon-eye-open text-main"></i> 2307 &nbsp; 
							<i class="glyphicon glyphicon-comment text-main"></i> 39 &nbsp;
							<i class="glyphicon glyphicon-thumbs-up text-main"></i>121
						</span>

						<strong>在旅途中寻觅中葡文化的交汇</strong>
					</h5>
					<p class="text-muted text-sm">
						古老的街道、宁静的小巷、神圣的教堂、奢华的赌场、难忘的美食、热情的商铺，使得澳门成为别具一格的地方，吸引了千万游客，回收一别，澳门文化体验就此开始了
					</p>
					<p class="text-sm">
						<span class="pull-right text-orange"> <i class="glyphicon glyphicon-map-marker"></i> 葡萄牙 &nbsp;&nbsp;
						2015-01-15</span>
					</p>
				</div>
			</div>
			
			



			<p>&nbsp;</p>
			<h4 class="space-head"> <a href="#" class="pull-right text-md"> 更多 </a> 我的点评</h4>
			
			<div class=" well-space  text-center text-muted">
				潜水中，还没有点评！@if($isme) 去逛逛，用你的旅行经验去<a href="#">帮助</a> 更多人吧！  @endif
			</div>
			<p>&nbsp;</p>
			<h4 class="space-head"> <a href="#" class="pull-right text-md"> 更多 </a> 我参加的活动</h4>
			
			<div class=" well-space  text-center text-muted">
				还没有参加活动！@if($isme) 去看看有没有喜欢的  <a href="#">活动</a> ！  @endif
			</div>
			<p>&nbsp;</p>
		</article>
	</div>
</div>

@endsection