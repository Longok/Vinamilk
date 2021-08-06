<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Product;
use App\Cart;
use App\Slide;
use Session;
use Auth;

use Illuminate\Support\Facades\Hash;
// Session_start();

class HomeController extends Controller
{
    public function index()
    {
        
        $categorys = Category::all();
        $products = Product::orderBy('id','desc')->paginate(12);
        $slides = Slide::all();
        return view('/index', compact('categorys','products','slides'));
    }

    public function category($id)
    {
        $slides = Slide::all();
        $categorys = Category::all();
        $products = Product::where('category_id',$id)->paginate(12);
        return view('home.category', compact('products','categorys','slides'));
    }

    public function search(Request $request){
        $categorys = Category::all();    
        $slides = Slide::all();
        $keywords = $request->keywords;
        $search = Product::where('name','like','%'.$keywords.'%')->get();
        return view('home.search', compact('categorys','search','slides'));
    }

}
