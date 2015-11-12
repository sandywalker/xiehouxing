<?php

namespace App\Services;

use Intervention\Image\Facades\Image;

class ImageService {


	/*	保存图像，并更新关联对象属性	
		$rootDir String 		根目录
		$object  Object 		model对象
		$file    File  			request上传的文件
		$property String 		$object的图像属性名
		$uniquename String 		唯一名称
		$width   Integer 	    图像宽度，－1 则不做任何操作
		$height   Integer 	    图像高度，－1 则不做任何操作
	*/
	public static function savePic($rootDir,$object,$file,$property,$new,$uniquename,$width,$height)
	{
    	if ($file!=null){
    		if (!empty($object->$property)&&file_exists($object->$property)&&!$new){
    			unlink($object->$property);
    		}
	    	$filename = $uniquename.'.'.$file->getClientOriginalExtension();
	        $file->move($rootDir,$filename);
	        if ($width>0&&$height>0){
	        	Image::make($rootDir.$filename)->fit($width,$height)->save();
	    	}
	        $object->$property = $rootDir.$filename;
    	}
	}
}


