<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityComment extends Model
{

    protected $fillable = ['title', 'content','isbest','istop'];

    public function activity(){
		return $this->belongsTo('App\Activity');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
}
