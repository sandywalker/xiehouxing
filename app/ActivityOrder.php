<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ActivityOrder extends Model
{

    protected $dates = ['created_at', 'updated_at', 'pay_time'];


    public static function newCode($activityId,$userId)
    {
    	return Carbon::now()->format('Ymdhis').$activityId.$userId;
    }

    public static function byCode($code)
    {
        return ActivityOrder::where('code',$code)->first();
    }


    public function activity(){
        return $this->belongsTo('App\Activity');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public static function newOrder($activity,$member,$request)
    {
    	$order = new ActivityOrder;
        $order->code = ActivityOrder::newCode($activity->id,$member->user->id);
        $order->activity_id = $activity->id;
        $order->user_id = $member->user->id;
        $order->member_id = $member->id;
        $order->contact_email = $member->user->email;
        $order->contact_name = $member->name;
        $order->phone_number = $member->phone_number;
        $order->memo = $request->input('memo');
        $order->discount = $request->input('discount');
        $order->pay_approach = $request->input('pay_approach');
        $order->member_count = $member->count;
        $order->amount = $request->input('amount');
        $id = $order->save();
        return $order;
    }

     public static function exists($userId,$activityId)
    {
    	return ActivityOrder::where('user_id',$userId)->where('activity_id',$activityId)->count()>0;
    }

    public function cancel()
    {
    	$member = ActivityMember::findOrFail($this->member_id);
    	$this->delete();
    	$member->states = 0;
    	$member->save();
    }

   
}
