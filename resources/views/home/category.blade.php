@extends('layout.master')
@include('layout.header')
@section('content')
<body>
    <div id ="menu" class="menu">
        <ul>
            <li class="active">
                <a href="{{ URL::to('/index') }}">Trang chủ</a>
            </li>
            <li>
                <a href="">Sản phẩm
                    <i class="ti-angle-down"></i>  
                </a>
                <ul class="submenu">
                    @foreach($categorys as $category)
                        <li><a href="{{URL::to('/category/'.$category->id)}}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="">Tin tức</a></li>
            <li><a href="">Liên hệ</a></li>                   
        </ul> 
        <div class="search-btn">
            <form action="{{ URL::to('/search') }}" method="post">
                {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keywords" placeholder="Tìm kiếm.." aria-label="Recipient's username">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                    </div>               
            </form>                        
        </div> 
        <div id="menu-icon" class="menu-icon">
            <i class="ti-align-justify"></i>
        </div>     
    </div> 
    <div class="slide">
        <div id="demo" class="carousel " data-ride="carousel">
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
                    <img class="d-block " src="{{ asset('/storage/image/'.$slide->image) }}" width="100%" >
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
    <div class="content">
        <div class="container">            
            @foreach($products as $pro)
                <div class="box col-lg-4 col-md-4 col-sm-6 col-xs-6">
                    <form action="{{Route('cart',$pro->id)}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="card">
                            <div class="d-flex justify-content-around mt-2">
                                <img src="{{ asset('/storage/image/'.$pro->image) }}" height="160" width="220px">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title ">{{$pro->name}}</h5>
                                @if ($pro->price * $pro->discount == 0)
                                <h6 class="card-title">Giá: {{number_format($pro->price)}} VNĐ</h6>
                                @else
                                <strike class="card-title">Giá: {{number_format($pro->price)}} vnđ</strike>
                                <h6 class="card-title">Giảm giá: {{ number_format($pro->price - (( $pro->price *
                                    $pro->discount)/100)) }} VNĐ</h6>
                                @endif
                            </div>
                            <div class="quantity">
                                <h6>Số lượng</h6>
                                <input class="input" name="qty" type="number" min="1" value="1">
                                <input name="productid_hidden" type="hidden" value="{{$pro->id}}">
                                <button type="submit" class="btn btn-primary mb-2">Mua hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
            <span class="pagination justify-content-center">{{ $products->render() }}</span>
        </div>     
    </div>            
</body>
<script>
    var menu = document.getElementById('menu');
    var menuIcon = document.getElementById('menu-icon');
    var menuHeight = menu.clientHeight;

        menuIcon.onclick = function () {
            var closeIcon = menu.clientHeight === menuHeight;
            if (closeIcon) {
                menu.style.height = 'auto';
            } else {
                menu.style.height = null;
            }
        }

</script>
@include('layout.footer')
</html>
@endsection