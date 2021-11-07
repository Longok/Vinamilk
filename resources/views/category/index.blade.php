@extends('layout.master')
@include('layout.side-bar')

@section('content')
<div class="main-content">
    @include('layout.headerAdmin')
        
        <div class="main">

            <div class="col-md-8 mx-auto">
                <table class="table table-bordered mt-5 text-dark">
                    <thead>
                        <tr class="text-center">
                            <th scope="col-4" class="">#</th>
                            <th scope="col-4" class="">Tên danh mục sản phẩm</th>
                            <th scope="col-4" class="">Sửa/Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorys as $category)
                            <tr class="text-center">
                                <td scope="row">{{$category->id}}</td>
                                <td scope="row"><a href="{{ URL::to('/list-product/'.$category->id) }}">{{$category->name}}</a></td>
                                <td>
                                    <a href="{{URL::to('/edit-category/'.$category->id)}}">Sửa</a>|
                                    <a href="{{URL::to('/delete-category/'.$category->id)}}">Xóa</a>
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
    table, th, td, a {
        font-size: 1.5rem;
    }

    .text-center td > a {
        margin: 0 auto;
    }
</style>