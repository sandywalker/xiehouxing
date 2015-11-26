<?php

namespace App;

use App\Services\ImageService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Note extends Model
{
	protected $fillable = ['title','place','description','content','tags'];


	public function user()
	{
		return $this->belongsTo('App\User','creator');
	}

	public function comments(){
		return $this->hasMany('App\NoteComment');
	}

	public function scopeTopNotes($query){
		return $query->where('istop',1)->where('states',1);
	}

    public function getCreatedAtAttribute($value){
		return  $value?Carbon::parse($value)->format('Y-m-d'):'';
	}

	public function getThumbAttribute($value){
		return $value==null?'img/no-thumb.jpg':$value;
	}


	public static function updateCommentCount($note){
		$note->cmts = $note->comments !=null ? $note->comments->count(): 0;
		$note->save();
	}

	public function updateLikes()
    {
        $this->likes = NoteLike::where('note_id',$this->id)->count();
        $this->save();
    }

	 public function incHits()
    {
        $this->hits +=1;
        $this->save();
    }

	public function saveThumb($thumb)
    {
    	$root = Config::get('consts.note_root');
        $time = time();
        ImageService::savePic($root.'thumb/',$this,$thumb,'thumb',false,$time,400,300);
    	
        $this->save();
    }

    public function updateDescription(){
    	if ($this->content==null){
    		return;
    	}
    	$this->description =   str_limit(strip_tags($this->content),200); 
    }
}
