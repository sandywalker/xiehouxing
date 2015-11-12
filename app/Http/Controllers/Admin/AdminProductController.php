<?php

namespace App\Http\Controllers\Admin;

use App\Dict;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->input('key');
        
        if ($key){
            $products = Product::where('title','like','%'.$key.'%')->orWhere('place','like','%'.$key.'%')->get();
        }else{
            $products = Product::all();    
        }
        return view('admin.product.index',compact('key','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Dict::byname('productTags')->items->lists('name','value');
        $product = new Product;
        return view('admin.product.create',compact('tags','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
         $product =  Product::create($request->all());
        
         $thumb = $request->file('thumb');
         $banner = $request->file('banner');
         $product->saveThumbs($thumb,$banner);
         $product->save();

         return redirect('/admin/products');
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
        $product = Product::findOrFail($id);
        $tags = Dict::byname('productTags')->items->lists('name','value');
        return view('admin.product.edit',compact('product','tags'));
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
        $product = Product::findOrFail($id);
        $product->update($request->all());
        $thumb = $request->file('thumb');
        $banner = $request->file('banner');
        $product->saveThumbs($thumb,$banner);
        $product->save();
        return redirect($request->input('redirect_to'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        Product::destroy($id);
        return redirect($request->input('redirect_to'));
    }
}
