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
                        <input type="text"class="form-control" value="{{ old('name')}}" placeholder="Họ và tên" name="name">        
                    </div>
                    <div class="mt-3">            
                        <label for="">Số điện thoại</label>       
                        <input type="text"class="form-control" value="{{ old('phone')}}" placeholder="Số điện thoại" name="phone">        
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
                        <input type="text"class="form-control mt-3" value="{{ old('adress')}}" placeholder="Địa chỉ nhận hàng" name="adress">   
                        <button type="submit" name="thanhtoan" class="btn btn-success btn-md mt-3 thanhtoan">Gửi</button>
                    </div>                        
                    
                </div> 
            </div>       
            <div class="col-md-6">
                <div class="mt-3">            
                    <label for="">Ghi chú</label>                               
                    <textarea type="text" class="form-control ckeditor" placeholder="Ghi chú" name="note" ></textarea> 
                </div>
                <div class="breadcrumb-item active">
                    Chọn hình thức thanh toán:
                </div>
                <div class="payment">
                    <span>
                        <label><input name="payment_method" type="checkbox" value="ATM">Thanh toán ATM</label>        
                    </span>        
                    <span>
                        <label><input name="payment_method" type="checkbox" value="Tiền mặt">Thanh toán tiền mặt</label>
                    </span>
                    <span>
                        <label><input name="payment_method" type="checkbox" value="VN-Pay">Thanh toán VN-Pay</label>        
                    </span>           
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