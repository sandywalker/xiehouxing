<?php

namespace App;

use App\GuideFav;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Guide extends Model
{
    protected $fillable = ['title','types','area','description','content','tags','points','orders','isbest','istop'];

    private $root = 'img/guides/';

    public function comments(){
		return $this->hasMany('App\GuideComment');
	}

	public static function updateCommentCount($guide)
    {
		$guide->cmts = $guide->comments !=null ? $guide->comments->count(): 0;
		$guide->save();
	}

    public function updateFavs()
    {
        $this->favs = GuideFav::where('guide_id',$this->id)->count();
        $this->save();
    }

    public function updateLikes()
    {
        $this->likes = GuideLike::where('guide_id',$this->id)->count();
        $this->save();
    }

    public function incHits()
    {
        $this->hits +=1;
        $this->save();
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


    //获取用户收藏的攻略
    public static function userFavs($userId)
    {
        return DB::table('guides')
                    ->join('guide_favs','guides.id','=','guide_favs.guide_id')
                    ->select('guides.*')
                    ->where('guide_favs.user_id','=',$userId)->get();
    }

    public function getPlaceAttribute()
    {
        return $this->area;
    }

    public function banner()
    {
        return $this->banner_thumb ==null ? "img/banner-guide.jpg":$this->banner_thumb;
    }

        
}
