<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categoriesRecords=[
     [ 'id'=>1,'parent_id'=>0,'section_id'=>1,'category_name'=>'T-shirt','category_image'=>'', 'category_discount'=>0.0,
       'description'=>'long tshirt','url'=>'www.google.com', 'meta_title'=>'','meta_description'=>'', 'meta_keywords'=>'','status' =>1],
     [ 'id'=>2,'parent_id'=>0, 'section_id'=>1,'category_name'=>'denim','category_image'=>'', 'category_discount'=>0.0,
       'description'=>'long denim','url'=>'www.yahoo.com', 'meta_title'=>'','meta_description'=>'', 'meta_keywords'=>'','status' =>1],
     [ 'id'=>3, 'parent_id'=>0,'section_id'=>1,'category_name'=>'jacket','category_image'=>'', 'category_discount'=>0.0,
       'description'=>'long jacket','url'=>'www.yahoo.com', 'meta_title'=>'','meta_description'=>'', 'meta_keywords'=>'','status' =>1],
     [ 'id'=>4, 'parent_id'=>1,'section_id'=>1,'category_name'=>'t-shirt casual','category_image'=>'', 'category_discount'=>0.0,
       'description'=>'long jacket','url'=>'www.yahoo.com', 'meta_title'=>'', 'meta_description'=>'', 'meta_keywords'=>'','status' =>1],

         ];
       Category::insert($categoriesRecords);
    }
}
