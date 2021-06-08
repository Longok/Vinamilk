@extends('layout.master')
@include('layout.headerAdmin')
@section('content')
<div class="col-md-8 mx-auto">
    <table class="table table-bordered mt-5 text-primary">
        <thead>
            <tr class="text-center">
                <th scope="col-4" class="">#</th>
                <th scope="col-4" class="">Tên danh khách hàng</th>
                <th scope="col-4" class="">Email</th>
                <th scope="col-4" class="">Sửa/Xóa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr class="text-center">
                    <td scope="row">{{$customer->customer_id}}</td>
                    <td scope="row">{{$customer->name}}</td>
                    <td scope="row">{{$customer->email}}</td>
                    <td>
                        <a href="{{URL::to('/delete-customer/'.$customer->id)}}">Xóa</a>
                    </td>
                </tr>
             @endforeach
        </tbody>
    </table>
</div>

@endsection
