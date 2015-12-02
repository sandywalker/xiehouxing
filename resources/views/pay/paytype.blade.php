@if($paytype=='weixin')
   <img src="/img/wepay-logo.png" alt="" style="width:20px; height:20px;"> 微信扫码支付
@elseif($paytype=='alipay')
	支付宝支付
@elseif($paytype=='unionpay')
	银联支付
@endif