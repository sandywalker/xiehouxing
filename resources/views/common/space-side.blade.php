@inject('usrv','App\Services\UserService')
<?php 
	$followings = $usrv->following($user); 
	$fans = $usrv->fans($user); 
	$isme = $user->isme();
	$followFlag = $usrv->followFlag($user);
?>

<aside class="col-md-3">
		<a href="/u/{{$user->id}}" target="_blank"><img src="{{asset($user->avatar)}}" class="avatar" alt=""></a>
		<p class="text-center  "> <span class="label label-warning">VIP</span> <strong>{{$user->name}} </strong> &nbsp;&nbsp;</p>
		<p class="text-center">等级：<strong class="text-red">Level {{$user->levels+1}}</strong> ｜ 现居： {{$user->address}}</p>
		<table class="table table-bordered table-social-stat">
			<tbody>
				<tr>
					<td><strong class="text-lg">{{$usrv->followingCount($user)}}</strong><br>关注</td>
					<td><strong class="text-lg">{{$usrv->fansCount($user)}}</strong><br>粉丝</td>
					<td><strong class="text-lg">{{$usrv->noteCount($user)}}</strong><br>游记</td>
				</tr>
			</tbody>
		</table>
		
		@if($followFlag!=null)
		<p>
			@if($followFlag=='follow')
				<a href="/social/{{Auth::user()->id}}/follow/{{$user->id}}" class="btn btn-sm btn-default btn-block"> 
					<span class="text-orange"><i class="glyphicon glyphicon-plus"></i> 加关注</span>
				</a>
			@else
				<a href="/social/{{Auth::user()->id}}/unfollow/{{$user->id}}" class="btn btn-sm btn-default btn-block"> 
				   <span class="text-main"><i class="glyphicon glyphicon-minus"></i> 取消关注</span> 
				</a>
			@endif
		</p>
		@endif
		
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