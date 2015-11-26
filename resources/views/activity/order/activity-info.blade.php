	<div class="row">
		<div class="col-md-12">
			<h4 class="text-orange">活动信息</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<img src="{{asset($activity->thumb)}}" class="fit" alt="">						
		</div>
		<div class="col-md-10">
			<h5><a href="/activities/{{$activity->id}}" target="_blank" class="link-main"><strong>{{$activity->title}}</strong> </a></h5>
			<p class="text-muted">{{$activity->description}}</p>
			<p>活动人数：{{$activity->member_size}}  &nbsp;&nbsp;&nbsp;出发日期：{{fdateCN($activity->start_date)}}</p>					
		</div>
	</div>