@extends('layout.master')
@include('layout.headerAdmin')
@section('content')
<div class="col-md-8 mx-auto">
    <table class="table table-hover table-striped table-bordered mt-5 text-primary">
    <h6>Liệt kê đơn hàng</h6>
    <thead>
            <tr class="text-center">
            <th scope="col-4" class="">STT</th>
                <th scope="col-4" class="">Tên khách hàng</th>
                <th scope="col-4" class="">Mã đơn hàng</th>
                <th scope="col-4" class="">Tình trạng </th>
                <th scope="col-4" class="">Sửa/Xóa</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach($orders as $order)
            @php
                $i++;
            @endphp   
            <tr class="text-center">
                <td>{{ $i }}</td>
                <td>{{ $order->Shipping->shipping_name }}</td>
                <td>{{ $order->order_code }}</td>
                <td>
                    @if($order->order_status == 1)
                        Đơn hàng mới
                    @elseif($order->order_status == 2)
                        Đã xử lý  
                    @else
                        Chưa xử lý                                          
                    @endif
                </td>
                <td>
                    <a href="{{ URL::to('/view-order/'.$order->order_code) }}">Xem |</a>
                    <a href="{{ URL::to('/delete-order/'.$order->order_id) }}">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>
</div>

@endsection
