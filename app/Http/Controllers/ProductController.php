<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(10);
        $category = Category::orderBy('id','desc')->paginate(10);
        return view('products.index', compact('products','category'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName('image');
        $file->move('storage/image',$fileName);
        $product = New Product;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->desc = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->image = $fileName;
        Session::put('Thongbao','Thêm danh sản phẩm thành công');
        $product->save();

        return Redirect::to('product');
    }

    public function list($id)
    {
        $products = Product::where('category_id',$id)->paginate(10);

        return view('products.list', compact('products'));
    }

    public function edit($id)
    {
        $products = Product::find($id);
        $category = Category::all();
        return view('products.edit',compact('products','category'));
    }

    public function update(ProductRequest $request, $id)
    {
        $updateProduct = Product::find($id);
        $updateProduct->category_id = $request->category_id;
        $updateProduct->name = $request->name;
        $updateProduct->desc = $request->description;
        $updateProduct->quantity = $request->quantity;
        $updateProduct->price = $request->price;
        $updateProduct->discount = $request->discount;
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName('image');
        $file->move('storage/image',$fileName);
        $updateProduct->image = $fileName;
        Session::put('Thongbao','Sửa sản phẩm thành công');
        $updateProduct->save();

        return Redirect::to('all-product');
    }

    public function delete($id)
    {
        $products = Product::find($id);
        $products->delete();

        return Redirect::to('all-product');
    }
}
