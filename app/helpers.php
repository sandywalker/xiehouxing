<?php


function flash($title = null,$message = null)
{
	$flash = app('App\Http\Flash');

	if (func_num_args() == 0)
	{
		return $flash;
	}

	return $flash->message($title,$message);
}

function fdate($date)
{
	return $date->format('Y-m-d');
}

function fdatetime($date)
{
	return $date->format('Y-m-d h:i:s');
}

function fdateCN($date)
{
	return $date->format('Y年m月d');
}

function daysAfter($date)
{
	$now = Carbon\Carbon::now();
	if ($date->lt($now)){
		return 0;
	}
	return $date->diffInDays($now);
}


function ubbReplace($str){ 
    $str = str_replace(">",'<；',$str); 
    $str = str_replace(">",'>；',$str); 
    $str = str_replace("\n",'>；br/>；',$str); 
    $str = preg_replace("[\[em_([0-9]*)\]]","<img src=\"/img/face/$1.gif\" />",$str); 
    return $str; 
} 


?>