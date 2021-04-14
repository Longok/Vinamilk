@extends('layout.master')
@section('content')
<div class="mx-5 text-primary">
    <h6><a href="{{URL::to('/admin')}}">Trang Admin</a></h6>
</div>
   <div class="container">
       <div class="row">
           <div class="col-md-12">
            <section class="panel mt-3">
                <div class="col-md-4 mx-auto">

                </div>
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
                        <a href="">Thêm danh mục sản phẩm</a>
                    </div>
                    <form action="{{route('add-category')}}" method="post" class="form-inline" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-group mt-3" style="width: 100%">
                                <input class="form-control" name="category" type="text" placeholder="Tên danh mục">
                            </div>
                            <div class="input-group mt-3">
                                <button type="submit" class="btn btn-danger">Thêm danh mục</button>
                            </div>

                    </form>
                </div>
            </section>
           </div>
       </div>
   </div>
@endsection
