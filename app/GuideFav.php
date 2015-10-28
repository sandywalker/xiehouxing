<?php

namespace App;

use App\GuideFav;
use Illuminate\Database\Eloquent\Model;

class GuideFav extends Model
{
	protected $table = 'guide_favs';

    public function guide(){
		return $this->belongsTo('App\Guide');
	}


	public function user(){
		return $this->belongsTo('App\User');
	}


	public static function exists($userId,$guideId)
	{
		return GuideFav::where('user_id',$userId)->where('guide_id',$guideId)->count()>0;
	}
}

