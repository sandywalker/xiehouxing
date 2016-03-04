@extends('def')

@section('id','guide')
@section('title',$guide->title)
@section('content')

<div class="guide-banner">
            <img src="{{asset($guide->banner())}}" alt="..." class="full-width">
            <div class="guide-brief">
                <h1>{{str_limit($guide->title,30)}}</h1>
                <h4>{{$guide->description}}</h4>
            </div>
</div>
<p>&nbsp;</p>
<div class="container guide-main">
	<div class="row">
		<div class="col-md-1">&nbsp;</div>
		<div class="col-md-7">
			<article>
				<h3>
                    {{$guide->title}}
				</h3>
                <p class="social-actions">
                        <span class="text-pink">  浏览&nbsp; <span class="hits"> {{$guide->hits}}</span></span>&nbsp;&nbsp;
                        <a href="#" class="@if(Auth::check()) btn-fav @endif" 
                            data-target="guide" data-action="fav" data-id="{{$guide->id}}" >
                            @if($faved)
                                <i class="glyphicon glyphicon-star icon-fav"></i>
                            @else
                                <i class="glyphicon glyphicon-star-empty icon-fav"></i>
                            @endif   
                            收藏&nbsp;
                            <span class="favs">{{$guide->favs}}</span>
                        </a> 
                        &nbsp;&nbsp;
                        <a href="#" class="@if(Auth::check()) btn-like @endif" 
                            data-target="guide" data-action="like" data-id="{{$guide->id}}">
                            @if($liked)
                                <i class="glyphicon glyphicon-heart icon-like"></i>
                            @else
                                <i class="glyphicon glyphicon-heart-empty icon-like"></i>
                            @endif   
                            赞&nbsp;
                            <span class="likes">{{$guide->likes}}</span> 
                        </a>
                </p>
				{!! $guide->content !!}

			</article>
            @include('wedgits.share-bar')
            <div class="comments" id="comments">
                <h3 class="comment-head text-pink"> <span class="pull-right text-gray">{{$guide->comments->count()}} 条</span> <i class="glyphicon glyphicon-comment"></i> 邂逅评论</h3>
                
                @foreach($guide->comments as $comment)
                     <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object thumb-round" src="{{asset($comment->user->avatar)}}" alt="..."  >
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading text-muted"> 
                            <span class="pull-right text-gray">{{$comment->created_at}}</span> {{$comment->user->name}}</h4>
                            <p class="text-md text-gray">{!!$comment->content!!}</p>
                        </div>
                    </div>

                @endforeach
                <p>&nbsp;</p>
                @if (Auth::guest())
                    <div class="well well-sm">
                        <p class="text-center text-muted">您好，<a href="/auth/login">登录</a>后就可以留言啦！</p>
                    </div>
                @else

                    <form action="/guides/{{$guide->id}}/comments" method="POST" id="commentForm">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="content" id="commentContent" class="form-control" placeholder="立即参与评论...">
                             <p class="emotion-line"><span class="emotion">添加表情</span></p> 
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-block btn-info"> <i class="glyphicon glyphicon-pencil"></i> 评论</button>
                        </div>
                    </div>
                    </form>
                    @include('error')
                @endif
                <p>&nbsp;</p>
            </div>
			
		</div>
		<div class="col-md-3">
                    @include('common.side-advert')
                    <p>&nbsp;</p>
					<h4>游记推荐</h4>
                    @foreach($topNotes as $note)
                    <div class="media">
                        <div class="media-left">
                            <a href="/notes/{{$note->id}}" target="_blank">
                                <img class="media-object " src="{{asset($note->thumb)}}" alt="..."  >
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading"><a class="pull-right username" href="/u/{{$note->user->id}}" target="_blank">{{$note->user->name}}</a>
                            <a href="/notes/{{$note->id}}" target="_blank" class="link-orange">{{str_limit($note->title,18)}}</a>   </h5>
                            <p>{{str_limit($note->description,50)}}</p>
                        </div>
                    </div>
                    @endforeach
                    
                    <hr/>
                    <div class="text-center">
                        <p>关注我们的公众微信平台</p>
                        
                            <img src="/img/qrcode.jpg" alt="" class="fit" />
                        
                    </div>
		</div>
		<div class="col-md-1">
			
		</div>
	</div>

</div>

@endsection

@section('js')
    <script>
        (function(){
            $('#commentForm').on('submit',function(e){
                var content = $('#commentContent').val();
                if (!content||content.length<6){
                    alert('对不起，评论内容至少超过6个字符才可以发表!');
                    return false;
                }
                return true;
            });
        })();
    </script>

@endsection