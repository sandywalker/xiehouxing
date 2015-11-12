<?php

namespace App;

use App\Services\ImageService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Product extends Model
{
    protected $fillable = ['title','types','place','from_place','description','days',
    						'tags','member_size','price','original_price',
    						'highlights','content','traffic','hotel','qa'];


    public function saveThumbs($thumb,$banner)
    {
    	$root = Config::get('consts.product_root');
        $time = time();
        ImageService::savePic($root.'thumb/',$this,$thumb,'thumb',true,$time,600,338);
        ImageService::savePic($root.'banner/',$this,$banner,'banner',true,$time,1200,400);
    }
    
}
