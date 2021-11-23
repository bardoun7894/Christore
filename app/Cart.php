<?php


namespace App;

Class Cart{

private $items = [];
public function insert($item)
{  
    $this->items[] = $item;
 
}
public function getItems(){
    return $this->items;
}
 
  public function get_total(){
      $count = 0;
        foreach ($this->getItems() as $item) {
           
             $count += $item['price']* $item['qty'];
         }
         return $count;
        
    }

 
}