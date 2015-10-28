<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteLike extends Model
{
    protected $table = 'note_likes';


	public static function exists($userId,$noteId)
	{
		return NoteLike::where('user_id',$userId)->where('note_id',$noteId)->count()>0;
	}
}
