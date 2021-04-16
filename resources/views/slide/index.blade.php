@extends('layout.master')
@include('layout.headerAdmin')
@section('content')
    <div class="col-md-8 mx-auto">
        <div class="mt-3 text-primary">
            <h6>Danh sách Slide</h6>
        </div>
        <table class="table table-hover table-bordered mt-5 text-primary">
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
                        <img src="{{ asset('storage/image/'.$sli->image) }}" height="200" width="200">
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
@endsection

