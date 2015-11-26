<?php

namespace App\Http\Controllers\Admin;

use App\ActivityComment;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminActivityCommentController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = '';
        if ($request->has('key')){
            $key = $request->input('key');
            $query = ActivityComment::where('title','like','%'.$key.'%')->orWhere('content','like','%'.$key.'%');
        }else{
            $query = ActivityComment::select();
        }
        $comments = $query->orderBy('activity_id','asc')->orderBy('id','desc')->with('activity','user')->paginate(20);
        return view('admin.activity.comments',compact('key','comments'));
    }

    public function setBest(Request $request,$id)
    {
        $comment = ActivityComment::findOrFail($id);
        $comment->isbest = $request->input('value');
        $comment->save();
        return redirect(URL::previous());
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $activity = ActivityComment::findOrFail($id)->activity;
        ActivityComment::destroy($id);
        if ($request->has('redirect_to')){
            return redirect($request->input('redirect_to'));
        }
    }
}
