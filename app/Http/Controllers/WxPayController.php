<?php

namespace App\Http\Controllers;

use App\ActivityOrder;
use App\Events\WxPayEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Jobs\UpdateActivityWxPayJob;
use App\Services\WxPayNotifyCallBack;
use App\WxPay\CLogFileHandler;
use App\WxPay\NativePay;
use App\WxPay\PayConfig;
use App\WxPay\UnifiedOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class WxPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function weixin(Request $request)
    {
        $order = ActivityOrder::findOrfail($request->input('orderId'));
        $activity = $order->activity;
        return view('pay.weixin',compact('order','activity'));
    }

    

    public function qrcode(Request $request)
    {
        $order = ActivityOrder::findOrfail($request->input('orderId'));
        $result = $this->initPayOrder($order);
        if ($this->isResultOK($result)){
            $order->paying = 1;
            $order->save();
            $url = $result["code_url"];
            return QrCode::format('png')->size(200)->generate($url);
        }else{
            return readfile('img/qrcode-failed.png');
        }
    }

    public function failed(Request $request)
    {
        flash()->error('付款失败','抱歉，您本次的付款失败！');
        return redirect('/activities/orders/'.$request->input('orderId'));
    }

    public function success(Request $request)
    {
        flash()->success('付款成功','您已成功完成付款！');
        return redirect('/activities/orders/'.$request->input('orderId'));
    }

    public function check(Request $request)
    {
        $id = $request->input('orderId');
        $order = ActivityOrder::findOrfail($id);
        return $order;
    }


    public function notify(Request $request)
    {
        Log::debug('notified success');
        $notify = new WxPayNotifyCallBack();
        $notify->Handle(false);
    }

    private function initPayOrder($order)
    {
        $native = new NativePay();
        $input = new UnifiedOrder();
        $input->SetBody("邂逅行-".$order->activity->title);
        $input->SetDetail($order->activity->description);
        $input->SetAttach("邂逅行");
        $input->SetOut_trade_no($order->code);
        $input->SetTotal_fee($order->amount*100);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetNotify_url( Config::get('consts.wepay_notify'));
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id($order->id);
        $result = $native->GetPayUrl($input);
        Log::debug($result);
        return $result;
    }

    private function isResultOK($result)
    {
        return $result['return_code']=='SUCCESS'&&$result['result_code']=='SUCCESS';   
    }


    
}
