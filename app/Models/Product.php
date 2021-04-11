<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id');
    }
    public function attributes(){
        return $this->hasMany(ProductAttribute::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function brands(){
      return $this->belongsTo(Brand::class,'brand_id');
        }
    public static  function newProducts($limited){
        return Product::where('status',1)->orderBy('id','desc')->limit($limited)->get();
      }
  public static  function featuredProduct($limited){
        return Product::where('status',1)->orderBy('id','desc')->limit($limited)->get();
      }

}
