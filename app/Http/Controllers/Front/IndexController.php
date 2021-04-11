<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class IndexController extends Controller
{

    public  function index(){
      $page_name='title';

      $language = Config::get('app.locale');

     $featuredItemCount = Product::featuredProduct(6)->count();
     $featuredItem= Product::featuredProduct(6)->toArray();

     $featuredItemChunk = array_chunk($featuredItem,4);

     $newProduct = Product::newProducts(6);
     $banners= Banner::getBanners();
      if($language =='ar'){
          return view('layouts.front_layout.ar.index_ar')->with(compact(['page_name','language','featuredItemChunk','featuredItemCount','newProduct','banners']));
      }else{
          return view('layouts.front_layout.en.index')->with(compact(['page_name','language','featuredItemChunk','newProduct','banners']));

      }

  }

    public function redstore()
    {
        if(Config::get('app.locale')  == 'ar'){
            return view('redstore_ar');
        }else{
            return view('redstore');
        }

    }

}
