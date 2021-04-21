@extends('layout.master')
@include('layout.headerAdmin')
@section('content')       
<div class="col-md-8 mx-auto">
<h1>Chi tiết đơn hàng</h1>
    <table class="table table-hover table-striped table-bordered mt-5 text-primary">
        <tbody>
            <tr>
                <td>Tên người đặt hàng</td>
                <td>{{ $orders->name }}</td>
            </tr>
            <tr>
                <td>Ngày đặt hàng</td>
                <td>{{ $date->toDateTimeString() }}</td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td>{{ $orders->phone }}</td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td>{{ $orders->adress }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $orders->email }}</td>
            </tr>
            <tr>
                <td>Ghi chú</td>
                <td>{{ $orders->note }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-hover table-striped table-bordered mt-5 text-primary">
        <thead>
        <tr role="row">
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá tiền (vnđ)</th>
        </thead>
        <tbody> 

            <tr>
                <td>{{ $orders->order_id }}</td> 
                <td>{{ $orders->product_name }}</td>
                <td>{{ $orders->product_quantity }}</td>
                <td>{{ $orders->product_price }}</td>
            </tr>
            <tr>
                <td colspan="3"><b>Tổng tiền</b></td>
                <td colspan="1"><b class="text-red">{{ $orders->product_quantity *$orders->product_price  }} vnđ</b></td>
            </tr>
     
        </tbody>
    </table>               
    <div class="col-md-12 mt-5">
        <form action="" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="form-inline">
                <label>Trạng thái giao hàng: </label>
                <select name="status" class="form-control input-inline" style="width: 200px">
                    <option value="1">Chưa giao</option>
                    <option value="2">Đang giao</option>
                    <option value="2">Đã giao</option>
                </select>
                <input type="submit" value="Xử lý" class="btn btn-primary mt-2">
                </div>
            </div>
        </form>
    </div>
</div>    
@endsection
