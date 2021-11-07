@extends('layout.master')
@include('layout.side-bar')
@section('content')

    <div class="main-content">
    @include('layout.headerAdmin')
        
        <div class="main">

            <div>
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

                        <h2><a href="">Thêm danh mục sản phẩm</a></h2>

                        <form action="{{route('add-category')}}" method="post" class="form-inline" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="input-group" style="width: 100%">
                                <input name="category" type="text" placeholder="Tên danh mục">
                            </div>

                            <div class="input-group">
                                <button type="submit" class="btn">Thêm danh mục</button>
                            </div>

                        </form>
                </div>           
            </div>                  
        </div>                          

    </div>

@endsection
<style>

    .main h2 a {
        text-decoration: none;
    }
    .input-group input {
        width: 100%;
        height: 50px;
        font-size: 1.5rem;
        padding-left: 1rem;
        margin: 1.5rem 0;
    }
</style>