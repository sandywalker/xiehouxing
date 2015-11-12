<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    //

    public function show($id)
    {
    	$activity = Activity::findOrFail($id);
    	$members = User::all();//TODO 需要获取报名的真实用户
    	return view('activity.show',compact('activity','members'));
    }
}
