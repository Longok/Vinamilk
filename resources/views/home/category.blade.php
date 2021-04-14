@extends('layout.master')
@include('layout.header')
@section('content')
<body>
    <div class="mt-3 mx-4 text-primary">
        <a href="{{ URL::to('/home') }}">Trang chủ</a>
    </div>
    <div class="container">
        <div class="row mt-4">
        @foreach($products as $pro)
            <div class="box col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <form action="{{Route('cart',$pro->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card">
                    <div class="d-flex justify-content-around mt-2">
                        <img src="{{ asset('/storage/image/'.$pro->image) }}" height="160" width="220px">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title ">{{$pro->name}}</h5>
                        @if ($pro->price * $pro->discount == 0)
                        <h6 class="card-title">Giá: {{number_format($pro->price)}} vnđ</h6>
                        @else
                        <strike class="card-title">Giá: {{number_format($pro->price)}} vnđ</strike>
                        <h6 class="card-title">Giảm giá: {{ number_format($pro->price - (( $pro->price * $pro->discount)/100)) }} vnđ</h6>
                        @endif
                    </div>
                    <div class="di">
                        <h6>Số lượng</h6>
                        <input class="input" name="qty" type="number" min="1" value="1">
                        <input name="productid_hidden" type="hidden" value="{{$pro->id}}">
                        <button type="submit" class="btn btn-primary mt-2 "> Mua hàng </button>
                    </div>
                </div>
                </form>
            </div>
        @endforeach
        </div>
        <span class="pagination justify-content-center">{{ $products->render() }}</span>
    </div>
</body>
@endsection


