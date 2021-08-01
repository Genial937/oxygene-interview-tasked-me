<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('collections')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collections = Collection::latest()->get();
        return view('admin.products.create', compact('collections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = "";
        if($request->has('photo')){
            $file = $request->file('photo');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('products'), $filename);
        }
        Product::create(array_merge(
            $request->all(),
            [
                'photo' => 'products/'.$filename
            ]
        ));
        return back()->with('message', 'Product posted successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('collections')->findOrFail($id);
        $collections = Collection::latest()->get();
        return view('admin.products.edit', compact('product','collections'));
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
        $product = Product::find($id);
        $filename = $product->photo;
        if($request->has('photo')){
            $file = $request->file('photo');
            $filename = 'products/'.$file->getClientOriginalName();
            $file->move(public_path('products'), $filename);
        }
        $product->update(array_merge(
            $request->all(),
            [
                'photo' => $filename
            ]
        ));
        return back()->with('message', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return back();
    }
}
