@extends('def')

@section('id','guide')
@section('title','攻略')
@section('content')

@include('guide.slider')
<p>&nbsp;</p>

@include('guide.query')
        <section class="container guide-list">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="text-center ">
                        <small><a href="/guides" class="link-main pull-left">攻略首页</a></small>
                        <strong class="text-orange">
                            @if($types=='0') 
                             国内攻略
                            @elseif($types=='1')
                             国际攻略
                            @else
                             攻略集
                            @endif 
                        </strong>
                    </h3>
                    <div class="clearfix">&nbsp;</div>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-9">
            		            @foreach($guides as $guide)
            			            <div class="row best-guides">
            			            	<div class="col-md-3">
            			            		<div class="thumb-image">
            			            			<a href="/guides/{{$guide->id}}" target="_blank"><img src="{{asset($guide->thumb)}}" alt=""></a>
            			            		</div>
            			            	</div>
            			            	<div class="col-md-9">
            			            		<h4 >
                                                <span class="pull-right text-sm text-gray">
                                                    <i class="glyphicon glyphicon-map-marker"></i> <span class="text-orange">{{$guide->place}} </span>  &nbsp;&nbsp;
                                                </span>
                                                <a href="/guides/{{$guide->id}}" target="_blank" class="link-main"><strong>{{$guide->title}}</strong></a> 	
                                            </h4>
            			            		<p class="text-muted">
            			            			{{$guide->description}}
            			            		</p>
                                            <p class="text-sm">@include('wedgits.social-info',['entry'=>$guide])</p>
            			            	</div>
            			            </div>
            		            @endforeach
                                <p>&nbsp;</p>
                                {!!$guides->appends(['types'=>$types,'key'=>$key])->render()!!}
            	</div>
            	<div class="col-md-3">
            		@include('common.side-advert')
            		<p>&nbsp;</p>
            		<h4>热门评论</h4>
                    @foreach($comments as $comment)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object thumb-xs thumb-round" src="{{asset($comment->user->avatar)}}" alt="..."  >
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">
                            	<a class="pull-right username" href="#">
                            	<span class="text-orange text-sm">{{$comment->user->name}}</span>  </a>
                            	<a href="/guides/{{$comment->guide->id}}" target="_blank">{{$comment->guide->title}}</a>
                            </h5>
                            <p class="text-muted text-sm">{{$comment->content}}</p>
                        </div>
                    </div>
                    @endforeach
            	</div>
            </div>
            <p>&nbsp;</p>
           
        </section>    

@endsection