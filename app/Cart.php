<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
   
    // public $products = null;
    // public $totalPrice = 0;
    // public $totalQty = 0;
    
    // public function __constant($cart){
    //     if($cart){
    //         $this->products = $cart->products;
    //         $this->totalPrice  = $cart->totalPrice;
    //         $this->totalQty = $cart->totalQty;
    //     }
    // }

    // public function AddCart($product, $id){
    //     $newProduct = ['quanty'=> 0, 'price'=>$product->discount ? $product->discount : $product->price, 'productInfo'=> $product];
    //     if($this->products){
    //         if(array_key_exists($id, $this->products)){
    //             $newProduct = $this->products[$id];
    //         }
    //     }
    //     $newProduct['quanty']++;
    //     $newProduct['price'] = $newProduct['quanty'] * $product->discount ? $product->discount : $product->price; 
    //     $this->products[$id] = $newProduct;
    //     $this->totalPrice += $newProduct['price'];
    //     $this->totalQty ++;
    // }
}
