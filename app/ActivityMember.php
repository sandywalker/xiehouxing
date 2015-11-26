<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActivityMember extends Model
{
	protected $fillable = ['name','phone_number','sex','girls','boys','memo','companion','activity_id','user_id'];

    public function setBoysAttribute($value)
    {
    	$this->attributes['boys'] = $value;
        $this->count = $value + $this->girls +1;
    }
    public function setGirlsAttribute($value)
    {
        $this->attributes['girls'] = $value;
        $this->count = $value + $this->boys +1;
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }

    public function order()
    {
        return $this->hasOne('App\ActivityOrder','member_id','id');
    }

    public static function findByUser($userId,$astate)
    {
        return  ActivityMember::with('activity')->where('user_id',$userId)->whereHas('activity',function($query) use($astate){
            $query->where('states',$astate);
        })->get();
        
    }

    
    
   
    public static function isJoined($activityId,$userId)
    {
        return DB::table('activity_members')->where('activity_id',$activityId)->where('user_id',$userId)->count()>0;
    }

    public static function cancel($member)
    {
        $activity = Activity::findOrFail($member->activity_id);
        $activity->updateMember($activity->member_count - $member->count);
        $member->delete();
    }
}
