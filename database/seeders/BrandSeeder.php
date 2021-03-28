<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandsRecords=[
            ['id'=>1,'name'=>'Nike','status'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['id'=>2,'name'=>'asics','status'=>1,'created_at'=>now(),'updated_at'=>now()]
        ];
        Brand::insert($brandsRecords);
    }
}
