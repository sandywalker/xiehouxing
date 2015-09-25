<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DictItem extends Model
{
    protected $table = 'dict_items';

    protected $fillable = ['name', 'value','orders'];

    public function dict(){
		return $this->belongsTo('App\Dict');
	}
}
