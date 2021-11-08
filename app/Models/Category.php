<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id');
      }
    public function parentCategory(){
        return $this->belongsTo(Category::class,'parent_id')->where('parent_id',0);
    }
    public static function categoryDetails($url){

     $categoryDetails = Category::select('id','category_name','url')->
        with(['subcategories'=>function($query){
            $query->select('id','parent_id')->where('status',1);
     }])->where([ 'url'=>$url , 'status'=>1 ])->first()->toArray();
          $catIds=array();
        $catIds[]=$categoryDetails['id'];
         foreach ($categoryDetails['subcategories'] as $key=>$subCat){
             $catIds[] =$subCat['id'];
         }
        return array('catIds'=>$catIds,'categoryDetails'=>$categoryDetails) ;
    }

}
