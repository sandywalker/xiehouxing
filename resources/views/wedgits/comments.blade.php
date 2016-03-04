          <div class="comments">
                @foreach($comments as $comment)
                     <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object thumb-round avatar" src="{{asset($comment->user->avatar)}}" alt="..."  >
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading text-muted"> 
                            <span class="pull-right text-gray">{{fdate($comment->created_at)}}</span> {{$comment->user->name}}</h4>
                            <p class="text-md text-gray">{!!$comment->content!!}</p>
                        </div>
                    </div>

                @endforeach
                <p>&nbsp;</p>
                @if (Auth::guest())
                    <div class="well well-sm">
                        <div class="text-center text-muted">邂逅行的小伙伴您好，@include('auth/login-pop',['url'=>URL::current().'#join'])后就可以留言啦！</div>
                    </div>
                @else

                    <form action="{{$action}}" method="POST" id="commentForm">
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
            
