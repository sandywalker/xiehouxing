
<div class="row">
		<div class="col-md-12 space-menubar">
			<ul class="nav nav-pills ">
			   <li  @if($menu=='home') class="active" @endif><a href="/u/{{$user->id}}"> <i class="glyphicon glyphicon-home"></i> 首页</a></li>
			   <li @if($menu=='notes') class="active" @endif><a href="/u/{{$user->id}}/notes">  游记</a></li>
			   <li @if($menu=='favs') class="active" @endif><a href="/u/{{$user->id}}/favs">  收藏</a></li>
			   {{-- <li @if($menu=='follow') class="active" @endif><a href="#"> 关注</a></li> --}}
			   <li @if($menu=='product') class="active" @endif><a href="#"> 活动</a></li>

			   @if($user->isme())
			   		<li><a href="/settings">  设置</a></li>
			   @endif
			</ul>
		</div>
	</div>
			