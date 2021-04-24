@extends('layout.master')
@section('content')
@include('layout.header')
<div class="container"> 
<form action="{{URL::to('/save-info-customer')}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">         
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thông tin đơn hàng</li>
        </ol>
        
        <div class="text-center">
            <p>Vui lòng điền thông tin gửi hàng</p>          
        </div> 
    </nav>    
        <div class="row mt-4 text-primary">    
            <div class="col-6 mx-auto">  
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
                <div class="col-md-12">              
                    <div class="mt-3">            
                        <label for="">Tên khách hàng</label> 
                        <input type="text"class="form-control" value="{{ old('shipping_name')}}" placeholder="Họ và tên" name="shipping_name">        
                    </div>
                    <div class="mt-3">            
                        <label for="">Số điện thoại</label>       
                        <input type="text"class="form-control" value="{{ old('shipping_phone')}}" placeholder="Số điện thoại" name="shipping_phone">        
                    </div>
                    <div class="mt-3">            
                        <label for="">Email</label>       
                        <input type="text"class="form-control" value="{{ old('shipping_email')}}" placeholder="Email" name="shipping_email">        
                    </div>
                    <div class="mt-3">            
                        <label for="">Địa chỉ</label>      
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
                        <button type="submit" name="thanhtoan" class="btn btn-success btn-md mt-3 thanhtoan">Gửi</button>
                    </div>                        
                    
                </div> 
            </div>                   
            <div class="col-md-6">
                <div class="mt-3">            
                    <label for="">Ghi chú</label>                               
                    <textarea type="text" class="form-control ckeditor" placeholder="Ghi chú" name="shipping_note" ></textarea> 
                </div>                
                <div class="breadcrumb-item active">
                    Chọn hình thức thanh toán:
                </div>
                <div class="payment">
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
            </div> 
            <div class="col-12">
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
                                            <input class="input" type="number" name="quantity"
                                            value="{{$v_content->qty}}" autocomplete="off" size="2">                                               
                                        </div>
                                    </td>
                                    <td class="total">
                                        <p class="cart_total_price">{{ number_format($v_content->price * $v_content->qty)}} VNĐ</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="{{ URL::to('/delete-cart/'.$v_content->rowId)}}"><i
                                            class="fa fa-times"></i></a>
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
@endsection