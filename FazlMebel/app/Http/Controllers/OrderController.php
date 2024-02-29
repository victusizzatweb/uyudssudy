<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders =  Order::all()->map(function($image){
            $image->Image = asset('/storage/order').'/'.$image->Image;
            return $image;
           });
            return view('dashboard.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.order.create');
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
            'text_uz' => 'required',
            'text_ru' => 'required',
            'text_en' => 'required',
            'text2_uz' => 'required',
            'text2_ru' => 'required',
            'text2_en' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ]);
          
          $Image = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
          $request->file('image')->storeAs('/public/order/',$Image);

       
            Order::create( [
              'title_uz' => $request->title_uz, 
              'title_ru' => $request->title_ru,
              'title_en' => $request->title_en,
              'text_uz' => $request->text_uz, 
              'text_ru' => $request->text_ru,
              'text_en' => $request->text_en,
              'text2_uz' => $request->text2_uz, 
              'text2_ru' => $request->text2_ru,
              'text2_en' => $request->text2_en,
              'image' => $Image,
          ]);
          return redirect('order')->with(['message' => 'Post added successfully!', 'status' => 'success']);
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('dashboard.order.edit' ,compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        if($request->has('image')){
            $Image = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
            $request->file('image')->storeAs('/public/order/',$Image);
            if(file_exists('/storage/order/'.$order->image)){
                unlink('/storage/order/'.$order->Image);
            }
        }else{
            $Image = $order->image;
        } 
        $order->update ( [
            'title_uz' => $request->title_uz, 
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'text_uz' => $request->text_uz, 
            'text_ru' => $request->text_ru,
            'text_en' => $request->text_en,
            'text2_uz' => $request->text2_uz, 
            'text2_ru' => $request->text2_ru,
            'text2_en' => $request->text2_en,
            'image' =>$Image,
        ]);
        return redirect('order')->with(['message' => 'Post update successfully!', 'status' => 'success']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
