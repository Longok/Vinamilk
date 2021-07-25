@extends('layout.master')
@section('content')
@include('layout.header')
<body>
    <div id="menu">
        <ul>
            <li class="active">
                <a href="{{ URL::to('/index') }}">Trang chủ</a>
            </li>
            <li>
                <a href="#">Sản phẩm
                    <i class="ti-angle-down"></i>  
                </a>
                <ul class="submenu">
                    @foreach($categorys as $category)
                        <li><a href="{{URL::to('/category/'.$category->id)}}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ URL::to('/news') }}">Tin tức</a></li>
            <li><a href="#">Liên hệ</a></li>                   
        </ul> 
        <div class="search-btn">
            <form action="{{ URL::to('/search') }}" method="post">
                {{ csrf_field() }}
                    <div class="search-box">
                        <img src="{{ asset('storage/image/search.png.png')}}">
                        <input type="text" class="form-control" name="keywords" placeholder="Tìm kiếm.." aria-label="Recipient's username">
                        <!-- <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div> -->
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
            <div class="carousel-inner">
                @php
                $i = 0;
                @endphp
                @foreach ($slides as $slide)
                @php
                $i++;
                @endphp
                <div class="carousel-item {{ $i == 1 ? 'active' :''}}">
                    <img src="{{ asset('/storage/image/'.$slide->image) }}" width="100%">
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
                <div class="box col-lg-4 col-md-4 col-sm-6 col-xs-6 mt-2">
                    <form>
                    @csrf
                        <input type="hidden" value="{{ $pro->id }}" class="product_id_{{ $pro->id }}">
                        <input type="hidden" value="{{ $pro->name }}" class="product_name_{{ $pro->id }}">
                        <input type="hidden" value="{{ $pro->image }}" class="product_image_{{ $pro->id }}">

                        @if (!$pro->discount)
                            <input type="hidden" value="{{ $pro->price }}" class="product_price_{{ $pro->id }}">
                        @else
                            <input type="hidden" value="{{ $pro->price - $pro->price * $pro->discount/100 }}" class="product_price_{{ $pro->id }}">
                        @endif
                        <div class="card">
                            <div class="card-image d-flex justify-content-around mt-2">
                                <img src="{{ asset('/storage/image/'.$pro->image) }}" height="160">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title ">{{$pro->name}}</h5>
                                @if ($pro->price * $pro->discount == 0)
                                <h6 class="card-title">Giá: {{number_format($pro->price)}} VNĐ</h6>
                                @else
                                <strike class="card-title">Giá: {{number_format($pro->price)}} VNĐ</strike>
                                <h6 class="card-title">Giá: {{ number_format($pro->price - (( $pro->price *
                                    $pro->discount)/100)) }} VNĐ</h6>
                                @endif
                            </div>
                            <div class="quantity">
                                <input id="quantity" class="product_quantity_{{ $pro->id }}" name="qty" type="number" min="1" value="1">
                                <input name="productid_hidden" type="hidden" value="{{$pro->id}}">
                                <button type="button" class="btn btn-success add-cart-ajax" data-id_product="{{$pro->id}}">Mua hàng</button>
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
    show_cart();
        function show_cart(){
            $.ajax({
                url:'{{ url('/show-cart') }}',
                method: "GET",
                success:function(data){
                    $('.show-cart').html(data);
                }
            });
        }     

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
    //add-cart-ajax
    $(document).ready(function (){
        $('.add-cart-ajax').click(function(){
            var id = $(this).data('id_product');
            var product_id = $('.product_id_'+ id).val();
            var product_name = $('.product_name_'+ id).val();
            var product_image = $('.product_image_'+ id).val();
            var product_price = $('.product_price_'+ id).val();
            var product_quantity = $('.product_quantity_'+ id).val();
            var _token = $('input[name="_token"]').val();
        
            $.ajax({
                url: '{{url('/add-cart-ajax')}}',
                method: 'POST',
                data: { product_id:product_id,
                    product_name:product_name,
                    product_image:product_image,
                    product_price:product_price,
                    product_quantity:product_quantity,
                    _token:_token,
                },
                success:function(data){
                    swal("Good job!", "Thêm vào giỏ hàng thành công!", "success");
                    // alert(data);   
                    show_cart();            
                }

            });
        });
    });    
</script>
@include('layout.footer')
@endsection