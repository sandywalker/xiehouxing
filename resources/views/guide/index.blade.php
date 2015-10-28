@extends('def')

@section('id','guide')
@section('title','攻略')
@section('content')

@include('guide.slider')
<p>&nbsp;</p>

@include('guide.query')


        <section class="container guide-list">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="guide-list-title"><a href="/guides/list?types=0">最热国内攻略</a></h2>
                </div>
            </div>
            <div class="row">
            	@foreach($guidesGN as $index => $gn)
					@if($index == 0)
					<div class="col-md-8 col-thumb">
					@else
					<div class="col-md-4 col-thumb">
					@endif	
						<div class="thumb-md thumb-xlg">
	                        <a href=  "/guides/{{$gn->id}}" target="_blank">
	                            <div class="thumb-image">
	                                <img src="{{$gn->thumb}}" alt="" />
	                                <div class="thumb-title">{{$gn->area}}</div>
	                                <div class="thumb-description">
	                                    <div class="middle">
	                                        <h3>{{$gn->title}}</h3>
	                                        <p>{{$gn->description}}</p>
	                                    </div>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                </div>

            	@endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center"><a href="/guides/list?types=0" class="link-main">更多攻略...</a></p>
                </div>
            </div>
        </section>

    <br/>
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12 adv">
                <a href="#"><img src="img/adv-banner1.jpg" alt="" class="adv"/></a>
            </div>
        </div>
    </div>
    <br/>
        <section class="container guide-list">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="guide-list-title"><a href="/guides/list?types=1">最热国际攻略</a></h2>
                </div>
            </div>
            <div class="row">
            	@foreach($guidesGJ as $index => $gj)
					@if($index == 0)
					<div class="col-md-8 col-thumb">
					@else
					<div class="col-md-4 col-thumb">
					@endif	
						<div class="thumb-md thumb-xlg">
	                        <a href=  "/guides/{{$gj->id}}" target="_blank">
	                            <div class="thumb-image">
	                                <img src="{{$gj->thumb}}" alt="" />
	                                <div class="thumb-title">{{$gj->area}}</div>
	                                <div class="thumb-description">
	                                    <div class="middle">
	                                        <h3>{{$gj->title}}</h3>
	                                        <p>{{$gj->description}}</p>
	                                    </div>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                </div>

            	@endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center"><a href="/guides/list?types=1" class="link-main">更多攻略...</a></p>
                </div>
            </div>
        </section>

        <section class="container guide-list">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="guide-list-title">精品攻略</h2>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-9">
            		            @foreach($guides as $guide)
            			            <div class="row best-guides">
            			            	<div class="col-md-3">
            			            		<div class="thumb-image">
            			            			<a href="/guides/{{$guide->id}}" target="_blank"><img src="{{$guide->thumb}}" alt=""></a>
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