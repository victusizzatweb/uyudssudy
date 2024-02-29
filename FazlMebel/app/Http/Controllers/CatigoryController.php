<?php

namespace App\Http\Controllers;

use App\Models\Catigory;
use Illuminate\Http\Request;

class CatigoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $categories = Catigory::all();
       return view('dashboard.catigory.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.catigory.create');
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
          ]);
          
         
        //  if(Catigory::all()->count()===0){
            Catigory::create( [
              'title_uz' => $request->title_uz, 
              'title_ru' => $request->title_ru,
              'title_en' => $request->title_en,
          ]);
          return redirect('category')->with(['message' => 'Post added successfully!', 'status' => 'success']);
    // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Catigory $catigory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catigory $catigory, $id)
    { 
        $catigory = Catigory::findOrFail($id);
        return view('dashboard.catigory.edit' ,compact('catigory'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Catigory $category)
    {
        $category->update([
            'title_uz' => $request->title_uz, 
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
        ]);
        //  dd($request);
        return redirect('category')->with(['message' => 'Post update successfully!', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catigory $catigory)
    {
        $catigory->update([
            'status'=>'deleted'
         ]);
         return redirect()->back()->with('delete','seccess');
    }
}
