<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $fillable = ['title','place','description','content','tags'];

	private $root = 'img/notes/';

    public function getCreatedAtAttribute($value){
		return  $value?Carbon::parse($value)->format('Y-m-d'):'';
	}

	public function getThumbAttribute($value){
		return $value==null?'img/no-thumb.jpg':$value;
	}

	public function saveThumb($thumb)
    {
    	$root = $this->root;
    	$time = time();
    	if ($thumb!=null){
    		if (!empty($this->thumb)&&file_exists($this->thumb)){
    			unlink($this->thumb);
    		}
	    	$thumbname = $time.'.'.$thumb->getClientOriginalExtension();
	        $thumb->move($root,$thumbname);
	        $this->thumb = $root.$thumbname;
    	}
        $this->save();
    }

    public function updateDescription(){
    	if ($this->content==null){
    		return;
    	}
    	$this->description =   str_limit(strip_tags($this->content),200); 
    }
}
