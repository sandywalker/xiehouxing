<?php

namespace App\Http\Controllers;

use App\Activity;
use App\ActivityComment;
use App\ActivityMember;
use App\ActivityOrder;
use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\JoinActivityRequest;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    //

    public function index()
    {
        $activities = Activity::where('istop',1)->where('states',0)->orderBy('order_number')->take(4)->get();
        $old_activities = Activity::where('states',2)->orderBy('start_date','desc')->get();
        $adverts = Banner::where('tag','indexAdvert')->take(2)->get();
        return view('activity.index',compact('activities','old_activities','adverts'));
    }

    public function show($id)
    {
    	
        $activity = Activity::findOrFail($id);
        $activity->load('members.user');
        $activity->load('comments.user');
    	$user = [];
        $joined = false;
        $member = null;
    	if (Auth::check()){
    		$user = User::findOrFail(Auth::user()->id);
            $joined = ActivityMember::isJoined($id,$user->id);
            $member = ActivityMember::where('activity_id',$id)->where('user_id',$user->id)->first();
            if ($member!=null){
                $member->load('activity');
            }
    	}	
    	$photos = Product::findOrFail($activity->product_id)->photos;

    	$members = $activity->members;

        $activities = Activity::where('istop',1)->orderBy('order_number')->take(5)->get();
        $activities = $activities->filter(function($item) use ($activity){
            return $item->id != $activity->id;
        });

        $models = compact('activity','members','photos','joined','activities');

        if (Auth::check()){
            $models['user'] = $user;
            $models['member'] = $member;   
        }


    	return view('activity.show',$models);
    }


    public function join($id,JoinActivityRequest $request)
    {
        $activity = Activity::findOrFail($id);
    	$member = new ActivityMember;
    	$member = $member->create($request->all());
        $activity->updateMember($activity->member_count + $member->count);
        flash()->success('报名成功','您已成功报名活动！');
        return redirect('/activities/'.$id.'#join');
    }

    public function cancel($id,$memberId,Request $request)
    {
        $member = ActivityMember::findOrFail($memberId);
        ActivityMember::cancel($member);
        return redirect('/activities/'.$id.'#join');   
    }

    public function createOrder($id,Request $request)
    {
        $activity = Activity::findOrFail($id);
        $memberId = $request->input('memberId');
        $member = ActivityMember::findOrFail($memberId);
        if (ActivityOrder::exists($id,$member->user->id))
        {
            return redirect('/activities/'.$aid);
        }
        $discount = 95;
        $amount = $activity->price * $member->count * $discount / 100;
        return view('activity.order.create',compact('activity','member','discount','amount'));
    }

    public function storeOrder($id,Request $request)
    {
        $activity = Activity::findOrFail($id);
        $memberId = $request->input('memberId');
        $member = ActivityMember::findOrFail($memberId);

        $order = ActivityOrder::newOrder($activity,$member,$request);
        if ($order->pay_approach == 1){
            $member->states = 1;
            $member->save();
            flash()->success('下单成功','您已成功创建订单,邂逅行将会为您提供最优质的服务！');
            return redirect('/activities/orders/'.$order->id);      
        }else{
            return redirect('/wxpay/weixin?orderId='.$order->id);
        }
        
    }

    public function showOrder($id,Request $request)
    {

        $order = ActivityOrder::findOrFail($id);
        $activity = Activity::findOrFail($order->activity_id);
        $member = ActivityMember::findOrFail($order->member_id);
        $discount = $order->discount;
        $amount = $order->amount;
        return view('activity.order.show',compact('order','activity','member','discount','amount'));
    }

    public function cancelOrder($id,Request $request)
    {
        $order = ActivityOrder::findOrFail($id);
        $aid = $order->activity_id;
        $order->cancel();
        return redirect('/activities/'.$aid);
    }

     public function storeComments(CommentRequest $request,$id)
    {
        $activity = Activity::findOrFail($id);
        $comment = new ActivityComment;
        $comment->user_id = Auth::user()->id;
        $comment->content = ubbReplace($request->input('content'));
        $comment->activity_id = $id;
        $comment->save();
        return redirect('/activities/'.$id.'#comments');
    }

    
}

