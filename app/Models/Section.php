<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public static function sections(){

       $getSection=Section::with('categories')->where('status',1)->get();
       $getSection=json_decode(json_encode($getSection),true);
     return $getSection;

    }
    public function categories(){
        return $this->hasMany(Category::class,'section_id')->where(['status'=> 1,'parent_id'=>'ROOT'])->with('subcategories');
    }

}
