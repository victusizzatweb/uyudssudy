<?php

namespace App\Http\Controllers;

use App\Models\Frontend;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frontend = Frontend::all();
        return view('dashboard.frontend.index', compact('frontend'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
       
        $request->validate([
            'phone' => 'required|max:13',
            'status'=>'required',
          ]);

        
            Frontend::create( [
              'phone' => $request->phone,
              'status' =>$request->status,
              'name' =>$request->name
           
          ]);
         
          return redirect('/')->with(['message' => 'Post added successfully!', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Frontend $frontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}
