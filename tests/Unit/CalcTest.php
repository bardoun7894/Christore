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
   