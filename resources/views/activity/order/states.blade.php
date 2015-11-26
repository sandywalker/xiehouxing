@if($states==0)
<span class="text-orange"><i class="glyphicon glyphicon-time"></i> 待支付</span>
@elseif($states==1)
<span class="text-success"> <i class="glyphicon glyphicon-credit-card"></i> 已支付</span>
@elseif($states==2)
<span class="text-danger"> <i class="glyphicon glyphicon-ok"></i> 支付失败 </span>
@endif