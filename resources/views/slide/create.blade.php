@extends('layout.master')
@include('layout.side-bar')
@section('content')

    <div class="main-content"> 
    @include('layout.headerAdmin')
        <div class="main">
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
                    <h2>
                        <a href="">Thêm Slide</a>
                    </h2>
                        <form action="{{ URL::to('add-slide')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group mt-3">
                                <label class="info"> Tên Slide</label>
                                <input class="form-control" name="name" type="text">
                            </div>
                            <div class="form-group mt-3">
                                <label class="info"> Mô tả Slide</label>
                                <input class="form-control" name="description" type="text">
                            </div>

                            <div class="form-group mt-3">
                                <label class="info"> Hình ảnh Slide</label>
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