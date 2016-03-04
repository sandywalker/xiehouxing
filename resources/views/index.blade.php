@extends('def')
@section('id','home')
@section('title',$seos['index']->title)
@endsection
@section('content')
    		<section id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($banners as $idx => $banner)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$idx}}" @if($idx == 0) class="active" @endif ></li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach($banners as $idx => $banner)
                    <div class="item @if($idx == 0) active @endif">
                    <a href="{{$banner->link}}" target="{{$banner->target}}"><img src="{{asset($banner->path)}}" alt="..."></a></div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="icon icon-arrow-left" aria-hidden="true"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="icon icon-arrow-right" aria-hidden="true"></span>
                </a>
            </section>
            <br/>
            
            <section class="container">
                <div class="row">
                    <div class="col-md-12 section-title">
                        <h3><a href="/activities"><span class="more">更多...</span></a>超人气活动</h3>
                    </div>
                </div>
                <div class="row">
                    @foreach($activities as $activity)
                    <div class="col-md-6 col-xs-6">
                        <div class="home-activity-item ">
                            <div class="tag">
                                {{$activity->tags}}
                            </div>
                            <div class="calendar calendar-sm">
                                    <div class="calendar-head"></div>
                                    <div class="calendar-content">
                                        <?php $days = daysAfter($activity->start_date)?>
                                        @if($days > 0)
                                            <div class="calendar-label">还有</div>
                                            {{$days}}天    
                                        @else
                                            <div class="calendar-label">已开始</div>
                                        @endif                                    
                                    </div>
                            </div>
                            <a href="/activities/{{$activity->id}}" target="_blank">
                            <div class="thumb-cover hover-zoom-in">
                                <img src="{{asset($activity->thumb)}}" alt="">
                            </div>
                            </a>
                            <div class="thumb-info">
                            <h3>{{$activity->title}}</h3>
                            <p>{{fdateCN($activity->start_date)}}出发 / {{$activity->days}}天 / {{$activity->member_size}} 人</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </section>

            <div class="home-guides">
			<section class="container" >
                <div class="row">
                    <div class="col-md-12 section-title">
                        
                        <h3><a href="/guides"><span class="more">更多...</span></a> 热门攻略 </h3>

                    </div>
                </div>
                <div class="row home-best">

                    @foreach($guides as $guide)
                    <div class="col-md-4 col-xs-6">
                        <div class=" home-thumb-guide">
                            <div class="thumb-image">
                                <a href="/guides/{{$guide->id}}" target="_blank"><img src="{{asset($guide->thumb)}}" alt=""/></a>
                                <div class="thumb-mask"></div>
                                <div class="thumb-title">{{$guide->place}}</div>

                                @include('wedgits.social-info',['entry'=>$guide])
                            </div>
                            <div class="thumb-info ">
                                
                                <p>{{$guide->title}} </p>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </section>
            </div>

            

            <div class="home-advert">
                <section class="container">
                    <div class="row">
                        <div class="col-md-12 section-title">
                            
                            <h3> 用心推荐 </h3>

                        </div>
                    </div>
                    <div class="row">
                        @foreach($adverts as $advert)
                        <div class="col-md-6 advert-item">
                            <div class="advert-image">
                                <a href="{{$advert->link}}" target="{{$advert->target}}">
                                    <img src="{{asset($advert->path)}}" alt="" >
                                </a>
                            </div>
                            <p class="advert-title">{{$advert->title}}</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                </section>
            </div>
            
            <section class="container home-notes">
                <div class="row">
                    <div class="col-md-12 section-title">
                        
                        <h3><a href="/notes"><span class="more">更多...</span></a>精品游记</h3>
                </div>
                

                    {{-- <div class="col-md-3">
                            <div class="home-users">
                            <h5><span class="text-orange">人气排行</span></h5>

                            @foreach($users as $user)
                            <div class="media">
                                <a class="media-left" href="/u/{{$user->id}}" target="_blank">
                                    <img src="{{asset($user->avatar)}}" alt="...">
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$user->name}}</h5>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div> --}}

                    <div class="col-md-12">
                        <div class="row">
                              @foreach($topNotes as $tnote)
                                <div class="col-md-4  col-xs-6 ">
                                    <div class="travel-notes home-travel-notes">
                                        <div class="travel-notes-border"></div>
                                        <div class="avatar"> 
                                            <a href="/u/{{$tnote->user->id}}" target="blank"> <img src="{{asset($tnote->user->avatar)}}" alt=""></a>
                                        </div>
                                        <div class="thumb-cover">
                                            <a href="/notes/{{$tnote->id}}" target="_blank"><img src="{{asset($tnote->thumb)}}" alt=""></a>
                                        </div>
                                        <h5>{{$tnote->title}}</h5>
                                        <p class="summary"><span>{{$tnote->created_at}}</span> &nbsp;&nbsp; <span> {{$tnote->hits}} 次浏览</span></p>
                                        <p class="summary"> {{$tnote->place}}</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>


                    </div>


                
            </section>

@endsection