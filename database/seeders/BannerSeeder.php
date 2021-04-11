<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $bannersRecords=[
         ['id'=>1,'image'=>'1.jpg','url'=>'','title'=>'special Offer','alt'=>'special Offer','status'=>1] ,
         ['id'=>2,'image'=>'2.jpg','url'=>'','title'=>'special Offer','alt'=>'special Offer','status'=>1] ,
         ['id'=>3,'image'=>'3.jpg','url'=>'','title'=>'special Offer','alt'=>'special Offer','status'=>1] ,
       ];
       Banner::insert($bannersRecords);
    }
}
