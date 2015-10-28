<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuideLike extends Model
{
    protected $table = 'guide_likes';


	public static function exists($userId,$guideId)
	{
		return GuideLike::where('user_id',$userId)->where('guide_id',$guideId)->count()>0;
	}
}
