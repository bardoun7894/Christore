<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public static function getBanners(){
     return Banner::where('status',1)->orderBy('id','desc')->get();
    }
 
}
