@extends('layout.master')
@include('layout.header')
@section('content')
<div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
    </nav>
    <div class="table-reponsive cart_info">
        <?php
            $content = Cart::content()
        ?>
        @if(count($content))
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <td class="image">Sản phẩm</td>
                    <td class="description">Tên sản phẩm</td>
                    <td class="price">Giá</td>
                    <td class="quantity">Số lượng</td>
                    <td class="total">Tổng</td>
                    <td>Xóa</td>
                </tr>
            </thead>
            <tbody>
                @foreach($content as $v_content)
                <tr>
                    <td class="cart_product">
                        <img src="{{ asset('/storage/image/'.$v_content->options->image) }}" height="150" width="150px">
                    </td>
                    <td class="cart_name">
                        <h4> <a href="">{{ $v_content->name}}</a> </h4>
                    </td>
                    <td class="cart_price">
                        @if ($v_content->price * $v_content->discount == 0)
                        <h6 class="card-title">{{number_format($v_content->price)}} VNĐ</h6>
                        @else
                        <h6 class="card-title">{{ number_format($v_content->price - (( $v_content->price *
                            $pro->discount)/100)) }} VNĐ</h6>
                        @endif
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
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
                        <p class="cart_total_price">{{ number_format($v_content->price * $v_content->qty)}} VNĐ</p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{ URL::to('/delete-cart/'.$v_content->rowId)}}"><i
                                class="fa fa-times"></i>Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
    <div class="col-sm-3 float-right">        
        <div class="breadcrumb">
            <ul>
                <li class="breadcrumb">Thành tiền: {{cart::subtotal(0).'VNĐ'}}</li>
                <li class="breadcrumb">Phí vận chuyển: Free </li>
                <!-- <li class="breadcrumb">Tổng tiền: {{cart::total(0).'VNĐ'}}</li> -->
            </ul>
            <?php
                $customer_id = Session::get('customer_id');
                if($customer_id != null){
            ?>  
                <a href="{{ URL::to('/check-out')}}"><i class="fas fa-thumbs-up"></i></i> Thanh toán</a> 
            <?php
                }else{
            ?>
                <a href="{{ URL::to('/login')}}"><i class="fas fa-thumbs-up"></i></i> Thanh toán</a>
            <?php
                }
            ?>                    
        </div>
    @else
        <p>Bạn chưa có sản phẩm nào</p>      
    @endif 
    </div>      
</div>
<style>
    .cart_menu {
        background: linear-gradient(45deg, #40b2f5, #ffbc00);
        color: white;
    }
</style>
@endsection