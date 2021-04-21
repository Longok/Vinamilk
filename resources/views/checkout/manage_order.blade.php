@extends('layout.master')
@include('layout.headerAdmin')
@section('content')
<div class="col-md-8 mx-auto">
    <table class="table table-hover table-striped table-bordered mt-5 text-primary">
    <h6>Liệt kê đơn hàng</h6>
    <thead>
            <tr class="text-center">
                <th scope="col-4" class="">#</th>
                <th scope="col-4" class="">Tên người đặt</th>
                <th scope="col-4" class="">Số điện thoại</th>
                <th scope="col-4" class="">Địa chỉ</th>
                <th scope="col-4" class="">Tình trạng </th>
                <th scope="col-4" class="">Sửa/Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="text-center">
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->adress }}</td>
                <td>{{ $order->order_status }}</td>
                <td>
                    <a href="{{ URL::to('/view-order/'.$order->order_id) }}">Xem |</a>
                    <a href="{{ URL::to('/delete-order/'.$order->order_id) }}">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>
</div>

@endsection
