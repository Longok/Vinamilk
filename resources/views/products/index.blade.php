@extends('layout.master')
@section('content')
<body>
@include('layout.headerAdmin')
    <div class="col-md-8 col-xs-12 mx-auto">
        <div class="mt-3 text-light">
            <h6>Danh sách sản phẩm</h6>
        </div>
        <table class="table table-striped table-bordered mt-5 text-light">
            <thead>
                <tr class="text-center">
                    <th scope="col-4" class="">#</th>
                    <th scope="col-4" class="">Danh mục sản phẩm</th>
                    <th scope="col-4" class="">Tên sản phẩm</th>
                    <th scope="col-4" class="">Giá sản phẩm</th>
                    <th scope="col-4" class="">Hình ảnh sản phẩm</th>
                    <th scope="col-4" class="">Số lượng nhập vào</th>
                    <th scope="col-4" class="">Số lượng đã bán</th>
                    <th scope="col-4" class="">Giảm giá (%)</th>
                    <th scope="col-4" class="">Mô tả sản phẩm</th>
                    <th scope="col-4" class="">Sửa/Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="text-center">
                    <td scope="row">{{$product->id}}</td>
                    <td scope="row"><a href="{{ URL::to('/all-category') }}">{{$product->category->name}}</a></td>
                    <td scope="row">{{$product->name}}</td>
                    <td scope="row">{{$product->price}}</td>
                    <td scope="row">
                        <img src="{{ asset('storage/image/'.$product->image) }}" height="150" width="150">
                    </td>
                    <td scope="row">{{$product->quantity}}</td>
                    <td scope="row">{{$product->sale}}</td>
                    <td scope="row">{{$product->discount}}</td>
                    <td scope="row">{{$product->desc}}</td>
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
</body>
@endsection

