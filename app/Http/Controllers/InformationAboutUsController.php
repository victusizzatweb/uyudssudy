<?php

namespace App\Http\Controllers;

use App\Models\InformationAboutUs;
use Illuminate\Http\Request;

class InformationAboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $informationAboutU =  InformationAboutUs::all()->map(function($image){
        $image->Image = asset('/storage/informationAboutUs').'/'.$image->aboutImage;
        return $image;
       });
        return view('dashboard.informationAboutUs.index',compact('informationAboutU'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.informationAboutUs.create');
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
          $request->file('image')->storeAs('/public/informationAboutUs/',$image);

      
            InformationAboutUs::create( [
              'title_uz' => $request->title_uz, 
              'title_ru' => $request->title_ru,
              'title_en' => $request->title_en,
              'text_uz' => $request->text_uz, 
              'text_ru' => $request->text_ru,
              'text_en' => $request->text_en,
              'image' => $image,
            
          ]);
          return redirect('informationAboutUs')->with(['message' => 'Post added successfully!', 'status' => 'success']);
  
    }
    /**
     * Display the specified resource.
     */
    public function show(InformationAboutUs $informationAboutU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InformationAboutUs $informationAboutU)
    {
        
         return view('dashboard.informationAboutUs.edit' ,compact('informationAboutU'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InformationAboutUs $informationAboutU)
    {
        if($request->has('image')){
            $image = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
            $request->file('image')->storeAs('/public/informationAboutUs/',$image);
            if(file_exists('/storage/informationAboutUs/'.$informationAboutU->image)){
                unlink('/storage/informationAboutUs/'.$informationAboutU->image);
            }
        }else{
            $image = $informationAboutU->image;
        } 
        $informationAboutU->update ( [
            'title_uz' => $request->title_uz, 
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'text_uz' => $request->text_uz, 
            'text_ru' => $request->text_ru,
            'text_en' => $request->text_en,
            'image' =>$image,
        ]);
        return redirect('informationAboutUs')->with(['message' => 'Post update successfully!', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InformationAboutUs $informationAboutU)
    {
        //
    }
}
