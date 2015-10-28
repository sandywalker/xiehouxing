@extends('def')

@section('id','space')
@section('title')
 {{ $user->name}}的空间
@endsection
@section('content')
@include('common.space-banner')
<div class="container space-main">
	@include('common.space-menu',['menu'=>'notes'])
	<div class="row">
		@include('common.space-side')
		<article class="col-md-9">
			<p>&nbsp;</p>
				@if ($notes->count()>0)
					@if($user->isme())
					<p><a href="/notes/create" class="btn btn-info">  <i class="glyphicon glyphicon-pencil"></i> 写游记</a></p>
					@endif
					@include('space.note-list')
				@else
					
					<div class=" well-space  text-center text-muted">
						还没有写游记！@if($user->isme()) 放松一下，写下第一篇  <a href="/notes/create">游记</a> 吧！  @endif
					</div>
				@endif
			<p>&nbsp;</p>
		</article>
	</div>
</div>

@endsection