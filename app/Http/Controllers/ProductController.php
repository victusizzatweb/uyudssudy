<?php

namespace App\Http\Controllers;

use App\Models\Catigory;
use App\Models\Product;
use Illuminate\Http\Request;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard.product.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Catigory::all();
        // dd($category);
        return view('dashboard.product.create', compact( "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'title_en' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
          ]);
        //   dd($request);
          $image = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
          $request->file('image')->storeAs('/public/product/',$image);

        
            Product::create( [
              'title_uz' => $request->title_uz, 
              'title_ru' => $request->title_ru,
              'title_en' => $request->title_en,
              'category_id' => $request->category_id, 
              'image' => $image,
           
          ]);
          return redirect('product')->with(['message' => 'Post added successfully!', 'status' => 'success']);
    
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Catigory::all();
        return view('dashboard.product.edit' ,compact('product' ,'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if($request->has('image')){
            $productImage = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
            $request->image->storeAs('/public/product/',$productImage);
            File::delete('storage/product/'.$product->image);
            $productImage = $product->image;
            $product->save();
        } 
        $product->update ( [
            'title_uz' => $request->title_uz, 
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'category_id' => $request->category_id,
        ]);
        return redirect('product')->with(['message' => 'Post update successfully!', 'status' => 'success']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
