<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     **/
    public function run()
    {
      $products =[
          [
        "id"=>1,
        "category_id"=>2,
        "section_id"=>2,
        "product_name"=>"كميسون",
        "product_code"=>"B023",
        "product_color"=>"",
        "product_price"=>100,
        "product_discount"=>10,
        "product_weight"=>10,
        "product_video"=>"",
        "main_image"=>"",
        "description"=>"", 
        "fabric"=>"", 
        "meta_title"=>"",
        "meta_description"=>"",
        "meta_keywords"=>"",
        "is_featured"=>'No',
        "status"=>1 ],    [
        "id"=>2,
        "category_id"=>2,
        "section_id"=>2,
        "product_name"=>"بجامة",
        "product_code"=>"pg023",
        "product_color"=>"",
        "product_price"=>100,
        "product_discount"=>10,
        "product_weight"=>10,
        "product_video"=>"",
        "main_image"=>"",
        "description"=>"", 
        "fabric"=>"", 
        "meta_title"=>"",
        "meta_description"=>"",
        "meta_keywords"=>"",
        "is_featured"=>'yes',
        "status"=>1 ],
                 ];
      Product::insert($products);
    }
}
