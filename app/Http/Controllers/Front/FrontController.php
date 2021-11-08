<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NavLink;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{


   public function front(){
       $links=NavLink::all();
       $product = Product::with(['category'])->get()->toArray();
       $categories =Category::all();
       $products = array_chunk($product, ceil(count($product) / count($categories)));

//       dd($products);die;
    // dd($categories);die;
       return view('layouts.front_layout.lo')->with(compact(['categories','links','products']));
   }
}
