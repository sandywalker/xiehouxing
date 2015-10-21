<?php

namespace App\Http\Controllers\Admin;

use App\Guide;
use App\GuideComment;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminGuideCommentController extends Controller
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
            $query = GuideComment::where('title','like','%'.$key.'%')->orWhere('content','like','%'.$key.'%');
        }else{
            $query = GuideComment::select();
        }
        $comments = $query->orderBy('guide_id','asc')->orderBy('id','asc')->with('guide','user')->paginate(20);
        return view('admin.guide.comments',compact('key','comments'));
    }

    public function setBest(Request $request,$id)
    {
        $comment = GuideComment::findOrFail($id);
        $comment->isbest = $request->input('value');
        $comment->save();
        return redirect('/admin/gcomments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $guide = GuideComment::findOrFail($id)->guide;
        GuideComment::destroy($id);
        Guide::updateCommentCount($guide);
        if ($request->has('redirect_to')){
            return redirect($request->input('redirect_to'));
        }
    }
}
