<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categorys = Category::paginate(10);
        return view('category.index', compact('categorys'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = New Category;
        $data->name = $request->category;
        Session::put('Thongbao','Thêm danh mục thành công');
        $data->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $updateCategory = Category::find($id);
        $updateCategory->name = $request->category;
        Session::put('Thongbao','Sửa danh mục thành công');
        $updateCategory->save();
        return Redirect::to('all-category');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return Redirect::to('all-category');
    }
}
