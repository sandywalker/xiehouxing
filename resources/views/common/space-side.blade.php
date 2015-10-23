<aside class="col-md-3">
		<img src="{{asset($user->avatar)}}" class="avatar" alt="">
		<p class="text-center  "> <span class="label label-warning">VIP</span> <strong>{{$user->name}} </strong> &nbsp;&nbsp;</p>
		<p class="text-center">等级：<strong class="text-red">Level {{$user->levels+1}}</strong> ｜ 现居： {{$user->address}}</p>
		<table class="table table-bordered table-social-stat">
			<tbody>
				<tr>
					<td><strong class="text-lg">{{count($followings)}}</strong><br>关注</td>
					<td><strong class="text-lg">{{count($fans)}}</strong><br>粉丝</td>
					<td><strong class="text-lg">{{$noteCount}}</strong><br>游记</td>
				</tr>
			</tbody>
		</table>
		
		<h5><strong>我关注的</strong></h5>
		@if(count($followings)>0)
		<ul class="list-group">
		  @foreach($followings as $following)
		  <li class="list-group-item">
		  	 <img src="{{asset(App\User::avatar($following))}}" alt="" class="thumb-xxs">
		  	{{$following->name}}</li>
		  @endforeach
		</ul>
		@else
		<div class="well text-center text-muted">
			我是高冷派，还没有关注任何人！
		</div>
		@endif
		<h5><strong>我的粉丝</strong></h5>
		@if(count($fans)>0)
		<ul class="list-group">
		  @foreach($fans as $fan)
		  <li class="list-group-item">
		  	 <img src="{{asset(App\User::avatar($fan))}}" alt="" class="thumb-xxs">
		  	{{$fan->name}}</li>
		  @endforeach
		</ul>
		@else
		<div class="well text-center text-muted">
			呜呜，还没有粉丝！
		</div>
		@endif
</aside>