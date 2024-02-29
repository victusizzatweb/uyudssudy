<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $information =  Information::all()->map(function($image){
        $image->Image = asset('/storage/setting').'/'.$image->aboutImage;
        return $image;
       });
        return view('dashboard.information.index',compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.information.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ]);
          
          $image = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
          $request->file('image')->storeAs('/public/information/',$image);

        //  if(Information::all()->count()!=0){
            Information::create( [
              'title_uz' => $request->title_uz, 
              'title_ru' => $request->title_ru,
              'title_en' => $request->title_en,
              'text_uz' => $request->text_uz, 
              'text_ru' => $request->text_ru,
              'text_en' => $request->text_en,
              'image' => $image,
            //   dd($aboutImage)
          ]);
          return redirect('information')->with(['message' => 'Post added successfully!', 'status' => 'success']);
    // }
    }
    /**
     * Display the specified resource.
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Information $information)
    {
        return view('dashboard.information.edit' ,compact('information'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information)
    {
        if($request->has('image')){
            $image = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
            $request->file('image')->storeAs('/public/information/',$image);
            if(file_exists('/storage/information/'.$information->image)){
                unlink('/storage/information/'.$information->image);
            }
        }else{
            $image = $information->image;
        } 
        $information->update ( [
            'title_uz' => $request->title_uz, 
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'text_uz' => $request->text_uz, 
            'text_ru' => $request->text_ru,
            'text_en' => $request->text_en,
            'image' =>$image,
        ]);
        return redirect('information')->with(['message' => 'Post update successfully!', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        //
    }
}
