<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\News;
use App\Category;
use App\Slide;
use Session;

class NewsController extends Controller
{

    public function index(){
        $news = News::orderBy('id','DESC')->paginate(6);
        $categorys = Category::all();
        $slides = Slide::all();
        return view('news.index', compact('categorys','slides','news'));
    }

    public function create(){

        return view('news.create');
    }

    public function store(Request $request){
        $news = new News;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName('image');
        $file->move('storage/image',$fileName);
        $news->title = $request->title;
        $news->description = $request->description;
        $news->content = $request->content;
        $news->image = $fileName;
        Session::put('Thongbao','Thêm bài viết thành công');
        $news->save();
        
        return redirect()->back();
    }

    public function detail($id){

        $news = News::find($id);
        $list_news = News::all();
        $categorys = Category::all();
        $slides = Slide::all();
        return view('news.detail', compact('categorys','slides','news','list_news'));
    }

}
