@if($states==0)
<span class="text-main"><i class="glyphicon glyphicon-tag"></i> 已报名</span>
@elseif($states==1)
<span class="text-main"> <i class="glyphicon glyphicon-credit-card"></i> 已下单</span>
@elseif($states==2)
<span class="text-success"> <i class="glyphicon glyphicon-ok"></i> 已支付 </span>
@endif