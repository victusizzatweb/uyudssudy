<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts =  About::all()->map(function($image){
            $image->aboutImage = asset('/storage/setting').'/'.$image->aboutImage;
            return $image;
           });
            return view('dashboard.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.aboutInfo.create');
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
          
          $aboutImage = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
          $request->file('image')->storeAs('/public/about/',$aboutImage);

         if(About::all()->count()===0){
            About::create( [
              'title_uz' => $request->title_uz, 
              'title_ru' => $request->title_ru,
              'title_en' => $request->title_en,
              'text_uz' => $request->text_uz, 
              'text_ru' => $request->text_ru,
              'text_en' => $request->text_en,
              'image' => $aboutImage,
            //   dd($aboutImage)
          ]);
          return redirect('abouts')->with(['message' => 'Post added successfully!', 'status' => 'success']);
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('dashboard.about.edit' ,compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        if($request->has('image')){
            $aboutImage = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
            $request->file('image')->storeAs('/public/about/',$aboutImage);
            if(file_exists('/storage/about/'.$about->image)){
                unlink('/storage/about/'.$about->aboutImage);
            }
        }else{
            $aboutImage = $about->image;
        } 
        $about->update ( [
            'title_uz' => $request->title_uz, 
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'text_uz' => $request->text_uz, 
            'text_ru' => $request->text_ru,
            'text_en' => $request->text_en,
            'image' =>$aboutImage,
        ]);
        return redirect('abouts')->with(['message' => 'Post update successfully!', 'status' => 'success']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
