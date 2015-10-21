<?php

namespace App\Http\Controllers\Admin;

use App\Guide;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\GuideRequest;
use Illuminate\Http\Request;

class AdminGuideController extends Controller
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
            $query = Guide::where('title','like','%'.$key.'%')->orWhere('area','like','%'.$key.'%');
        }else{
            $query = Guide::select();
        }
        $guides = $query->orderBy('orders','asc')->orderBy('id','desc')->paginate(20);    

        return view('admin.guide.index',compact('key','guides'));
    }

    public function guideComments($id)
    {
        $guide = Guide::findOrFail($id);
        $guide->load('comments.user');
        return $guide->comments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuideRequest $request)
    {

        $guide =  Guide::create($request->all());
        
        $thumb = $request->file('thumb');
        $bannerThumb = $request->file('banner_thumb');
        $guide->saveThumbs($thumb,$bannerThumb);

        return redirect('/admin/guides');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $guide = Guide::findOrFail($id);
       return view('admin.guide.show',compact('guide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $guide = Guide::findOrFail($id);
       return view('admin.guide.edit')->with(compact('guide'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuideRequest $request, $id)
    {
        $guide = Guide::findOrFail($id);
        $guide->update($request->all());
        $thumb = $request->file('thumb');
        $bannerThumb = $request->file('banner_thumb');
        $guide->saveThumbs($thumb,$bannerThumb);
        return redirect($request->input('redirect_to'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Guide::destroy($id);
        return redirect($request->input('redirect_to'));
    }
}
