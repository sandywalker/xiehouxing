<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class NoteComment extends Model
{
    protected $table = 'note_comments';

    protected $fillable = ['title', 'content','isbest','istop'];

    public function note(){
		return $this->belongsTo('App\Note');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function getCreatedAtAttribute($value){
		return  $value?Carbon::parse($value)->format('Y-m-d'):'';
	}
}
