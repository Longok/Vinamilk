@extends('layout.master')
@section('content')
@include('layout.header')
<div class="container" style="margin-top: 120px">   
    <div class=" col-md-12 col-xs-12 mx-auto">
        <div class="col-md-12 col-xs-12 mx-auto text-center">
            <a href="{{ URL::to('/index') }}">Trang chủ</a>
            <h5>Giỏ hàng của bạn</h5> 
        </div>       
        <?php
            $content = Cart::content()
        ?>
        @if(count($content))
        <table class="col-md-12 col-xs-12 mx-auto text-center info text-light">
            <thead>
                <tr class="cart-menu text-center">
                    <td>Sản phẩm</td>
                    <td>Tên sản phẩm</td>
                    <td>Giá</td>
                    <td>Số lượng</td>
                    <td>Tổng</td>
                    <td>Xóa</td>
                </tr>
            </thead>
            <tbody>
                @foreach($content as $v_content)
                <tr class="cart-content">
                    <td class="cart_product pt-2">
                        <img src="{{ asset('/storage/image/'.$v_content->options->image) }}" >
                    </td>
                    <td class="cart-name">
                        <a href="">{{ $v_content->name}}</a>
                    </td>
                    <td class="cart-price">
                        @if ($v_content->price * $v_content->discount == 0)
                        <p> {{number_format($v_content->price)}} vnđ</p>
                        @else
                        <p> {{ number_format($v_content->price - (( $v_content->price *
                            $pro->discount)/100)) }} vnđ</p>
                        @endif
                    </td>
                    <td class="cart-quantity">
                        <div class="cart-quantity-button">
                            <form action="{{URL::to('/update-cart')}}" method="post">
                                {{csrf_field()}}
                                <input class="cart_quantity_input text-center" type="text" name="quantity"
                                    value="{{$v_content->qty}}" autocomplete="off" size="2">
                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart">
                                <input type="submit" value="Thay đổi">
                            </form>
                        </div>
                    </td>
                    <td class="total">
                        <p class="cart-total-price">{{ number_format($v_content->price * $v_content->qty)}} vnđ</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart-quantity-delete" href="{{ URL::to('/delete-cart/'.$v_content->rowId)}}"><i
                            class="fa fa-times"></i>Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
    <div class="col-md-4 col-xs-4 mx-auto float-left mb-5 mt-5">        
        <div class="">
            <ul>
             
                <li><a href="" class="breadcrumb">Tổng tiền: {{cart::subtotal(0).'vnđ'}}</a></li>
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

    @media (max-width: 740px) {
        .info {
            font-size: 12px;
            text: center;
        }
        .table-condensed {
            font-size: 13px;
            color: white;
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
    .cart-menu {
        background: linear-gradient(45deg, #40b2f5, #ffbc00);
        color: white;
    }

    .cart-name > a {
        color: white;
    }

    .cart-content {
        color: white;
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
</style>

@endsection