@extends('layout.master')
@include('layout.side-bar')

@section('content')

    <div class="main-content"> 
    @include('layout.headerAdmin')
        <div class="main">
            <section class="panel mt-3">
                <div class=" col-md-8 col-xs-12 mx-auto">
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
                    <h2>
                        <a href="">Thêm sản phẩm</a>
                    </h2>
                        <form action="{{Route('add-product')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group mt-3">
                                    <label class="info">Tên sản phẩm</label>
                                    <input class="form-control" name="name" type="text">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="info">Mô tả sản phẩm</label>
                                    <input class="form-control" name="description" type="text">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="info">Số lượng sản phẩm</label>
                                    <input class="form-control" name="quantity" type="text">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="info">Giá sản phẩm</label>
                                    <input class="form-control" name="price" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="info">Giảm giá sản phẩm</label>
                                    <select name="discount" class="form-control input-sm m-bot15">
                                        <option value="0">0%</option>
                                        <option value="10">10%</option>
                                        <option value="20">20%</option>
                                        <option value="30">30%</option>
                                        <option value="50">50%</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="info">Hình ảnh sản phẩm</label>
                                    <input class="form-control" name="image" type="file">
                                </div>
                                <div class="form-group mt-3">
                                    <label class="info">Danh mục sản phẩm</label>
                                    <select name="category_id" class="form-control input-sm m-bot15">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                               </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-danger">Thêm sản phẩm</button>
                                </div>
                        </form>
                </div>
            </section>
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