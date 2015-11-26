<?php

namespace App;

use App\Services\ImageService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ActivityPhoto extends Model
{
	protected $fillable = ['tag','title','description'];

    static function  createPhoto($activity,$photo)
    {
    	$activityPhoto = new ActivityPhoto;
    	$activityPhoto->product_id = $activity->product_id;
    	$activityPhoto->activity_id = $activity->id;

    	$root = Config::get('consts.activity_root').$activity->id.'/';
        $time = time().str_random(10);
        $thumbName = $root.$time.'_thumb.jpg';
        ImageService::savePic($root,$activityPhoto,$photo,'photo',false,$time,1200,900);
        ImageService::createThumb($activityPhoto->photo,$activityPhoto,'thumb',false,$thumbName,400,300);

        $activityPhoto->save();
    }

    function removePhoto(){
    	File::delete([
    			$this->thumb,
    			$this->photo,
    		]);
    }
}
