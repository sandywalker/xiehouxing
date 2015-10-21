<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Guide extends Model
{
    protected $fillable = ['title','types','area','description','content','tags','points','orders','isbest','istop'];

    private $root = 'img/guides/';

    public function comments(){
		return $this->hasMany('App\GuideComment');
	}

	public static function updateCommentCount($guide){
		$guide->cmts = $guide->comments !=null ? $guide->comments->count(): 0;
		$guide->save();
	}


    public function saveThumbs($thumb,$bannerThumb)
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
    	if ($bannerThumb!=null){
    		if (!empty($this->banner_thumb)&&file_exists($this->banner_thumb)){
    			unlink($this->banner_thumb);
    		}
	        $bannername = $time.'-b.'.$bannerThumb->getClientOriginalExtension();
	        $bannerThumb->move($root,$bannername);
	        $this->banner_thumb = $root.$bannername;
        }

        $this->save();
    }

        
}
