@extends('def')

@section('id','activity')
@section('title',$seos['activity']->title)
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
                <h3>最热活动</h3>
            </div>
	    </div>
	    
	        
	            <div class="row ">
	            	<div class="col-md-9">
	            		@foreach($activities as $activity)
	            		<div class="row top-activities">
			            	<div class="col-md-5">
			            		<div class="thumb-image">
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
			            			<a href="/activities/{{$activity->id}}" target="_blank"><img src="{{$activity->thumb}}" alt=""></a>
			            		</div>
			            	</div>
			            	<div class="col-md-7">
			            		<h4 >
		                            <span class="pull-right text-gray">
		                                <i class="glyphicon glyphicon-map-marker"></i> <span class="text-main">{{$activity->place}} </span>  &nbsp;&nbsp;
		                            </span>
		                            <a href="/activities/{{$activity->id}}" target="_blank" class="link-black"><strong>{{$activity->title}}</strong></a> 	
		                        </h4>
			            		<p class="text-muted description">
			            			{{$activity->description}}
			            		</p>
		                        <p class="foot">
		                        	<span class="text-xl pull-right text-pink">{{$activity->price}} <span class="text-md">元</span></span>
		                        	<span class="text-sm">@include('wedgits.social-info',['entry'=>$activity])</span>	
		                        </p>
			            	</div>
		            	</div>
		            	@endforeach
	            	</div>
	            	<div class="col-md-3">
	            		<p class="text-center text-pink">关注我们的公众微信平台</p>
	            		<img src="{{asset('img/qrcode2.jpg')}}" alt="" class="fit">
	            	</div>
	            </div>
	    

	    <div class="row">
	       <div class="col-md-12 section-title">
                <h3>已完成活动</h3>
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