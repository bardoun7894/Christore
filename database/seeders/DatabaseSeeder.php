<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(AdminTableSeeder::class);
     //   $this->call(SectionTableSeeder::class);
//        $this->call(CategoryTableSeeder::class);
//        $this->call(ProductTableSeeder::class);
        $this->call(ProductAttributesSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
