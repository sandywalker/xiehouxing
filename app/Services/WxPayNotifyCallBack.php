<?php

namespace App\Services;

use App\ActivityMember;
use App\ActivityOrder;
use App\WxPay\Notify;
use App\WxPay\OrderQuery;
use App\WxPay\PayApi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class WxPayNotifyCallBack extends Notify
{
	private function updateOrder($result,$states)
	{
		$order = ActivityOrder::byCode($result['out_trade_no']);

		if ($order!=null)
		{
			$member = ActivityMember::findOrFail($order->member_id);
			$order->bank_code = $result['bank_type'];
			$order->pay_type = 'weixin';
			$order->states = $states;
			$order->paying = 0;
			$order->pay_code = $result['transaction_id'];
			$order->pay_time = Carbon::createFromFormat('YmdHis', $result['time_end']);
			$order->save();
			$member->states = 2;
			$member->save();
		}
	}

	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new OrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = PayApi::orderQuery($input);
		Log::debug('query:' . json_encode($result));

		if(array_key_exists('return_code', $result)
			&& array_key_exists('result_code', $result)
			&& $result['return_code'] == 'SUCCESS'
			&& $result['result_code'] == 'SUCCESS')
		{
			$this->updateOrder($result,1);
			return true;
		}
		$this->updateOrder($result,2);
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::debug('call back:' . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists('transaction_id', $data)){
			$msg = '输入参数不正确';
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data['transaction_id'])){
			$msg = '订单查询失败';
			return false;
		}
		//event(new )
		return true;
	}
}
