@extends('layout.master')
@include('layout.side-bar')
@include('layout.headerAdmin')
@section('content')
    <div class="main-content">
        <div class="main">
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
                    <h2>
                        <a href="">Sửa danh mục sản phẩm</a>
                    </h2>
                       
                    <form action="{{URL::to('update-category/'.$category->id) }}" method="post" class="form-inline" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-group mt-3" style="width: 100%">
                                <input name="category" type="text" placeholder="{{$category->name}}">
                            </div>
                            <div class="input-group mt-3">
                                <button type="submit" class="btn btn-danger">Sửa</button>
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
.input-group input {
    width: 100%;
    height: 50px;
    font-size: 1.5rem;
    padding-left: 1rem;
    margin: 1.5rem 0;
}
</style>