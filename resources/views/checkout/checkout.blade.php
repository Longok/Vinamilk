@extends('layout.master')
@section('content')
@include('layout.header')
<div class="container mt-5"> 
<form action="{{URL::to('/save-info-customer')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">         
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/index') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thông tin đơn hàng</li>
        </ol>
        
        <div class="text-center mt-5">
            <h2>Vui lòng điền thông tin gửi hàng</h2>          
        </div> 
    </nav>    
        <div class="row mt-4 text-dark">    
            <div class="col-md-8 col-xs-12 mx-auto">                                                   
                    <div class="mt-3">            
                        <label class="info">Tên người đặt hàng</label> 
                        <input type="text"class="form-control" value="{{ old('shipping_name')}}" placeholder="Họ và tên" name="shipping_name">        
                    </div>
                    <div class="mt-3">            
                        <label class="info">Số điện thoại</label>       
                        <input type="text"class="form-control" value="{{ old('shipping_phone')}}" placeholder="Số điện thoại" name="shipping_phone">        
                    </div>
                    <div class="mt-3">            
                        <label class="info">Email</label>       
                        <input type="text"class="form-control" value="{{ old('shipping_email')}}" placeholder="Email" name="shipping_email">        
                    </div>
                    <div class="mt-3">            
                        <label class="info">Địa chỉ</label>      
                            <!-- <select class="form-control choose city" name="city" id="city" >
                                    <option value="0">--Chọn thành phố--</option>
                                    @foreach($thanhpho as $key => $tp)       
                                        <option value="{{$tp->matp}}">{{$tp->name}}</option>        
                                    @endforeach
                            </select>
                            <select class="form-control mt-3 choose districts" name="districts" id="districts" >
                                    <option value="0">--Chọn quận huyện--</option>
                                    @foreach($quanhuyen as $key => $qh)       
                                        <option value="{{$qh->maqh}}">{{$qh->name}}</option>        
                                    @endforeach
                            </select> 
                            <select class="form-control mt-3 choose wards" name="wards" id="wards" >
                                    <option value="0">--Chọn xã phường--</option>
                                    @foreach($xaphuong as $key => $xp)       
                                        <option value="{{$xp->xaid}}">{{$xp->name}}</option>        
                                    @endforeach
                            </select> -->
                        <input type="text"class="form-control" value="{{ old('shipping_adress')}}" placeholder="Địa chỉ nhận hàng" name="shipping_adress">                  
                    </div>                        
            </div>                   
            <div class="col-md-8 col-xs-12 mx-auto">
                <div class="mt-3">            
                    <label class="info">Ghi chú</label>                               
                    <textarea type="text" class="form-control ckeditor" placeholder="Ghi chú" name="shipping_note" ></textarea> 
                </div>                
                <h4 class="mt-3">
                    Chọn hình thức thanh toán:
                </h4>
                <div class="payment text-primary mt-3">
                    <span>
                        <label><input name="shipping_method" type="checkbox" value="ATM">Thanh toán ATM</label>        
                    </span>        
                    <span>
                        <label><input name="shipping_method" type="checkbox" value="Tiền mặt">Thanh toán tiền mặt</label>
                    </span>
                    <span>
                        <label><input name="shipping_method" type="checkbox" value="VN-Pay">Thanh toán VN-Pay</label>        
                    </span>           
                </div>   
                <button type="submit" name="thanhtoan" class="btn mt-3 thanhtoan">Đặt hàng</button>  
            </div> 
            <div class="col-md-8 col-xs-12 mx-auto">
                <div class="">
                    <?php
                        // dd(Session::get('cart'));           
                    ?>
                    @if(Session::get('cart') !=null)
                        <table class="col-md-10 col-xs-10 mx-auto text-center">
                            <thead>
                                <tr class="cart_menu">
                                    <th>Sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá (đ)</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th class="mt-3">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(Session::get('cart') as $key => $v_content)
                                <tr>
                                    <td class="cart_product">
                                        <img src="{{ asset('/storage/image/'.$v_content['image']) }}" height="100" width="100">
                                    </td>
                                    <td class="cart_name">
                                        <h5> <a href="">{{ $v_content['name']}}</a></h5>
                                    </td>
                                    <td class="cart_price">
                                       
                                        <h5 class="card-title">{{ number_format($v_content['price'],0,',','.')}}</h5>
                                      
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">                                          
                                            <input class="input_quantity" type="number" name="quantity"
                                            value="{{ $v_content['quantity']}}" autocomplete="off" size="3">                                               
                                        </div>
                                    </td>
                                    <td class="total">
                                        <h5 class="cart_total_price">{{number_format($v_content['price']*$v_content['quantity'],0,',','.')}}</h5>
                                    </td>
                                    <td class="cart_delete mt-5">
                                        <a class="cart_quantity_delete" href="{{ URL::to('/delete-cart/')}}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else          
                    @endif 
                </div> 
            </div>                                  
        </div>        
    </form>    
</div> 
@include('layout.footer')
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if(action =='city'){
                result = 'districts';
            }else{
                result = 'wards';    
            }
            $.ajax({
                url:'{{url('/adress')}}',
                method: 'post',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);    
                }
            });
        });  
    })
</script> 
<style>

    td {
        font-size: 1.5rem;
     } 
    .payment label {
        font-size: 1.5rem;
    }  
    .info {
        font-size: 1.5rem;
    }
  
    .container {
        margin: 5rem auto;
    }
    .cart_product img {
        width: 80px;
        height: 80px;
    }
    @media (max-width: 740px) {
        .info {
            font-size: 12px;
            text: center;
        }
        .cart_product img {
        width: 60px;
        height: 60px;
    }
    }    
</style>                 
@endsection