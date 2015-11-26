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

function fdateCN($date)
{
	return $date->format('Y年m月d');
}

function daysAfter($date)
{
	$now = Carbon\Carbon::now();
	return $date->diffInDays($now);
}


?>