<?php

namespace App\Http\Controllers;

use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
      $settings =  Setting::all()->map(function($image){
        $image->header_logo = asset('/storage/setting').'/'.$image->header_logo;
        $image->location_image = asset('/storage/setting').'/'.$image->location_image;
        $image->phone_image = asset('/storage/setting').'/'.$image->phone_image;
        $image->working_t_image = asset('/storage/setting').'/'.$image->working_t_image;
        return $image;
       });
        return view('dashboard.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'location_uz' => 'required',
            'location_ru' => 'required',
            'location_en' => 'required',
            'header_logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'working_time'=>'required',
            'working_t_image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone'=>'required|max:14',
            'phone_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'map' =>'required',
            
          ]);
          


          $headerLogo = md5(rand(1111,9999).microtime()).'.'.$request->file('header_logo')->extension();
          $request->file('header_logo')->storeAs('/public/setting/',$headerLogo);


          $locationImage = md5(rand(1111,9999).microtime()).'.'.$request->file('location_image')->extension();
          $request->file('location_image')->storeAs('/public/setting/',$locationImage);


          $workingTimeImage = md5(rand(1111,9999).microtime()).'.'.$request->file('working_t_image')->extension();
          $request->file('working_t_image')->storeAs('/public/setting/',$workingTimeImage);


          $phoneImage = md5(rand(1111,9999).microtime()).'.'.$request->file('phone_image')->extension();
          $request->file('phone_image')->storeAs('/public/setting/',$phoneImage);
      
          if(Setting::all()->count()===0){
            Setting::create( [
              'location_uz' => $request->location_uz, 
              'location_ru' => $request->location_ru,
              'location_en' => $request->location_en,
              'header_logo' => $headerLogo,
              'location_image'=>$locationImage,
              'working_time' =>$request->working_time,
              'working_t_image'=>$workingTimeImage,
              'phone'=>$request->phone,
              'phone_image'=>$phoneImage,
              'map' =>$request->map,
          ]);
          }
       
          return redirect('settings')->with(['message' => 'Post added successfully!', 'status' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        
        return view('dashboard.settings.edit' ,compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
          if($request->has('working_t_image')){
            $workingTimeImage = md5(rand(1111,9999).microtime()).'.'.$request->file('working_t_image')->extension();
            $request->file('working_t_image')->storeAs('/public/setting/',$workingTimeImage);
            if(file_exists('storage/setting/'.$setting->working_t_image)){
                unlink('storage/setting/'.$setting->working_t_image);
            }
        }else{
            $workingTimeImage = $setting->working_t_image;
        }  


          if($request->has('header_logo')){
            $headerLogo = md5(rand(1111,9999).microtime()).'.'.$request->file('header_logo')->extension();
            $request->file('header_logo')->storeAs('/public/setting/',$headerLogo);
            if(file_exists('storage/setting/'.$setting->header_logo)){
                unlink('storage/setting/'.$setting->header_logo);
            }
        }else{
            $headerLogo = $setting->header_logo;
        }
      
          if($request->has('location_image')){
            $locationImage = md5(rand(1111,9999).microtime()).'.'.$request->file('location_image')->extension();
            $request->file('location_image')->storeAs('/public/setting/',$locationImage);
            if(file_exists('storage/setting/'.$setting->location_image)){
                unlink('storage/setting/'.$setting->location_image);
            }
        }else{
            $locationImage = $setting->location_image;
        }

        if($request->has('phone_image')){
          $phoneImage = md5(rand(1111,9999).microtime()).'.'.$request->file('phone_image')->extension();
          $request->file('phone_image')->storeAs('/public/setting/',$phoneImage);
          if(file_exists('storage/setting/'.$setting->phone_image)){
              unlink('storage/setting/'.$setting->phone_image);
          }
      }else{
          $phoneImage = $setting->phone_image;
      }


           $setting->update ( [
            'location_uz' => $request->location_uz, 
            'location_ru' => $request->location_ru,
            'location_en' => $request->location_en,
            'header_logo' =>$headerLogo,
            'location_image'=>$locationImage,
            'working_time' =>$request->working_time,
            'working_t_image'=>$workingTimeImage,
            'phone'=>$request->phone,
            'phone_image'=>$phoneImage,
            'map' =>$request->map,
        ]);
        
      
         
        return redirect('settings')->with(['message' => 'Post update successfully!', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
   
}
