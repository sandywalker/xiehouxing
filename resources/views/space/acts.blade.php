@extends('def')

@section('id','space')
@section('title')
 {{ $user->name}}的空间
@endsection
@section('content')
@include('common.space-banner')
<div class="container space-main">
	@include('common.space-menu',['menu'=>'acts'])
	<div class="row">
		@include('common.space-side')
		<article class="col-md-9">
			<p>&nbsp;</p>
			<h4>正在参加的活动</h4>
			@if($members->count()>0)
				@foreach($members as $member)
					@include('activity.member-table',['atitle'=>true])	
				@endforeach
			@else
				<div class=" well-space  text-center text-muted">
				还没有参加活动！@if($user->isme()) 去看看有没有喜欢的  <a href="/activities" target="_blank">活动</a> ！  @endif
				</div>
			@endif
			<p>&nbsp;</p>
			<hr>
			<h4>以前参加的活动</h4>
			@foreach($old_members as $member)
				@include('activity.member-table',['atitle'=>true])
			@endforeach

		</article>
	</div>
</div>

@endsection