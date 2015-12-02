<?php
namespace App\WxPay;
/**
 * 
 * 微信支付API异常类
 * @author widyhu
 *
 */
class WxException extends \Exception {
	public function errorMessage()
	{
		return $this->getMessage();
	}
}
