<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['names', 'names_en','sort','pid','levels'];

    public function children(){
		return $this->hasMany('App\Area', 'pid', 'id');
	}
}
