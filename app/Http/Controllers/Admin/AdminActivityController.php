<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use App\Dict;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->input('key');
        $states = $request->input('states');
        if (!$states){
            $states = 0;
        }
        $query = Activity::where('states',$states);
        if ($key){
            $query->where(function($query ) use ($key) {
                $query->where('title','like','%'.$key.'%')->orWhere('place','like','%'.$key.'%');  
            });
        }
        $query->orderBy('order_number','asc');
        $activities = $query->paginate(20);

        return view('admin.activity.index',compact('key','activities','states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function selectProducts()
    {
        $products = Product::all();
        $startTime = Carbon::now()->addDays(20)->format('Y-m-d');
        return view('admin.activity.products-modal',compact('products','startTime'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productId = $request->input('pid');
        $startTime = $request->input('startTime');
        Activity::fromProduct($productId,$startTime);
        return 1;
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
        $activity = Activity::findOrFail($id);


        $tags = Dict::byname('productTags')->items->lists('name','value');
        return view('admin.activity.edit',compact('activity','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->update($request->all());
        $thumb = $request->file('thumb');
        $banner = $request->file('banner');
        $activity->saveThumbs($thumb,$banner);
        $activity->save();
        return redirect($request->input('redirect_to'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Activity::destroy($id);
        return redirect($request->input('redirect_to'));
    }
}
