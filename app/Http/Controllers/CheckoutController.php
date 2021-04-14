<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CheckoutRequest;
use App\Category;
use App\Product;
use App\Shipping;
use App\Payment;
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
        return redirect()->back();
      
    }

    public function getLogin(){
        return view('customer.login'); 
    }
    
    public function postLogin(Request $request){

        $arr = [
            'email' => $request->email,
            'password' => $request ->password
        ];
        if(Auth::attempt($arr)){
                // dd('Đăng nhập thành công');
            return redirect('/home');
        }else{
            return redirect('/login')->with('message','Địa chỉ Email hoặc mật khẩu không đúng');
            // dd('Đăng nhập thất bại');
        }
    }

    public function checkout(){
        $thanhpho = City::all();
        $quanhuyen = Districts::all();
        $xaphuong = Wards::all();
        return view('checkout.checkout',compact('thanhpho','quanhuyen','xaphuong'));
    }

    public function info_customer(CheckoutRequest $request){
        // $shipping = new Shipping;
        // $shipping->name = $request->name;
        // $shipping->phone = $request->phone;
        // $shipping->adress = $request->adress;
        // $shipping->note = $request->note;
        // Session::put('Thongbao','Thêm thông tin thành công');
        // dd($shipping);
        // return redirect('/payment');
        $thanhpho = City::all();
        $quanhuyen = Districts::all();
        $xaphuong = Wards::all();
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['adress'] = $request->adress;
        $data['note'] = $request->note;
        $shipping_id = DB::table('shipping')->insertGetId($data);
        Session::put('id',$shipping_id);
        return redirect('/payment');

    }

    public function payment(){
        $categorys = Category::all();
        $products = Product::orderBy('id','desc')->paginate(16);
        $slides = Slide::all();
        return view('checkout.payment', compact('categorys','products','slides'));

    }

    public function order(Request $request){
        $payment = array();
        $payment['payment_method'] = $request->payment_method;
        $payment['payment_status'] = "Đang xử lý";
        $payment_id = DB::table('payment')->insertGetId($payment);

        $order = array();
        $order['user_id'] = Session::get('id');
        $order['shipping_id'] = Session::get('id');
        $order['payment_id'] = $payment_id;
        $order['order_total'] = Cart::subtotal(0);
        $order['order_status'] = "Đang xử lý";
        $order_id = DB::table('order')->insertGetId($order);

        $content = Cart::content();
        foreach($content as $v_content){
            $order_detail = array();
            $order_detail['order_id'] = $order_id;
            $order_detail['product_id'] = $v_content->id;
            $order_detail['product_name'] = $v_content->name;
            $order_detail['product_price'] = $v_content->price;
            $order_detail['product_quantity'] = $v_content->qty;
            $order_detail_id = DB::table('order_detail')->insert($order_detail);
        }
        if($payment['payment_method'] = $request->payment_method){
            Cart::destroy();
            return view('checkout.order');
        }       
        return redirect()->back();
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
        // $order = DB::table('order')
        // ->join('users','order.user_id', '=','users.id')
        // ->join('shipping','order.user_id', '=','shipping.id')
        // ->select('order.*', 'users.name as user_name')
        // ->orderby('order.order_id','desc')
        // ->get();
        return view('checkout.manage_order');
    }

   
}

