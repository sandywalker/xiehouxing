<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GuideComment extends Model
{
    protected $table = 'guide_comments';

    protected $fillable = ['title', 'content','isbest','istop'];

    public function guide(){
		return $this->belongsTo('App\Guide');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function getCreatedAtAttribute($value){
		return  $value?Carbon::parse($value)->format('Y-m-d'):'';
	}
}
