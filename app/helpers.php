<?php

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