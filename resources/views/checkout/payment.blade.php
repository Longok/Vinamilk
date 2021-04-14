@extends('layout.master')
@include('layout.header')
@section('content')
<div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thanh toán đơn hàng</li>
        </ol>
    </nav>
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
        @else          
        @endif 
    </div> 
    <div class="breadcrumb-item active">
        Chọn hình thức thanh toán:
    </div>
    <form action="{{URL::to('/order')}}" method="post">
    {{ csrf_field()}}
        <div class="payment">
            <span>
                <label><input name="payment_method" type="checkbox" value="ATM">Thanh toán bằng ATM</label>        
            </span>        
            <span>
                <label><input name="payment_method" type="checkbox" value="Tiền mặt">Thanh toán bằng tiền mặt</label>
            </span>
            <span>
                <label><input name="payment_method" type="checkbox" value="VN-Pay">Thanh toán bằng VN-Pay</label>        
            </span>
            
        </div>
        <button type="submit" name="order" class="btn btn-success btn-md ">Đặt hàng</button>
    </form>     
</div>
<style>
    .cart_menu {
        background: linear-gradient(45deg, #40b2f5, #ffbc00);
        color: white;
    }
</style>
@endsection