@extends('layout.master')
@include('layout.side-bar')
@section('content')

    <div class="main-content">
    @include('layout.headerAdmin')
        
        <div class="main">
            <div class="col-8 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="alert-danger">
                    <?php
                        $message = Session::get('Thongbao');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span>';
                            session::put('Thongbao',null);
                        }
                    ?>
                </div>
                <h2 class="mt-4">
                    <a href="">Thêm bài viết</a>
                </h2>
                    <form action="{{URL::to('/add-news')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group mt-3">
                                <label class="info">Tiêu đề</label>
                                <input class="form-control" name="title" type="text">
                            </div>
                            <div class="form-group mt-3">
                                <label class="info">Mô tả ngắn</label>
                                <input class="form-control" name="description" type="text">
                            </div>
                            <div class="form-group mt-3">
                                <label class="info">Nội dung</label>
                                <textarea type="text" class="form-control ckeditor" placeholder="Nội dung" name="content" ></textarea> 
                            </div>                              
                            <div class="form-group mt-3">
                                <label class="info">Hình ảnh bài viết</label>
                                <input class="form-control" name="image" type="file">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-danger">Thêm bài viết</button>
                            </div>
                    </form>
            </div>
       </div>
   </div>
@endsection
<style>

    .main h2 a {
        text-decoration: none;
    }
    
    .form-group .info {
        font-size: 1.5rem;
    }

    select, option {
        font-size: 1.5rem;
    }
</style>