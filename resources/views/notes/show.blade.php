@extends('def')

@section('id','space')
@section('title')
- {{$note->title}}
@endsection

@section('content')
@include('common.space-banner')
<div class="container space-main">
	<div class="row">
		@include('common.space-side')
		<article class="col-md-9">
			<h3>{{$note->title}}</h3>
			<p class="text-muted">
				<span class="pull-right text-muted">
									<i class="glyphicon glyphicon-eye-open text-main"></i> {{$note->hits}} &nbsp; 
									<i class="glyphicon glyphicon-comment text-main"></i> {{$note->cmts}} &nbsp;
									<i class="glyphicon glyphicon-thumbs-up text-main"></i> {{$note->likes}}
								</span>
				<span class="text-orange"> <i class="glyphicon glyphicon-map-marker"></i>  {{$note->place}}</span> {{$note->created_at}}  &nbsp;&nbsp;
			</p>
			<div class="divider"></div>
			<p>&nbsp;</p>
			{!! $note->content !!}
			<p>&nbsp;</p>
			@include('wedgits.share-bar')
			<p>&nbsp;</p>
			<div class="comments comments-note" id="comments">
                <h4 class="comment-head text-orange"> <span class="pull-right text-gray">{{$note->comments->count()}} 条</span> <i class="glyphicon glyphicon-comment"></i> 评论</h4>
                
                @foreach($note->comments as $comment)
                     <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object thumb-round" src="{{asset($comment->user->avatar)}}" alt="..."  >
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading text-muted"> 
                            <span class="pull-right text-gray">{{$comment->created_at}}</span> <strong>{{$comment->user->name}}</strong> </h5>
                            <p class="text-md text-gray">{{$comment->content}}</p>
                        </div>
                    </div>

                @endforeach
				@if (Auth::guest())
				    <div class="well well-sm">
				        <p class="text-center text-muted">您好，<a href="/auth/login">登录</a>后就可以留言啦！</p>
				    </div>
				@else

				    <form action="/notes/{{$note->id}}/comments" method="POST" id="commentForm">
				     <input type="hidden" name="_token" value="{{ csrf_token() }}">
				    <div class="row">
				        <div class="col-md-10">
				            <input type="text" name="content" id="commentContent" class="form-control" placeholder="立即参与评论...">
				        </div>
				        <div class="col-md-2">
				            <button type="submit" class="btn btn-block btn-info"> <i class="glyphicon glyphicon-pencil"></i> 评论</button>
				        </div>
				    </div>
				    </form>
				    <br>
				    @include('error')
				@endif
			</div>
			<p>&nbsp;</p>
		</article>

	</div>
</div>


@endsection

