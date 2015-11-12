<?php

namespace App;

use App\Product;
use App\Services\ImageService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Activity extends Model
{
    protected $fillable = ['title','types','place','from_place','description','days',
    						'tags','member_size','price','original_price','istop','start_date',
    						'highlights','content','traffic','hotel','qa','states'];

	protected $dates = ['start_date'];

    public static function fromProduct($productId,$startTime)
    {
    	$product = Product::findOrFail($productId);
    	
    	$activity = Activity::create($product->toArray());
    	$activity->start_date = Carbon::createFromFormat('Y-m-d', $startTime);
    	$activity->thumb = $product->thumb;
    	$activity->banner = $product->banner;
    	$activity->save();
    }

    public function saveThumbs($thumb,$banner)
    {
    	$root = Config::get('consts.activity_root');
        $time = time();
        ImageService::savePic($root.'thumb/',$this,$thumb,'thumb',true,$time,600,338);
        ImageService::savePic($root.'banner/',$this,$banner,'banner',true,$time,1200,400);
    }


}
