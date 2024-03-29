@extends('layout.master')
@include('layout.side-bar')
@section('content')

    <div class="main-content"> 
        @include('layout.headerAdmin')
        <div class="main">
            <div class="table-reponsive">
                <table class="table table-bordered mt-5 text-primary">
                    <thead>
                        <tr class="text-center">
                            <th scope="col-4" class="">#</th>
                            <th scope="col-4" class="">Tên khách hàng</th>
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
        </div>   
    </div>

@endsection
<style>
    .text-center td {
        font-size: 1.3rem;
    }

    .text-center td a {
        margin: 0 auto;
    }
</style>