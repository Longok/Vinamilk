@extends('layout.master')
@include('layout.side-bar')
@section('content')

    <div class="main-content"> 
    @include('layout.headerAdmin')
        <div class="main">

        <h2>
            <a href="">Danh sách Slide</a>
        </h2>

        <div class="table-reponsive">
        <table class="table table-bordered mt-5">
            <thead>
                <tr class="text-center">
                    <th scope="col-4" class="">#</th>
                    <th scope="col-4" class="">Tên sản phẩm</th>
                    <th scope="col-4" class="">Hình ảnh sản phẩm</th>
                    <th scope="col-4" class="">Mô tả sản phẩm</th>
                    <th scope="col-4" class="">Sửa/Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slides as $sli)
                <tr class="text-center">
                    <td scope="row">{{$sli->id}}</td>
                    <td scope="row">{{$sli->name}}</td>
                    <td scope="row">
                        <img src="{{ asset('storage/image/'.$sli->image) }}" height="150" width="450">
                    </td>
                    <td scope="row">{{$sli->description}}</td>
                    <td>
                        <a href="{{URL::to('/edit-slide/'.$sli->id)}}">Sửa</a>
                        |
                        <a href="{{URL::to('/delete-slide/'.$sli->id)}}">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@endsection
<style>

    .main h2 a {
        text-decoration: none;
    }

    .text-center td {
        font-size: 1.5rem;
    }
    
    .text-center td a {
        margin: 0 auto;
    }
</style>
