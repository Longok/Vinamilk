@extends('layout.master')
@section('content')
@include('layout.header')
<body>
    
    
    </div> 
    <div class="slide mb-5">
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
    
    <section class="cards">    
            @foreach($search as $pro)
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
                        <input id="quantity" type="hidden" min="1" value="1" class="product_quantity_{{ $pro->id }}">        
                        <img class="card-image mt-2"src="{{ asset('/storage/image/'.$pro->image) }}">
                        <div class="card-content">
                            <div class="card__top">
                                <h3 class="card-name ">{{$pro->name}}</h3>
                                @if ($pro->price * $pro->discount == 0)
                                <h3 class="card-price">{{number_format($pro->price)}} $</h3>
                                @else
                                <strike class="card-price">{{number_format($pro->price)}} $</strike>
                                <h3 class="card-price">{{ number_format($pro->price - (( $pro->price *
                                    $pro->discount)/100)) }} $</h3>
                                @endif
                            </div>
                            <div class="card__bottom">
                                <input id="quantity" class="product_quantity_{{ $pro->id }}" name="qty" type="hidden" min="1" value="1">
                                <input name="productid_hidden" type="hidden" value="{{$pro->id}}">
                                <button type="button" class="add-cart-ajax btn" data-id_product="{{$pro->id}}">
                                    <i class="fas fa-shopping-cart"></i>
                                        Thêm vào giỏ
                                </button>
                            </div>
                        </div>                           
                        
                    </form>
                </div>
            @endforeach       
    </section>  
      
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
                url: 'add-cart/',
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
                    show_cart();            
                }
            });
        });
    });    
</script>
@include('layout.footer')
@endsection