
@extends('def')

@section('title','在线支付')

@section('content')

<div class="container">
	<p>&nbsp;</p>
	@include('activity.order.activity-info')
	<hr>
	<div class="row">
		<div class="col-md-12">
			<h3>在线支付</h3>
			<div class="bg-silver online-pay-info">
				<div class="row ">
						<div class="col-md-9 ">&nbsp;&nbsp;订单编号：<span class="text-orange">{{$order->code}}</span>	 </div>
						<div class="col-md-3">&nbsp;&nbsp;应付金额：<span class="text-orange text-xl"> ¥ {{$order->amount}} </span></div>
				</div>
			</div>
			<p>&nbsp;</p>
			<input type="hidden" id="orderId" value="{{$order->id}}">
			<ul class="nav nav-tabs">
				  <li role="presentation" class="active"><a href="#">微信支付</a></li>
				  <li role="presentation"><a href="#">其它</a></li>
			</ul>
			<div class="pay-content">
				<p>&nbsp;</p>
				<h4>
					&nbsp;&nbsp;<img src="/img/wepay-logo.png" alt="" class="wepay-logo"> 微信扫码支付
				</h4>
				<div class="pay-qrcode">
	 				<img src="/wxpay/qrcode?orderId={{$order->id}}" alt="">		
	 				<img src="/img/wepay-info.png" alt="">			
	 			</div>
 			</div>
		</div>
	</div>
</div>



@endsection

@section('js')
	<script>
		(function(){
			var times = 0;
			var checkOrder = function(){
				var orderId = $('#orderId').val();
				$.ajax({
					url:'/wxpay/check',
					data:{orderId:orderId},
					success:function(order){
						if (order.states == 1){
							location.href = '/wxpay/success?orderId=' + orderId;
						}else if (order.states == 2){
							location.href = '/wxpay/failed?orderId=' + orderId;
						}
						if (order.paying==1&&order.states == 0&&times<300){
							window.setTimeout(checkOrder,2000);
						}
						times++;
					}
				});
			}
			window.setTimeout(checkOrder,2000);
		})();
	</script>

@endsection