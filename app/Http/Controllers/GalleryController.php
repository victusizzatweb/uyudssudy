<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
            $gallery =  Gallery::all()->map(function($image){
            $image->Image = asset('/storage/gallery').'/'.$image->Image;
            return $image;
           });
           
            return view('dashboard.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ]);
          
          $Image = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
          $request->file('image')->storeAs('/public/gallery/',$Image);

         
            Gallery::create( [
              'image' => $Image,
            //   dd($aboutImage)
          ]);
          return redirect('gallery')->with(['message' => 'Post added successfully!', 'status' => 'success']);
    
    }
    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('dashboard.gallery.edit' ,compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        if($request->has('image')){
            $Image = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
            $request->file('image')->storeAs('/public/gallery/',$Image);
            if(file_exists('/storage/gallery/'.$gallery->image)){
                unlink('/storage/gallery/'.$gallery->Image);
            }
        }else{
            $Image = $gallery->image;
        } 
        $gallery->update ( [
            'image' =>$Image,
        ]);
        return redirect('gallery')->with(['message' => 'Post update successfully!', 'status' => 'success']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
