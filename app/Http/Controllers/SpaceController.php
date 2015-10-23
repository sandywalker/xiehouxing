<?php

namespace App\Http\Controllers;

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
    	$notes = Note::where('creator',$id)->orderBy('id','desc')->take(5)->get();
        return view('space.index',array_merge(compact('notes'),$this->getViewModel($id)));
    }

    public function notes($id)
    {
    	$notes = Note::where('creator',$id)->orderBy('id','desc')->get();

        return view('space.notes',array_merge(compact('notes'),$this->getViewModel($id)));
    }

    public function getViewModel($id)
    {
    	$user = User::findOrFail($id);
    	$isme = Auth::check()&&Auth::user()->id == $id;
    	$noteCount = Note::where('creator',$id)->count();	
    	return  compact('user','isme','noteCount'); 
    }
  
}
