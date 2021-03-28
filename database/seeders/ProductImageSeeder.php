<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $productImageRecord=[
        [ 'id'=>'1',  'product_id'=>3,'image'=>'po.png','status'=>1 ],
        [ 'id'=>'2',  'product_id'=>3,'image'=>'po.png','status'=>1 ],
          ]  ;
      ProductImage::insert($productImageRecord);
    }
}
