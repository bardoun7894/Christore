<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Seeder;

class ProductAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productAttributesRecord=[
       [   'id'=>1,'product_id'=>'3' , 'size'=>'Large','price'=>20,'stock'=>20,'sku'=>'bl78l-l','status'=>1],
       [   'id'=>2,'product_id'=>'4' , 'size'=>'moyen','price'=>20,'stock'=>20,'sku'=>'bl78l-m','status'=>1],
        ];
        ProductAttribute::insert($productAttributesRecord);
    }
}
