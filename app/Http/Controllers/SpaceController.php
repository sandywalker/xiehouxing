<?php

namespace App\Http\Controllers;

use App\Guide;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Note;
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
    	$notes = Note::where('creator',$id)->orderBy('id','desc')->take(5)->get();
        return view('space.index',compact('notes','user'));
    }

    public function notes($id)
    {
    	$notes = Note::where('creator',$id)->orderBy('id','desc')->get();
        $user = User::findOrFail($id);
        return view('space.notes',compact('notes','user'));
    }

    public function favs($id)
    {
        $user = User::findOrFail($id);
        $guides = Guide::userFavs($id);
        return view('space.favs',compact('guides','user'));
    }

    public function getViewModel($id)
    {
    	
    	
    	
    	//$fans =  $user->topFans(5);
        //$followings = $user->topFollowing(5);
    	return  compact('user','isme','noteCount','fans','followings'); 
    }
  
}
