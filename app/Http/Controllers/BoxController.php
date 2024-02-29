<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boxes = Box::all();
        return view('dashboard.boxs.index',compact('boxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.boxs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'value' => 'required',
            'text_uz' => 'required',
            'text_ru' => 'required',
            'text_en' => 'required',
          ]);
         
         

        //   if(Box::all()->count()===0){
            Box::create([
              'value' => $request->value,
              'text_uz' => $request->text_uz, 
              'text_ru' => $request->text_ru,
              'text_en' => $request->text_en,
           
          ]);
        // }
        //   dd($request);
          return redirect('boxs')->with(['message' => 'Post added successfully!', 'status' => 'success']);
  
    }
    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $box)
    {
        return view('dashboard.boxs.edit' ,compact('box'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Box $box)
    {
        $box->update ( [
            'value' => $request->value,
            'text_uz' => $request->text_uz, 
            'text_ru' => $request->text_ru,
            'text_en' => $request->text_en,
        ]);
        return redirect('boxs')->with(['message' => 'Post update successfully!', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        //
    }
}
