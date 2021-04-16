@extends('layout.master')
@include('layout.headerAdmin')
@section('content')
<div class="col-md-8 mx-auto">
    <table class="table table-hover table-bordered mt-5 text-primary">
    <h6>Liệt kê đơn hàng</h6>
        <thead>
            <tr class="text-center">
                <th scope="col-4" class="">#</th>
                <th scope="col-4" class="">Tên người đặt</th>
                <th scope="col-4" class="">Email</th>
                <th scope="col-4" class="">Số điện thoại</th>
                <th scope="col-4" class="">Tổng giá tiền (vnđ)</th>
                <th scope="col-4" class="">Tình trạng </th>
                <th scope="col-4" class="">Sửa/Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $orde)
            <tr>
                <td>{{ $orde->order_id }}</td>
                <td>{{ $orde->shipping_name }}</td>
                <td>{{ $orde->customer_email }}</td>
                <td>{{ $orde->shipping_phone }}</td>
                <td>{{ $orde->order_total }}</td>
                <td>{{ $orde->order_status }}</td>
                <td>Sửa/Xóa</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
