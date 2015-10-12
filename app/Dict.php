<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dict extends Model
{
    protected $table = 'dicts';

    protected $fillable = ['name', 'code'];

    public function items(){
		return $this->hasMany('App\DictItem');
	}

	public function scopeByName($query,$value){
		return $query->where('code','=',$value)->firstOrFail();
	}
}
