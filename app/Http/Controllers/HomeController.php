<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Banner;
use App\Guide;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Note;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$activities = Activity::where('istop',1)->where('states',0)->orderBy('order_number')->get();
    	$guides = Guide::where('isbest','=',1)->orderBy('orders')->take(6)->get();
    	$topNotes = Note::topNotes()->with('user')->take(6)->get();
    	//$users = User::topUsers()->take(10)->get();
    	$adverts = Banner::where('tag','indexAdvert')->take(2)->get();
    	return view('index',compact('activities','guides','topNotes','adverts'));
    }


}
