<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\SlideRequest;
use App\Slide;
use Session;

class SlideController extends Controller
{
   
    public function create()
    {
        $slides = Slide::all();
        return view('slide.create',compact('slides'));
    }

    public function store( SlideRequest $request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName('image');
        $file->move('storage/image',$fileName);

        $slide = New Slide;
        $slide->name = $request ->name;
        $slide->description = $request ->description;
        $slide->image = $fileName;
        Session::put('Thongbao','Thêm Slide thành công');
        $slide->save();

        return Redirect::to('slide');
    }

    public function index()
    {
        $slides = Slide::all();
        return view('slide.index',compact('slides'));
    }

    public function delete($id)
    {
        $slide = Slide::find($id);
        $slide->delete();

        return Redirect::to('all-slide');
    }
}
