<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Section;

use App\Models\Category;
use App\Models\NavLink;
use App\Models\Product;
use Illuminate\Http\Request;
 
class FrontController extends Controller
{


   public function front(){
    // info('Name entered is in fact Tim'); // This does get printed
    $sections = Section::all();
    $language =   app()->getLocale();
       $links=NavLink::all();
       $products = Product::with(['category'])->get();
       $products_chunk = Product::with(['category'])->get()->toArray();
       $categories =Category::all();
       $banners=Banner::all();
       if(count($products)>0){
       $products_chunk = array_chunk($products_chunk, ceil(count($products_chunk) / count($categories))); 
       }else{
              $products_chunk=$products;
       }
      
//       dd($banners);die;
    // dd($categories);die;
       return view('layouts.front_layout.lo')->with(compact(['categories','links','products','banners','sections','language']));
   }
}
