@extends('layout.master')
@include('layout.headerAdmin')
@section('content')
<div class="mx-4 mt-3 text-primary">
    <h6><a href="{{URL::to('/admin')}}">Trang Admin</a></h6>
    
</div>
<div class="col-md-8 mx-auto">
    <table class="table table-hover table-bordered mt-5 text-primary">
    <h6>Liệt kê đơn hàng</h6>
        <thead>
            <tr class="text-center">
                <th scope="col-4" class="">#</th>
                <th scope="col-4" class="">Tên người đặt</th>
                <th scope="col-4" class="">Tổng giá tiền</th>
                <th scope="col-4" class="">Tình trạng </th>
                <th scope="col-4" class="">Sửa/Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $orde)
            <tr>
                <td>{{ $orde->order_id }}</td>
                <td>A</td>
                <td>A</td>
                <td>A</td>
                <td>A</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
