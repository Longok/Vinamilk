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
    
    public function count_cart(Request $request){
        $data = $request->all();
        $cart = count(Session::get('cart'));
        $totalquanty = 0;
        foreach(Session::get('cart') as $count){
            $totalquanty += $count['quantity'];
        }
        $output = '';
        if($cart >0){
            $output .= '<span class="show-cart">'.$totalquanty.'</span>';
        }else{
            $output .= '<span class="show-cart">0</span>';
        }
       
        echo $output;           
    }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        // $session_id = substr(md5(microtime()),rand(0,26),4);
        $new_cart = Session::get('cart');
        if($new_cart == true){
            $isset = 0;
           foreach($new_cart as $key => $val){
               if($val['id'] == $data['product_id']){
                   $isset++;
                   $new_cart[$key] = array(
                    'id'=>$val['id'],
                    'name'=>$val['name'],
                    'image'=>$val['image'],
                    'price'=>$val['price'],
                    'quantity'=>$val['quantity']+$data['product_quantity'],
                );
                Session::put('cart',$new_cart);
               }
           }
           if($isset == 0){
                $new_cart[] = array(
                    'id'=>$data['product_id'],
                    'name'=>$data['product_name'],
                    'image'=>$data['product_image'],
                    'price'=>$data['product_price'],
                    'quantity'=>1,
                );
            Session::put('cart',$new_cart);
           }
        }else{
            $new_cart[] = array(
                'id'=>$data['product_id'],
                'name'=>$data['product_name'],
                'image'=>$data['product_image'],
                'price'=>$data['product_price'],
                'quantity'=>1,
            );
            Session::put('cart',$new_cart);
        }
        
        Session::save();
        print_r($data);
    }

    public function index(){
        return view('cart.index');
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

}