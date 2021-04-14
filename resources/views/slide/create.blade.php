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
                        <a href="">Thêm Slide</a>
                    </div>
                        <form action="{{ URL::to('add-slide')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group mt-3">
                                    <label for="">Tên Slide</label>
                                    <input class="form-control" name="name" type="text">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Mô tả Slide</label>
                                    <input class="form-control" name="description" type="text">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="">Hình ảnh Slide</label>
                                    <input class="form-control" name="image" type="file">
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-danger">Thêm Slide</button>
                                </div>
                        </form>
                </div>
            </section>
           </div>
       </div>
   </div>
@endsection
