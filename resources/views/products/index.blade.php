@extends('layout.master')
@include('layout.side-bar')
@section('content')
<body>
    <div class="main-content"> 
    @include('layout.headerAdmin')
        <div class="main">

            <h2><a href="">Danh sách sản phẩm</a></h2>
            <div class="table-reponsive">
                <table class="table table-striped table-bordered mt-5">
                    <thead>
                        <tr class="text-center">
                            <th scope="col-4" class="">#</th>
                            <th scope="col-4" class="">Danh mục sản phẩm</th>
                            <th scope="col-4" class="">Hình ảnh sản phẩm</th>
                            <th scope="col-4" class="">Tên sản phẩm</th>
                            <th scope="col-4" class="">Giá sản phẩm</th>                     
                            <th scope="col-4" class="">Số lượng nhập vào</th>
                            <th scope="col-4" class="">Số lượng đã bán</th>
                            <th scope="col-4" class="">Giảm giá (%)</th>
                            <!-- <th scope="col-4" class="">Mô tả sản phẩm</th> -->
                            <th scope="col-4" class="">Sửa/Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="text-center">
                            <td scope="row">{{$product->id}}</td>
                            <td scope="row"><a href="{{ URL::to('/all-category') }}">{{$product->category->name}}</a></td>
                            <td scope="row">
                                <img src="{{ asset('storage/image/'.$product->image) }}" height="100" width="100">
                            </td>
                            <td scope="row">{{$product->name}}</td>
                            <td scope="row">{{$product->price}}</td>
                            <td scope="row">{{$product->quantity}}</td>
                            <td scope="row">{{$product->sale}}</td>
                            <td scope="row">{{$product->discount}}</td>
                            <!-- <td scope="row">{{$product->desc}}</td> -->
                            <td>
                                <a href="{{URL::to('/edit-product/'.$product->id)}}">Sửa</a>
                                    |
                                <a href="{{URL::to('/delete-product/'.$product->id)}}">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <span class="pagination justify-content-center">
                    {{ $products->render() }}
                </span>
            </div>    
        </div>       
    </div>       
</body>
@endsection
<style>
    .main h2 a {
        text-decoration: none;
    }

    .text-center td {
        font-size: 1.6rem;
    }
    .text-center td a {
        margin: 0 auto;
    }
</style>
