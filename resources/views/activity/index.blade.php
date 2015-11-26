@extends('def')

@section('id','activity')
@section('title','活动报名')
@section('css')
	<style>
		#activity{
			background: #fff;
		}
	</style>
@endsection
@section('content')
	<div class="activity-banner">
		<img src="/img/banner-activity.jpg" alt="">
	</div>
	<p>&nbsp;</p>

	<section class="container">
	    <div class="row">
	        <div class="col-md-12 section-title">
                <h3 class="note-list-title">最热活动</h3>
            </div>
	    </div>
	    <div class="row">
	        @foreach($activities as $activity)
	        <div class="col-md-3 col-sm-6 col-xs-6">
	            <div class="home-activity-item home-activity-small">
	                <div class="tag">
	                    {{$activity->tags}}
	                </div>
	                <div class="calendar calendar-xs">
	                        <div class="calendar-head"></div>
	                        <div class="calendar-content">
	                            <div class="calendar-label">还有</div>
	                            {{daysAfter($activity->start_date)}}天                                        
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

	    <div class="row">
	       <div class="col-md-12 section-title">
                <h3 class="note-list-title">已完成活动</h3>
            </div>
	    </div>

	    <div class="row">
            	<div class="col-md-9">
            					@if($old_activities->count()>0)
	            		            @foreach($old_activities as $activity)
	            			            <div class="row old-activities">
	            			            	<div class="col-md-3">
	            			            		<div class="thumb-image">
	            			            			<a href="/activities/{{$activity->id}}" target="_blank"><img src="{{$activity->thumb}}" alt=""></a>
	            			            		</div>
	            			            	</div>
	            			            	<div class="col-md-9">
	            			            		<h4 >
	                                                <span class="pull-right text-sm text-gray">
	                                                    <i class="glyphicon glyphicon-map-marker"></i> <span class="text-orange">{{$activity->place}} </span>  &nbsp;&nbsp;
	                                                </span>
	                                                <a href="/activities/{{$activity->id}}" target="_blank" class="link-orange"><strong>{{$activity->title}}</strong></a> 	
	                                            </h4>
	            			            		<p class="text-muted">
	            			            			{{$activity->description}}
	            			            		</p>
	                                            <p class="text-sm">@include('wedgits.social-info',['entry'=>$activity])</p>
	            			            	</div>
	            			            </div>
	            		            @endforeach
            		            @else
									<div class="well-empty  text-center text-muted">
										<p>还没有已完成的活动！</p>
									</div>
            		            @endif
            	</div>
            	<div class="col-md-3">
            		@include('common.side-advert')
            		<p>&nbsp;</p>
            		<h4>热门评论</h4>
                    
            	</div>



	    <p>&nbsp;</p>
	    <p>&nbsp;</p>

	</section>
@endsection