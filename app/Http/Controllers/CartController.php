<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Product;
// use App\Cart;
use Session;
use Cart;

use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    
    public function add( Request $request, $id){
        $proId = $request->productid_hidden;
        $quantity = $request->qty;      
        $product = Product::where('id',$proId)->first();
        $data['id'] = $product->id;
        $data['qty'] = $quantity;
        $data['name'] = $product->name;
        $data['price'] = $product->price - (($product->price*$product->discount)/100); 
        $data['weight'] = '123';
        $data['options']['image'] = $product->image;
        Cart::add($data);
        // $content = Cart::content();
        return redirect::to('/show-cart');
    }

    public function show_cart(){
       
        return view('cart.index');
    }

    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return redirect::to('/show-cart');
    }

    public function update_cart(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->quantity;
        cart::update($rowId,$qty);
        
        return Redirect::to('/show-cart');
    }

}
