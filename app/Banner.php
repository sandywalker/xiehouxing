<?php

namespace App;

use App\Services\ImageService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Banner extends Model
{
    protected $fillable = ['title','description','tag','path','link','target','orders'];


    public static function saveImage($banner,$file){
    	$root = Config::get('consts.banner_root');
        $uname = time();
        ImageService::savePic($root,$banner,$file,'path',false,$uname,0,0);
        list($width, $height) = getimagesize($banner->path);
        $banner->width = $width;
        $banner->height = $height;
        $banner->save();
    }
}
