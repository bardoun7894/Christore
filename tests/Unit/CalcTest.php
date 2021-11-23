<?php

namespace Tests\Unit;
use Tests\TestCase; 
use App\Cart;
use App\Models\Admin; 

class CalcTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */ 
  
private $cart;
    public function  create(){    
    $this->cart =new Cart();
        $data =   [ 
            [   'id'=>1,
        'name'=>'admin',
        'type'=>'admin',
        'mobile'=>'0708150351',
        'email'=>'mbardouni44@gmail.com',
        'password'=> "moha7894",
        'image'=>'',
        'status'=> 1
    ] ,[
        'id'=>2,
        'name'=>'moha',
        'type'=>'subAdmin',
        'mobile'=>'0000000',
        'email'=>'subAdm@gmail.com',
        'password'=> "sub7894",
        'image'=>'',
        'status'=> 0
    ]]

; 
$this->cart->insert($data); 
} 

public function test_admin_name_is_found(){
    $this->create();
    $d = $this->cart->getItems(); 
    foreach($d as $value){
        info( $value);
        $this->assertEquals('admin',$value[0]['name']);
        }
    } 
    // $this->assertEquals("moha",$d[0]['name']);
 
}
   