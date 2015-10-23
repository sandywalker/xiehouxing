<div class="row">
		<div class="col-md-12 space-menubar">
			<ul class="nav nav-pills ">
			   <li class="active"><a href="/u/{{$user->id}}"> <i class="glyphicon glyphicon-home"></i> 首页</a></li>
			   <li><a href="#">  游记</a></li>
			   <li><a href="#">  收藏</a></li>
			   <li><a href="#"> 活动</a></li>
			   @if($isme)
			   	<li><a href="/settings">  设置</a></li>
			   @endif
			</ul>
		</div>
	</div>
			