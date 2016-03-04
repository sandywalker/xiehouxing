<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeoInfo extends Model
{
    protected $fillable = ['title','tag','description','keywords'];

    public static function  seoMap()
    {
    	$seos = SeoInfo::all();
    	$map = [];
    	foreach($seos as $seo)
    	{
    		$map[$seo->tag] = $seo;
    	}	
    	return $map;
    }
}
