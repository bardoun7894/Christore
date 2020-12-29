<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->delete();
       $adminRecords =[
         [    'id'=>1,
              'name'=>'admin',
              'type'=>'admin',
              'mobile'=>'0708150351',
              'email'=>'mbardouni44@gmail.com',
              'password'=>Hash::make("moha7894"),
              'image'=>'',
              'status'=> 1
             ],[
               'id'=>2,
              'name'=>'moha',
              'type'=>'subAdmin',
              'mobile'=>'0000000',
              'email'=>'subAdm@gmail.com',
              'password'=>Hash::make("sub7894"),
              'image'=>'',
              'status'=> 0
             ],[
              'id' => 3 ,
              'name' => 'lo' ,
              'type' => 'subAdmin' ,
              'mobile' => '0000000',
              'email' => 'subAdmin@gmail.com',
              'password' => Hash::make("7894"),
              'image' => '',
              'status' => 1
             ],
             ];
     Db::table('admins')->insert($adminRecords);
//       foreach ($adminRecords as $key => $record){
//          Admin::create($adminRecords);
//       }
    }
}
