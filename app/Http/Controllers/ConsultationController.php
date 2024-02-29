<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultation =  Consultation::all()->map(function($image){
            $image->Image = asset('/storage/setting').'/'.$image->Image;
            return $image;
           });
            return view('dashboard.consultation.index',compact('consultation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.consultation.create');
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
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg,pdf,docx,xls|max:2048'
          ]);
          
          $Image = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
          $request->file('image')->storeAs('/public/consultation/',$Image);

         
            Consultation::create( [
              'title_uz' => $request->title_uz, 
              'title_ru' => $request->title_ru,
              'title_en' => $request->title_en,
              'text_uz' => $request->text_uz, 
              'text_ru' => $request->text_ru,
              'text_en' => $request->text_en,
              'image' => $Image,
            //   dd($aboutImage)
          ]);
          return redirect('consultation')->with(['message' => 'Post added successfully!', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        return view('dashboard.consultation.edit' ,compact('consultation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultation $consultation)
    {
        if($request->has('image')){
            $Image = md5(rand(1111,9999).microtime()).'.'.$request->file('image')->extension();
            $request->file('image')->storeAs('/public/consultation/',$Image);
            if(file_exists('/storage/consultation/'.$consultation->image)){
                unlink('/storage/consultation/'.$consultation->Image);
            }
        }else{
            $Image = $consultation->image;
        } 
        $consultation->update ( [
            'title_uz' => $request->title_uz, 
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'text_uz' => $request->text_uz, 
            'text_ru' => $request->text_ru,
            'text_en' => $request->text_en,
            'image' =>$Image,
        ]);
        return redirect('consultation')->with(['message' => 'Post update successfully!', 'status' => 'success']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        //
    }
}
