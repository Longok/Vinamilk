@extends('layout.master')
@section('content')
<div class="mx-5 text-primary">
    <h6><a href="{{URL::to('/admin')}}">Trang Admin</a></h6>
</div>
   <div class="container">
       <div class="row">
           <div class="col-md-12">
            <section class="panel mt-3">
                <div class=" col-md-8 mx-auto">
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
                    <div class="mt-4">
                        <a href="">Sửa sản phẩm</a>
                    </div>
                        <form action="{{URL::to('/update-product/'.$products->id)}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group mt-3">
                                    <label for="">Tên sản phẩm</label>
                                    <input class="form-control" name="name" type="text" placeholder="{{ $products->name }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Mô tả sản phẩm</label>
                                    <input class="form-control" name="description" type="text" placeholder="{{ $products->desc }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Số lượng sản phẩm</label>
                                    <input class="form-control" name="quantity" type="text" placeholder="{{ $products->quantity }}">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Giá sản phẩm</label>
                                    <input class="form-control" name="price" type="text" placeholder="{{ $products->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Giảm giá sản phẩm</label>
                                    <select name="discount" class="form-control input-sm m-bot15" placeholder="{{ $products->discount }}">
                                        <option value="0">0%</option>
                                        <option value="10">10%</option>
                                        <option value="20">20%</option>
                                        <option value="30">30%</option>
                                        <option value="50">50%</option>
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Hình ảnh sản phẩm</label>
                                    <input class="form-control" name="image" type="file" >
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Danh mục sản phẩm</label>
                                    <select name="category_id" class="form-control input-sm m-bot15">
                                        <option value="0">Chọn danh mục</option>
                                            @foreach( $category as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-danger">Sửa sản phẩm</button>
                                </div>
                        </form>
                </div>
            </section>
           </div>
       </div>
   </div>
@endsection
