<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Admin;
use App\Order;
use Session;
use App\Customer;
use DB;
use Illuminate\Support\Facades\Hash;

Session_start();

class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin.login');
    }

    public function create(){
        return view('admin.create');
    }

    public function store(AdminRequest $request){
        $data = array();
        $data['admin_name'] = $request->admin_name;
        $data['admin_email'] = $request->admin_email;
        $data['admin_password'] = Hash::make($request ->admin_password);
        $data['admin_roles'] = $request->admin_roles;
        $user_id = DB::table('admin')->insertGetId($data);
        Session::put('Thongbao','Tạo tài khoản thành công');       
        return redirect::to('/create-admin');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }

    public function dashboard(Request $request){        
        $admin = Admin::where([['admin_email', '=', $request->admin_email]])
        ->first();
    if (Hash::check($request->admin_password, $admin->admin_password)) {
        Session::put('admin_name', $admin->admin_name);

        return redirect::to('/dashboard');
    }
    Session::put('message','Mật khẩu hoặc tài khoản bị sai');
    return redirect()->back();
        
    }   

    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        
        return redirect::to('/admin');
    }

    public function list_user(){
        $order = Order::all();
        $customers = Customer::paginate(10);
        return view('customer.list', compact('customers','order'));
    }
}
