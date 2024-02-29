<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutInfo;
use App\Models\Box;
use App\Models\Catigory;
use App\Models\Comment;
use App\Models\Consultation;
use App\Models\Gallery;
use App\Models\Information;
use App\Models\Order;
use App\Models\Product;
use App\Models\InformationAboutUs;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FrontController extends Controller
{
    public function index(Request $request){ 
        $category = Catigory::limit(5)->get();
        $order = Order::first()->get();
        $abouts =About::first();
        $consultation = Consultation::first()->get();
        $random_ids = Product::inRandomOrder()->limit(7)->pluck('id');
        $product = Product::whereIn('id',$random_ids)->get();
        $gallery = Gallery::all();
        $comments =Comment::all();
        $informationAboutU = InformationAboutUs::limit(4)->get();
        $about_infos =AboutInfo::first();
        $boxes = Box::limit(3)->get();
        $information = Information::limit(3)->get();
        $settings =  Setting::all()->map(function($setting){
        $setting->header_logo = asset('/storage/setting').'/'.$setting->header_logo;
        $setting->location_image = asset('/storage/setting').'/'.$setting->location_image;
        $setting->phone_image = asset('/storage/setting').'/'.$setting->phone_image;
        $setting->working_t_image = asset('/storage/setting').'/'.$setting->working_t_image;
        return $setting;
       });
      return view('frontend.index', compact('settings','abouts','gallery','random_ids', 'boxes','information' , 'order', 'about_infos' , 'category', 'product', 'informationAboutU','consultation', 'comments' ));
    }
    public function category(Request $request){
      
      if($request->has('cat')){
        $product = Product::where('category_id', '=',$request->cat)->get();
        
      }
        $comments =Comment::all();
        $comments= $comments->toArray();
        $product = $product->toArray();
        $gallery = Gallery::all();
        
        $gallery = $gallery->toArray();
        $category = Catigory::limit(5)->get();
        $random_ids = Product::inRandomOrder()->limit(7)->pluck('id');
        $consultation = Consultation::first()->get();
        $order = Order::first()->get();
        $abouts =About::first();
        $about_infos =AboutInfo::first();
        $informationAboutU = InformationAboutUs::limit(4)->get();
        $boxes = Box::limit(3)->get();
        $information = Information::limit(3)->get();
        $settings =  Setting::all()->map(function($setting){
        $setting->header_logo = asset('/storage/setting').'/'.$setting->header_logo;
        $setting->location_image = asset('/storage/setting').'/'.$setting->location_image;
        $setting->phone_image = asset('/storage/setting').'/'.$setting->phone_image;
        $setting->working_t_image = asset('/storage/setting').'/'.$setting->working_t_image;
        
        return $setting;
       });
      return view('frontend.index', compact('settings','comments','random_ids','abouts','order','gallery', 'boxes','information' , 'about_infos' , 'category' ,'product', 'informationAboutU','consultation'));
    }
    
}
