<?php

namespace App\Http\Controllers;

use App\ActivityMember;
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
        $members = ActivityMember::findByUser($user->id,0);
        return view('space.index',compact('notes','user','members'));
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

    public function acts($id)
    {
        $user = User::findOrFail($id);
        $members = ActivityMember::findByUser($user->id,0);
        $members->merge(ActivityMember::findByUser($user->id,1));
        $old_members = ActivityMember::findByUser($user->id,2);
        return view('space.acts',compact('user','members','old_members'));
    }

    public function getViewModel($id)
    {
    	
    	
    	
    	//$fans =  $user->topFans(5);
        //$followings = $user->topFollowing(5);
    	return  compact('user','isme','noteCount','fans','followings'); 
    }
  
}
