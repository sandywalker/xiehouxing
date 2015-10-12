<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Dict;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\BannerRequest;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.banner.index')->with(['banners'=>Banner::all()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tags = Dict::byName('bannerTag')->items;
        return view('admin.banner.create')->with(compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $banner =  Banner::create($request->all());
        $file = $request->file('photo');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $path = 'img/banners/';
        $file->move($path,$filename);

        $banner->path = $path.$filename;
        list($width, $height) = getimagesize($banner->path);
        $banner->width = $width;
        $banner->height = $height;
        $banner->save();
        
        return view('admin.banner.index');
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
    public function destroy($id)
    {
        //
    }
}
