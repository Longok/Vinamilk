@extends('layout.master')
@include('layout.headerAdmin')
@section('content')       
<div class="col-md-8 mx-auto">
<h1>Chi tiết đơn hàng</h1>
    <table class="table table-hover table-striped table-bordered mt-5 text-primary">
        <tbody>
            <tr>
                <td>Tên người đặt hàng</td>
                <td>{{ $customer->name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $shipping->shipping_email}}</td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td>{{ $shipping->shipping_phone}}</td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td>{{ $shipping->shipping_adress}}</td>
            </tr>
            <tr>
                <td>Ngày đặt hàng</td>
                <td>{{ $shipping->created_at}}</td>
            </tr>                                
            <tr>
                <td>Hình thức thanh toán</td>
                <td>{{ $shipping->shipping_method}}</td>
            </tr>
            <tr>
                <td>Ghi chú</td>
                <td>{{ $shipping->shipping_note}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-hover table-striped table-bordered mt-4 text-primary">
        <thead>
            <tr role="row">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá tiền (vnđ)</th>
            </tr>    
        </thead>
        <tbody> 
            @php
                $i = 0;
            @endphp
        @foreach( $order_detail as $key => $detail)
            @php
                $i++;
            @endphp          
                <tr>
                    <td>{{$i}}</td>
                    <td>{{ $detail->product_name }}</td>
                    <td>
                        <img src="{{ asset('storage/image/'.$detail->product->image) }}" height="100" width="150">
                    </td>
                    <td>{{ $detail->product_quantity }}</td>
                    <td>{{ number_format($detail->product_price ,0,'.','.') }}</td>
                </tr>
                
        @endforeach
                <tr>
                    <td colspan="3"><b>Tổng tiền</b></td>
                    <td colspan="1"><b class="text-red">{{ number_format($detail->product_quantity*$detail->product_price ,0,'.','.')}} vnđ</b></td>
                </tr>      
        </tbody>
    </table>               
    <div class="col-md-12 mt-3">
        <label>Tình trạng đơn hàng: </label>
        @foreach($orders as $key => $order)    
            @if($order->order_status ==1)
            <form method="POST">
            {{ csrf_field() }}          
                <div class="form-inline">                
                    <select name="order_status" class="form-control input-inline update_order_status" style="width: 200px">
                        <option id="{{$order->order_id}}" value="1">Đang xử lý</option>
                        <option id="{{$order->order_id}}" value="2">Đã xử lý</option>
                        <option id="{{$order->order_id}}" value="3">Chưa xử lý</option>
                    </select>
                </div>
            </form>
            @elseif($order->order_status ==2)
            <form method="POST">
            {{ csrf_field() }}          
                <div class="form-inline">                
                    <select name="order_status" class="form-control input-inline update_order_status" style="width: 200px">
                        <option id="{{$order->order_id}}" value="1">Đang xử lý</option>
                        <option id="{{$order->order_id}}" selected value="2">Đã xử lý</option>
                        <option id="{{$order->order_id}}" value="3">Chưa xử lý</option>
                    </select>
                </div>
            </form>
            @else
            <form method="POST">
            {{ csrf_field() }}          
                <div class="form-inline">                
                    <select name="order_status" class="form-control input-inline update_order_status" style="width: 200px">
                        <option id="{{$order->order_id}}" value="1">Đang xử lý</option>
                        <option id="{{$order->order_id}}" value="2">Đã xử lý</option>
                        <option id="{{$order->order_id}}" selected value="3">Chưa xử lý</option>
                    </select>
                </div>
            </form>
            @endif
        @endforeach   
    </div>
</div>    
@endsection
@section('script')
  <script>
    $('.update_order_status').change(function(){
        // alert('hehe');
        var order_status = $(this).val();
        // alert(order_status);
        var order_id = $(this).children(":selected").attr("id");
        // alert(order_id);
        var _token = $('input[name="_token"]').val();
        // alert(_token);
        $.ajax({
                url:'{{url('/update-order-status')}}',
                method: 'POST',
                data:{order_status:order_status,order_id:order_id,_token:_token},
                success:function(data){
                    alert('Cập nhật tình trạng đơn hàng thành công');   
            }
        });
    });
  </script>                  
@endsection