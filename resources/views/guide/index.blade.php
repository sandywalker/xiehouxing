@extends('def')

@section('id','guide')
@section('content')

 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="img/slide8.jpg" alt="..." class="full-width">
                                <div class="carousel-caption">
                                    <h2>背上行囊去旅行</h2>
                                    <p>每个人都有一个梦想，去看尽世间的美景。</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="img/slide7.jpg" alt="..." class="full-width">
                                <div class="carousel-caption">
                                    <h2>阅尽千帆，才了解旅行</h2>
                                    <p>旅行有时候也是一种心情的释放，迫切的想要出去透透气。</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="img/slide6.jpg" alt="..." class="full-width">
                                <div class="carousel-caption">
                                    <h2>与海的亲密接触</h2>
                                    <p>旅行需要更随自己的心意、喜欢哪里就在哪里多呆一会。</p>
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="icon icon-arrow-left" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="icon icon-arrow-right" aria-hidden="true"></span>
                        </a>
                    </div>
                    <p>&nbsp;</p>

<section class="container guide-search">
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <form class="" role="search">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control input-lg"   placeholder="输入想去的地方...">
                                  <span class="input-group-btn">
                                    <button class="btn btn-lg btn-default btn-info" type="button" ><i class="glyphicon glyphicon-search"></i></button>
                                  </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">&nbsp;</div>
            </div>
        </section>


        <section class="container guide-list">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="guide-list-title">最热国内攻略</h2>
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
                    <h2 class="guide-list-title">最热国际攻略</h2>
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
            			            		<h4 ><a href="/guides/{{$guide->id}}" target="_blank"><strong class="text-main">{{$guide->title}}</strong></a> 	</h4>
            			            		<p class="text-muted">
            			            			{{$guide->description}}
            			            		</p>
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