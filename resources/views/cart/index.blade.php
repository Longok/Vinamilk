@extends('layout.master')
@include('layout.header')
@section('content')

<div class="container" style="margin-top: 120px">   
    <div class=" col-md-12 col-xs-12 mx-auto">
        <div class="col-md-12 col-xs-12 mx-auto text-center d-flex">
            <h3><a href="{{ URL::to('/index') }}">TRANG CHỦ |</a></h3>
            <h4 class="text-dark">Giỏ hàng của bạn</h4> 
        </div>    
        <div class="alert-success mt-5 mb-3 text-center">
            <?php
                $message = Session::get('message');
                    if($message){
                    echo '<span>'.$message.'</span>';
                    session::put('message',null);
                    }
            ?>
        </div>
        @if(Session::get('cart') !=null)
        <table class="col-md-12 col-xs-12 mx-auto text-center">
            <thead>
                <tr class="cart-menu text-center">
                    <td>Sản phẩm</td>
                    <td>Giá (đ)</td>
                    <td>Số lượng</td>
                    <td>Tổng</td>
                    <td>Xóa</td>
                </tr>
            </thead>
            <tbody>
            @php
                $total = 0;
                $totalquanty = 0;
            @endphp
            @foreach(Session::get('cart') as $key => $val) 
                @php    
                    $subTotal = $val['price']*$val['quantity'];
                    $total += $subTotal;
                    $totalquanty += $val['quantity'];
                @endphp
                <tr class="cart-content">
                    <td class="cart_product pt-2">
                        <img src="{{ asset('/storage/image/'.$val['image']) }}" >
                        <h4>{{$val['name']}}</h4>
                    </td>
                    <td class="cart-price">                      
                        <h4> {{ number_format($val['price'],0,',','.')}}</h4>                  
                    </td>
                    <td class="cart-quantity">
                        <div class="cart-quantity-button">
                            <form action="{{URL::to('/update-cart')}}" method="post">
                                {{csrf_field()}}
                                <input class="cart_quantity_input text-center" type="text" name="update_quantity[{{$val['id']}}]"
                                    value="{{$val['quantity']}}" autocomplete="off" size="2">
                                <input type="submit" value="Thay đổi">
                            </form>
                        </div>
                    </td>
                    <td class="total">
                        <h4 class="cart-total-price"> {{number_format($subTotal,0,',','.')}}</h4>
                    </td>
                    <td class="cart_delete">
                        <a class="cart-quantity-delete" href="{{ URL::to('/delete-cart/'.$val['id'])}}">Xóa</a>
                    </td>
                </tr>
            @endforeach  
            </tbody>
        </table>
    </div>    
    <div class="col-md-4 col-xs-4 mx-auto float-right mb-5 mt-5">        
        <div class="checkout">
            <ul>
                <li><a href="" class="breadcrumb bg-success text-dark">Tổng tiền:{{number_format($total,0,',','.')}} đ</a></li>
            </ul>
            
            @if(Auth::check())
               
                <a href="{{ URL::to('/check-out')}}"><i class="fas fa-thumbs-up"></i>Thanh toán</a>
                
                @else 
                
                <a href="{{ URL::to('/login')}}"><i class="fas fa-thumbs-up"></i>Thanh toán</a>
                
                @endif               
        </div>
    @else
        <div class="text-danger mx-auto text-center">
            <h3>Bạn chưa có sản phẩm nào</h3>
        </div>            
    @endif          
    </div>      
</div>
<style>

.cart-menu td {
    font-size: 1.5rem;
}

.checkout a {
    font-size: 1.5rem;
}

.cart_delete a {
    margin-top: 50%;
    font-size: 1.3rem;
}

.cart-quantity-button input {
    font-size: 1.3rem;
}

.cart_quantity_input {
    font-size: 1.3rem;
}

.cart-menu {
    background: linear-gradient(45deg, #40b2f5, #ffbc00);
    color: black;
}
.cart-name > a {
    color: black;
}
.cart-content {
    color: black;
}
ul li, li > a {
    list-style: none;
    text-decoration: none;
    font-size: 14px;
}
.cart_product img {
    width: 100px;
    height: 100px;
} 

@media (max-width: 740px) {
    .info {
        font-size: 12px;
        text: center;
    }
    .table-condensed {
        font-size: 13px;
        color: black;
    }
    .breadcrumb {
        font-size: 15px;
        width: 230px;
        height: 40px;
    }
    .cart_product img {
        color: #000;
    }
    ul li, li > a {
    font-size: 12px;
    }
}
</style>
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
</script>
@endsection