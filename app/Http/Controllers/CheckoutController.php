<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CheckoutRequest;
use App\Category;
use App\Product;
use App\Customer;
use App\Shipping;
use App\Order;
use App\Order_detail;
use App\Slide;
use App\City;
use Hash;
use App\Districts;
use App\Wards;
use Session;
use Cart;
use Auth;
use Carbon\Carbon;
use DB;

class CheckoutController extends Controller
{
   
    public function create(){
        return view('customer.sign-up');
    }

    public function store(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request ->password);

        $customer_id = DB::table('customer')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('name',$request->name);
        Session::put('message','Tạo tài khoản thành công');  
        return redirect('/home');
      
    }

    public function getLogin(){

        return view('customer.login'); 
    }
    
    public function postLogin(Request $request){
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($arr)){
                // dd('Đăng nhập thành công');    
            return redirect('/home');
        }else{
            return redirect('/login')->with('message','Địa chỉ Email hoặc mật khẩu không đúng');
            // dd('Đăng nhập thất bại');
        }       
    }

    public function logout(){
        Auth::logout();
        return redirect::to('/home');
    }

    public function checkout(){
        $thanhpho = City::all();
        $quanhuyen = Districts::all();
        $xaphuong = Wards::all();
        return view('checkout.checkout',compact('thanhpho','quanhuyen','xaphuong'));
    }

    public function info_customer(CheckoutRequest $request){
        $content = Cart::content();

        $shipping = new Shipping;
        $shipping->shipping_name = $request->shipping_name;
        $shipping->shipping_email = $request->shipping_email;
        $shipping->shipping_phone = $request->shipping_phone;
        $shipping->shipping_adress = $request->shipping_adress;
        $shipping->shipping_note = $request->shipping_note;
        $shipping->shipping_method = $request->shipping_method;
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $code = substr(md5(microtime()),rand(0,26),5);
        $order = new Order;
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_code = $code;
        $order->order_status = 1;
        $order->save();

        foreach($content as $key =>$value){
            $order_detail = new Order_detail;
            $order_detail->order_code = $code;
            $order_detail->product_id = $value->id;
            $order_detail->product_name = $value->name;
            $order_detail->product_price = $value->price;
            $order_detail->product_quantity = $value->qty;
            $order_detail->save();
            // echo '<pre>';
            // print_r($order_detail);
            // echo '</pre>';
        }

        if($shipping->shipping_method = $request->shipping_method){
            Cart::destroy();
            return view('checkout.message');
        }       
        return view('checkout.message');

    }

    public function adress(Request $request)
    {
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $quanhuyen = Districts::where('matp',$data['ma_id'])->get();
                
                foreach($quanhuyen as $qh){
                    $output.='<option value = "'.$qh->maqh.'">'.$qh->name.'</option>';
                }

            }else{
                $xaphuong = Wards::where('maqh',$data['ma_id'])->get();
                   
                foreach($xaphuong as $xp){
                    $output.='<option value = "'.$xp->xaid.'">'.$xp->name.'</option>';
                }
            }        
        }
        echo $output; 
    }

    public function manage_order(){
        $shipping = Shipping::join('order','shipping.shipping_id','=','order.shipping_id')->select('shipping.*','order.*')->get();
        $orders = Order::orderBy('created_at','DESC')->get();
        return view('checkout.manage_order',compact('orders','shipping'));
    }

    public function order_detail($order_code){
        $order_detail = Order_detail::where('order_code',$order_code)->get();
        $orders = Order::where('order_code',$order_code)->get();
        foreach( $orders as $key => $order){
            $customer_id = $order->customer_id;
            $shipping_id = $order->shipping_id;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();

        $order_detail = Order_detail::with('product')->where('order_code',$order_code)->get();
        return view('checkout.view_order')->with(compact('order_detail','customer','shipping','order_detail','orders'));
    }

    public function update_status(Request $request){
        $data = $request->all();
        $orderUpdate = Order::find($data['order_id']);
        $orderUpdate->order_status = $data['order_status'];                                          
        $orderUpdate->save();
    }   

    public function delete($order_id){
        $order = Order::find($order_id);
        $order->delete();
        return Redirect::to('/manage-order');

    }
}

