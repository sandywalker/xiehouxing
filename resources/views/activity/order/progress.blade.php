	<div class="row order-progress">
		<div class="col-md-1 col-xs-2 step active"><div class="node">报名</div></div>
		<div class="col-md-3 col-xs-1 bar active"></div>
		<div class="col-md-1 col-xs-2 step active"><div class="node">下单</div></div>
		<div class="col-md-2 col-xs-2 bar  @if($states==0) active @endif"></div>
		<div class="col-md-1 col-xs-2 step @if($states==0) active @endif"><div class="node">支付</div></div>
		<div class="col-md-3 col-xs-1 bar  @if($states==1) active @endif"></div>
		<div class="col-md-1 col-xs-2 step  @if($states==1) active @endif"><div class="node">完成</div></div>
	</div>