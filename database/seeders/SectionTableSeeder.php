<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sectionsRecord=[
          ['id'=>1,'name'=>'Men','status'=>0],
          ['id'=>2,'name'=>'Women','status'=>1],
          ['id'=>3,'name'=>'Kids','status'=>1]
      ];
      Section::insert($sectionsRecord);
    }
}
