<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Guide;
use App\GuideComment;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\GuideCommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    //

    public function index()
    {
    	$guidesGN = Guide::where('types','=',0)->where('istop','=',1)->orderBy('orders','asc')->take(5)->get();
    	$guidesGJ = Guide::where('types','=',1)->where('istop','=',1)->orderBy('orders','asc')->take(5)->get();
    	$guides = Guide::where('isbest','=',1)->orderBy('id','desc')->take(20)->get();
    	$comments = GuideComment::where('isbest','=',1)->orderBy('id','desc')->with('guide','user')->take(5)->get();

    	return view('guide.index',compact('guidesGN','guidesGJ','guides','comments'));
    }

    public function show($id)
    {
       $guide = Guide::findOrFail($id);
       $guide->load('comments.user');
       return view('guide.show',compact('guide'));
    }

    public function storeComments(GuideCommentRequest $request,$id)
    {
    	$comment = new GuideComment;
    	$comment->user_id = Auth::user()->id;
    	$comment->content = $request->input('content');
    	$comment->guide_id = $id;
    	$comment->save();
    	return redirect('guides/'.$id.'#comments');
    }
}
