@extends('layout.master')
@include('layout.header')
@section('content')
<body>
    <div class="mt-3 mx-4 text-primary">
        <a href="{{ URL::to('/home') }}">Trang chủ</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="menu col-8 ">       
            <ul class="parent col-lg-12 col-md-12 col-sm-6 col-xs-8">
                <li class="active"> <a href="{{ URL::to('/home') }}"> Trang chủ </a></li>
                <li> <a href=""> Sản phẩm </a>
                    <ul class="submenu">
                        @foreach($categorys as $category)
                        <li><a href="{{URL::to('/home/category/'.$category->id)}}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li> <a href=""> Tin tức </a></li>
                <li> <a href=""> Liên hệ </a></li>               
            </ul>
            </div>  
            <div class="col-4">
                <form action="{{ URL::to('/search') }}" method="post">
                {{ csrf_field() }}
                    <input type="text" placeholder="Tìm kiếm sản phẩm" name="keywords">
                    <input type="submit" class="btn btn-success btn-sm mt-1" value="Tìm kiếm" name="search">                           
                </form> 
            </div>     
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
            <div class="carousel-inner col-12">
                @php
                $i = 0;
                @endphp
                @foreach ($slides as $slide)
                @php
                $i++;
                @endphp
                <div class="carousel-item {{ $i == 1 ? 'active' :''}}">
                    <img class="d-block " src="{{ asset('/storage/image/'.$slide->image) }}" width="100%" height="500">
                </div>
                @endforeach
            </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>  
    <div class="container">
        <div class="row mt-4">
        @foreach($products as $pro)
            <div class="box col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <form action="{{Route('cart',$pro->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card">
                    <div class="d-flex justify-content-around mt-2">
                        <img src="{{ asset('/storage/image/'.$pro->image) }}" height="160" width="220px">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title ">{{$pro->name}}</h5>
                        @if ($pro->price * $pro->discount == 0)
                        <h6 class="card-title">Giá: {{number_format($pro->price)}} vnđ</h6>
                        @else
                        <strike class="card-title">Giá: {{number_format($pro->price)}} vnđ</strike>
                        <h6 class="card-title">Giảm giá: {{ number_format($pro->price - (( $pro->price * $pro->discount)/100)) }} vnđ</h6>
                        @endif
                    </div>
                    <div class="di">
                        <h6>Số lượng</h6>
                        <input class="input" name="qty" type="number" min="1" value="1">
                        <input name="productid_hidden" type="hidden" value="{{$pro->id}}">
                        <button type="submit" class="btn btn-primary mt-2 "> Mua hàng </button>
                    </div>
                </div>
                </form>
            </div>
        @endforeach
        </div>
        <span class="pagination justify-content-center">{{ $products->render() }}</span>
    </div>
</body>
@endsection


