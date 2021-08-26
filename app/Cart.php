<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart 
{
   
    // public $products = null;
    // public $totalPrice = 0;
    // public $totalQty = 0;
    
    // public function __construct($cart){
    //     if($cart){
    //         $this->products = $cart->products;
    //         $this->totalPrice  = $cart->totalPrice;
    //         $this->totalQty = $cart->totalQty;
    //     }
    // }

    // public function addCart($product, $id){
    //     $newProduct = ['quanty'=> 0, 'price'=>$product->discount ? $product->price-$product->discount*$product->price/100 : $product->price, 'productInfo'=> $product];
    //     if($this->products){
    //         if(array_key_exists($id, $this->products)){
    //             $newProduct = $this->products[$id];
    //         }
    //     }
    //     $newProduct['quanty']++;
    //     $newProduct['price'] = $newProduct['quanty'] * $product->discount ? $product->price-$product->discount*$product->price/100 : $product->price; 
    //     $this->products[$id] = $newProduct;
    //     $this->totalPrice += $newProduct['price'];
    //     $this->totalQty ++;
    // }

    // public function deleteCart($id){
    //     $this->totalQty -= $this->products[$id]['quanty'];
    //     $this->totalPrice -= $this->products[$id]['price'];
    //     unset($this->products[$id]);
    // }
}
