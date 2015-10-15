<?php

namespace App\Http\Controllers\Admin;

use App\Advert;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\AdvertRequest;
use Illuminate\Http\Request;

class AdminAdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.advert.index')->with(['adverts'=>Advert::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advert.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertRequest $request)
    {
        Advert::create($request->all());
        return redirect('/admin/adverts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $advert = Advert::findOrFail($id);
       return view('admin.advert.show',compact('advert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $advert = Advert::findOrFail($id);
       return view('admin.advert.edit')->with(compact('advert'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertRequest $request, $id)
    {
        $advert = Advert::findOrFail($id);
        $advert->update($request->all());
        return redirect('/admin/adverts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Advert::destroy($id);
        return redirect('/admin/adverts');
    }
}
