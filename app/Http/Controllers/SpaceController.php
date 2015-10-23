<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home($id)
    {
    	$user = User::findOrFail($id);
    	$isme = Auth::check()&&Auth::user()->id == $id;
    	$fans =  array_slice(Auth::user()->fans(),0,5);
    	$followings = array_slice(Auth::user()->following(),0,5);

        return view('space.index',compact('user','isme','fans','followings'));
    }
  
}
