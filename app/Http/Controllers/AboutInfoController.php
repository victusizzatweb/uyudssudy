<?php

namespace App\Http\Controllers;

use App\Models\AboutInfo;
use Illuminate\Http\Request;

class AboutInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about_infos =  AboutInfo::all()->map(function($vidio){
            $vidio->vidio = asset('/storage/setting').'/'.$vidio->vidio;
            return $vidio;
           });
            return view('dashboard.aboutInfo.index',compact('about_infos'));
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
            'vidio' => 'required|mimes:mp4,mov,wmv,avi,avchd,flv,f4v,webm'
          ]);
        //   dd($request);
          $vidio = md5(rand(1111,9999).microtime()).'.'.$request->file('vidio')->extension();
          $request->file('vidio')->storeAs('/public/aboutInfo/',$vidio);

         if(AboutInfo::all()->count()===0){
            AboutInfo::create( [
              'title_uz' => $request->title_uz, 
              'title_ru' => $request->title_ru,
              'title_en' => $request->title_en,
              'text_uz' => $request->text_uz, 
              'text_ru' => $request->text_ru,
              'text_en' => $request->text_en,
              'vidio' => $vidio,
            //   dd($aboutImage)
          ]);
          return redirect('aboutInfo')->with(['message' => 'Post added successfully!', 'status' => 'success']);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutInfo $aboutInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutInfo $aboutInfo)
    {
        return view('dashboard.aboutInfo.edit' ,compact('aboutInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutInfo $aboutInfo)
    {
        if($request->has('vidio')){
            $vidio = md5(rand(1111,9999).microtime()).'.'.$request->file('vidio')->extension();
            $request->file('vidio')->storeAs('/public/aboutInfo/',$vidio);
            if(file_exists('/storage/aboutInfo/'.$aboutInfo->vidio)){
                unlink('/storage/aboutInfo/'.$aboutInfo->vidio);
            }
        }else{
            $vidio = $aboutInfo->vidio;
        } 
        $aboutInfo->update ( [
            'title_uz' => $request->title_uz, 
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'text_uz' => $request->text_uz, 
            'text_ru' => $request->text_ru,
            'text_en' => $request->text_en,
            'image' =>$vidio,
        ]);
        return redirect('aboutInfo')->with(['message' => 'Post update successfully!', 'status' => 'success']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutInfo $aboutInfo)
    {
        //
    }
}
