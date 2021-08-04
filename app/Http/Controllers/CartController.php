<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Product;
use Session;
use Cart;

use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    
    public function show_cart(Request $request){
        $data = $request->all();
        $cart = count(Session::get('cart'));
        $output = '';
        if($cart >0){
            $output .= '<span class="show-cart">'.$cart.'</span>';
        }else{
            $output .= '<span class="show-cart">0</span>';
        }
       
        echo $output;           
    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),4);
        $new_cart = Session::get('cart');
        if($new_cart == true){
            $isset = 0;
            if($isset == 0){
                $new_cart[] = array(
                    'session_id'=> $session_id,
                    'id'=>$data['product_id'],
                    'name'=>$data['product_name'],
                    'image'=>$data['product_image'],
                    'price'=>$data['product_price'],
                    'quantity'=>$data['product_quantity']++,
                );
                Session::put('cart',$new_cart);
            }

        }else{
            $new_cart[] = array(
                'session_id'=> $session_id,
                'id'=>$data['product_id'],
                'name'=>$data['product_name'],
                'image'=>$data['product_image'],
                'price'=>$data['product_price'],
                'quantity'=>$data['product_quantity'],
            );
            Session::put('cart',$new_cart);
        }
        
        Session::save();
        // print_r($data);
    }

    public function show_cart_ajax(){
        return view('cart.cart-ajax');
    }


    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            foreach( $data['update_quantity'] as $key => $qty){
               foreach( $cart as $id => $val){
                   if($val['id'] == $key){
                    $cart[$id]['quantity'] = $qty;
                    echo $qty;
                   }
               }
                
            }
            Session::put('cart', $cart);
            return Redirect()->back()->with('message','Thay đổi số lượng thành công');
        }
        
        // return Redirect::to('/cart');
    }

    public function delete_cart_ajax($id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key => $val){
                if($val['id']== $id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa sản phẩm thành công');
        }
    }

    // public function add( Request $request, $id){
    //     $proId = $request->productid_hidden;
    //     $quantity = $request->qty;      
    //     $product = Product::where('id',$proId)->first();
    //     $data['id'] = $product->id;
    //     $data['qty'] = $quantity;
    //     $data['name'] = $product->name;
    //     $data['price'] = $product->price - (($product->price*$product->discount)/100); 
    //     $data['weight'] = '123';
    //     $data['options']['image'] = $product->image;
    //     Cart::add($data);
    //     // $content = Cart::content();
    //     return redirect::to('/show-cart');
    // }

    // public function show_cart(){
       
    //     return view('cart.index');
    // }

    // public function delete_cart($rowId){
    //     Cart::update($rowId,0);
    //     return redirect::to('/show-cart');
    // }


}