<?php

namespace App\Http\Controllers\Admin;

use App\ActivityOrder;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminActivityOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = -1;
        $approach = -1;
        $key = '';
        if ($request->has('key')){
            $key = $request->input('key');
            $query = ActivityOrder::where('code','like','%'.$key.'%');
        }else{
            $query = ActivityOrder::select();
        }
        if ($request->has('states')){
            $states = $request->input('states');
            $query->where('states',$states);
        }
        if ($request->has('approach')){
            $approach = $request->input('approach');
            $query->where('pay_approach',$approach);   
        }
        $orders = $query->orderBy('activity_id','asc')->orderBy('id','desc')->with('activity','user')->paginate(20);
        return view('admin.activity.orders',compact('key','orders','states','approach'));
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
    public function destroy($id)
    {
        //
    }
}
