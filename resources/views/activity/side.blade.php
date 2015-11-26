<h2 class="text-center text-orange"><span class="text-md">活动费用:</span> {{round($activity->price)}} <span class="text-md">元</span> <span class="text-md">活动人数：</span>{{$activity->member_size}}<span class="text-md">人</span> </h2>
<hr>


{{-- <p class="text-center">已有 {{$activity->member_count}} 人参加本次活动</p> --}}
<div id="memberInfo">
	
</div>	
@if ($activity->member_count>0)
<p class="side-title">已经报名的小伙伴</p>
@foreach($members as $mb)
<div class="member-avatar">
	<a href="/u/{{$mb->user->id}}" target="_blank"><img src="{{asset($mb->user->avatar)}}"  class="thumb-xs round" alt="" /></a>
	<p>{{$mb->name}}</p>
</div>
@endforeach
<div class="clearfix"></div>
@endif
<hr>
<p class="side-title">往期活动精彩照片 <span class="text-gray">({{$photos->count()}})</span> </p>
<div class="side-photos">
	<div class="row">
		@foreach($photos as $idx => $photo)
		<div class="col-md-3 @if ($idx>7) hide @endif ">
			<a href="{{asset($photo->photo)}}"><img src="{{asset($photo->thumb)}}" class="fit" alt=""></a>
		</div>
		@endforeach
	</div>
</div>
<div class="clearfix"></div>
<hr>
<p class="side-title">关注此活动的小伙伴</p>
@foreach($members as $member)
<div class="member-avatar">
	<img src="{{asset($member->user->avatar)}}"  class="thumb-xs round" alt="" />
	<p>{{$member->name}}</p>
</div>
@endforeach
<div class="clearfix"></div>
<hr>
<p class="side-title">其它精彩活动推荐</p>

<div id="carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @foreach($activities as $idx => $act)
    <li data-target="#carousel" data-slide-to="{{$idx}}" @if($idx==1) class="active" @endif ></li>
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    
    @foreach($activities as $idx => $act)
    <div class="item @if($idx==1) active @endif">
      <a href="/activities/{{$act->id}}" target="_blank"><img src="{{asset($act->thumb)}}" alt="..."></a>
      <div class="carousel-caption">
         {{$act->title}}
      </div>
    </div>
    @endforeach

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">上一个</span>
  </a>
  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">下一个</span>
  </a>
</div>
