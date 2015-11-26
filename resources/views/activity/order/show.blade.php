@extends('def')
@section('content')

<div id="orders">

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p>&nbsp;</p>
			<h3>
				
				<strong>我的订单</strong>
			</h3>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p>&nbsp;</p>
			<p>
					 订单号：<span class="text-main">	{{$order->code}}</span> &nbsp;&nbsp;&nbsp; 订单状态：@include('activity.order.states',['states'=>$order->states])
				</p>
			<hr>	
		</div>
	</div>
	@include('activity.order.progress',['states'=>$order->states])
	<hr>
	@include('activity.order.activity-info')
	<p>&nbsp;</p>
	<div class="row">
		<div class="col-md-12">
			<h4>报名信息</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			@include('activity.order.member-info')
			@if($member->memo)
			<h5><strong>留言：</strong></h5>
			<p>
				{{$member->memo}}
			</p>
			@endif
		</div>
	</div>

	<p>&nbsp;</p>
	
	<div class="row">
		<div class="col-md-12">
			<h4 class="text-orange">活动费用</h4>
			@include('activity.order.amount')
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h4 class="text-orange">支付方式</h4>
			@if($order->pay_approach == 0)
				<p class="well">在线支付</p>
			@else
				<div class="well">
				<p><strong>离线支付</strong></p>
				<p class="text-muted">
					使用离线支付的订单，请关注 <a href="#" class="gongzhonghao" data-placement="vertical">邂逅行微信公众号</a> ，并把订单号 <span class="text-main">{{$order->code}} </span>	告诉公众号管理员。付款成功后，系统会将状态更新为已支付。
				</p>
				</div>
			@endif
		</div>
	</div>

	<hr>
	
	@if($order->states == 0&&$activity->states == 0)
	<div class="row">
		<div class="col-md-12">
			<a href="/activities/orders/{{$order->id}}/cancel" class="btn btn-default pull-right btn-remove" data-message="您确定要取消订单吗?" >取消订单</a>&nbsp;&nbsp;
		</div>
	</div>
	@endif
	<p>&nbsp;</p>
	<p>&nbsp;</p>

</div>
</div>


@endsection