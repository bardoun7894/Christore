<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\NavLink;
use App\Models\Product;
use Illuminate\Http\Request;
 
class FrontController extends Controller
{


   public function front(){
    info('Name entered is in fact Tim'); // This does get printed
       $links=NavLink::all();
       $product = Product::with(['category'])->get()->toArray();
       $categories =Category::all();
       $banners=Banner::all();
       if(count($product)>0){
       $products = array_chunk($product, ceil(count($product) / count($categories))); 
       }else{
              $products=$product;
       }
      
//       dd($banners);die;
    // dd($categories);die;
       return view('layouts.front_layout.lo')->with(compact(['categories','links','products','banners']));
   }
}
