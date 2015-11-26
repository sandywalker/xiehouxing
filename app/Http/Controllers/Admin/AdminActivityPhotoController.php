<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\ActivityPhoto;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminActivityPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $activity = Activity::findOrFail($id);
        $photos = $activity->photos;
        return view('admin.aphotos.index',compact('activity','photos'));
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
    public function store($id, Request $request)
    {
        $this->validate($request,[
            'file' => 'required|mimes:jpg,jpeg,png'
        ]);
        $activity = Activity::findOrFail($id);
        $photo = $request->file('file');

        ActivityPhoto::createPhoto($activity,$photo);
        return 'Done';
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
        $aphoto = ActivityPhoto::findOrFail($id);
        $aphoto->removePhoto();
        ActivityPhoto::destroy($id);
        return redirect($request->input('redirect_to'));
    }
}
