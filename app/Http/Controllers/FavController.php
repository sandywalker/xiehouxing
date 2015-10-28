<?php

namespace App\Http\Controllers;

use App\Guide;
use App\GuideFav;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class FavController extends Controller
{
    
    public function favGuide($id){
    	$userId = Auth::user()->id;
    	if (!GuideFav::exists($userId,$id)){
    		$guide = Guide::findOrFail($id);
	    	$guideFav = new GuideFav;
	    	$guideFav->guide_id = $id;
	    	$guideFav->user_id = $userId;
	    	$guideFav->save();
	    	$guide->updateFavs();
	    	return $guide->favs;
    	}
    	return -1;
    }

    public function unFavGuide($id){
    	$guideFav = GuideFav::where('user_id',Auth::user()->id)->where('guide_id',$id)->first();
    	if ($guideFav!=null){
            $guide = Guide::findOrFail($id);
    		$guideFav->delete();
    		$guide->updateFavs();
    	}
    	return redirect(URL::previous());
    }
}
