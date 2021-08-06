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
    <div class="cards">    
            @foreach($products as $pro)
                <div class="card__item">
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
                                 
                        <img class="card-image mt-2"src="{{ asset('/storage/image/'.$pro->image) }}">
                        <div class="card-content">
                            <div class="card__top">
                                <h5 class="card-name ">{{$pro->name}}</h5>
                                @if ($pro->price * $pro->discount == 0)
                                <h6 class="card-title">{{number_format($pro->price)}} đ</h6>
                                @else
                                <strike class="card-title">{{number_format($pro->price)}} đ</strike>
                                <h6 class="card-title">{{ number_format($pro->price - (( $pro->price *
                                    $pro->discount)/100)) }} đ</h6>
                                @endif
                            </div>
                            <div class="card__bottom">
                                <input id="quantity" class="product_quantity_{{ $pro->id }}" name="qty" type="number" min="1" value="1">
                                <input name="productid_hidden" type="hidden" value="{{$pro->id}}">
                                <button type="button" class="add-cart-ajax" data-id_product="{{$pro->id}}">Mua hàng</button>
                            </div>
                        </div>                           
                        
                    </form>
                </div>
            @endforeach
            
         
    </div>  
    <span class="pagination justify-content-center mt-3">{{ $products->render() }}</span>           
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