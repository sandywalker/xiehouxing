@extends('def')

@section('id','activity')
@section('content')
<div id="orders">

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3><strong>下订单</strong></h3>
			<hr>
					
		</div>
	</div>
	@include('activity.order.progress',['states'=>-1])
	<hr>
	@include('activity.order.activity-info');
	<p>&nbsp;</p>
	<div class="row">
		<div class="col-md-12">
			<h4 class="text-orange">报名信息</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			@include('activity.order.member-info')
			<h5><strong>留言：</strong></h5>
			<p>
				<textarea name="" id="mmemo" cols="30" rows="3" class="form-control">{{$member->memo}}</textarea>
			</p>
		</div>
	</div>

	<p>&nbsp;</p>
	
	<div class="row">
		<div class="col-md-12">
			<h4 class="text-orange">活动费用</h4>
			@include('activity.order.amount')
		</div>
	</div>
	<hr>

	<div class="row">
		<div class="col-md-4 col-md-offset-5">
			<a href="#" class="btn btn-warning btn-lg " onclick="alert('在线支付正在内测，近期推出，抱歉给您带来不便！');return false;">在线支付</a>&nbsp;&nbsp;
			<a href="#" class="btn btn-info btn-lg" id="btnOffline">离线支付</a>
		</div>
	</div>
	<p>&nbsp;</p>
	<div class="row">
		<div class="col-md-12">
			   <div class="well">
				   <p class="text-muted">
						注意：使用离线支付请联系 <a href="#" class="gongzhonghao" data-placement="vertical">邂逅行微信公众号</a> ，付款成功后，系统会将状态更新为已支付。
					</p>
				</div>
		</div>
	</div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>

	<div class="modal fade" id="confirmModal">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <form action="/activities/{{$activity->id}}/orders/create" method="POST">
	      	  <input name="_token" type="hidden" value="{{csrf_token()}}"> 
		      <input type="hidden" name="memberId" value="{{$member->id}}">
		      <input type="hidden" name="memo" id="memo">
		      <input type="hidden" name="discount" value="{{$discount}}">
		      <input type="hidden" name="pay_approach" value="1">
		      <input type="hidden" name="amount" value="{{$amount}}">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title"><strong>确认订单信息</strong></h4>
		      </div>
		      <div class="modal-body">
		        <h5><strong class="text-main">活动名称：{{$activity->title}}</strong></h5>
		        @include('activity.order.amount')
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		        <button type="submit" class="btn btn-primary btnSubmit" data-id="{{$activity->id}}" data-uid="{{$member->user->id}}">提交订单</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>

</div>
</div>


@endsection

@section('js')
	<script>
		(function(){
			$('#btnOffline').on('click',function(e){
				e.preventDefault();
				$('#memo').val($('#mmemo').val());
				$('#confirmModal').modal('show');
			});

			
		})();
	</script>

@endsection