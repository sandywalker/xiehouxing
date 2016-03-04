<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Guide;
use App\GuideComment;
use App\GuideFav;
use App\GuideLike;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Note;
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

    public function lists(Request $request)
    {
        $types = $request->input('types');
        $key = $request->input('key');
        $query = Guide::select();
        if ($types!=null)
        {
            $query->where('types',$types);
        }
        if ($key !=null)
        {
            $query->where('title','like','%'.$key.'%')->orWhere('area','like','%'.$key.'%')->orWhere('tags','like','%'.$key.'%');
        }

        $guides = $query->orderBy('id','desc')->paginate(5);
        $comments = GuideComment::where('isbest','=',1)->orderBy('id','desc')->with('guide','user')->take(5)->get();

        return view('guide.list',compact('guides','comments','types','key'));
    }

    public function show($id)
    {
       $guide = Guide::findOrFail($id);
       $topNotes = Note::topNotes()->with('user')->take(6)->get();
       $guide->load('comments.user');
       $guide->incHits();
       $faved =  Auth::check()&&GuideFav::exists(Auth::user()->id,$guide->id);
       $liked =  Auth::check()&&GuideLike::exists(Auth::user()->id,$guide->id);
       return view('guide.show',compact('guide','faved','liked','topNotes'));
    }

    public function storeComments(CommentRequest $request,$id)
    {
        $guide = Guide::findOrFail($id);
    	$comment = new GuideComment;
    	$comment->user_id = Auth::user()->id;
    	$comment->content = ubbReplace($request->input('content'));
    	$comment->guide_id = $id;
    	$comment->save();
        Guide::updateCommentCount($guide);
    	return redirect('guides/'.$id.'#comments');
    }
}
