<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

 public function listing($url){
     $categoryCount =Category::where(['url'=>$url,'status'=>1])->count();
     if($categoryCount>0){
         $cate =Category::categoryDetails($url);
//         $ids=array();
//         $ids[]=$cate['id'];
//         foreach ($cate['subcategories'] as $key=>$cat){
//             $ids =$cat['id'];
//      }
//     $dd3 = ['cats'=>$ids,'cate'=>$cate] ;

         $pro = Product::all();
         $pro = $pro->whereIn('category_id',$cate['id']);
         dd($pro);
         
       }else{
         abort(404);
       }

 }

}
