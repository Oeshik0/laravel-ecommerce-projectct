<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Catagory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()  
    {
        $sliders = Slider::where('status','0')->get();
        return view('frontend.index',compact('sliders'));
    }

    public function contact() 
    {
        return view('contact');
    }

     public function catagories()  
    {
        $catagories=Catagory::where('status','0')->get();
        return view('frontend.collections.catagory.index',compact('catagories'));
    }

    public function products($catagory_slug)  
    {
        $catagory= Catagory::where('slug',$catagory_slug)->first();
        if($catagory){
            
            return view('frontend.collections.products.index',compact('catagory'));
        }else{
            return redirect()->back();
        }
        
    }
    public function productView(string $catagory_slug, string $product_slug)
    {
        $catagory= Catagory::where('slug',$catagory_slug)->first();
        if($catagory){
            $product = $catagory->products()->where('slug',$product_slug)->where('status','0')->first();
            if($product)
            {
                return view('frontend.collections.products.view',compact('product','catagory'));

            }else{
                return redirect()->back();
            }
            
        }else{
            return redirect()->back();
        }
    }
    public function thankyou()
    {
        return view('frontend.thank-you');  
    }
}
