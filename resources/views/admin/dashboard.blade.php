@extends('layout.master')
@section('content')
<body>
@include('layout.headerAdmin')

<div class="row">
    <div class="sidebar">
        <ul class="sub">
            <li><a href="#"class="DM"> Danh mục <i class="ti-angle-down"></i></a>
                <ul class="droplow">
                    <li><a href="{{URL::to('/category')}}">Thêm danh mục</a></li>
                    <li><a href="{{URL::to('/all-category')}}">Danh sách danh mục</a></li>
                </ul>
            </li>
            <li><a href="#"class="DM1">Sản phẩm <i class="ti-angle-down"></i></a>
                <ul class="droplow1">
                    <li><a href="{{URL::to('/product')}}">Thêm sản phẩm</a></li>
                    <li><a href="{{URL::to('/all-product')}}">Danh sách sản phẩm</a></li>
                </ul>
            </li>
            <li><a href="#"class="DM2">Slide <i class="ti-angle-down"></i></a>
                <ul class="droplow2">
                        <li><a href="{{URL::to('/slide')}}">Thêm Slide</a></li>
                    <li><a href="{{URL::to('/all-slide')}}">Danh sách Slide</a></li>
                </ul>
            </li>
            <li><a href="#"class="DM3">User <i class="ti-angle-down"></i></a>
                <ul class="droplow3">
                    <li><a href="{{URL::to('/list-user')}}">Danh sách User</a></li>
                </ul>
            </li>
            <li><a href="#"class="DM4">Quản lý đơn hàng <i class="ti-angle-down"></i></a>
                <ul class="droplow4">
                    <li><a href="{{URL::to('/manage-order')}}">Danh sách đơn hàng</a></li>
                </ul>
            </li>
            <li><a href="#"class="DM5">Quản lý tin tức <i class="ti-angle-down"></i></a>
                <ul class="droplow5">
                    <li><a href="{{URL::to('/add-news')}}">Thêm tin tức</a></li>
                    <li><a href="{{URL::to('/list-news')}}">Danh sách tin tức</a></li>

                </ul>
            </li>
            <li><a href="#"class="DM6">Quản lý kho hàng <i class="ti-angle-down"></i></a>
                <ul class="droplow6">
                    <li><a href="{{URL::to('/manage-warehouse')}}">Quản lý kho hàng</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="content_menu ">
        <h1>Helo</h1>
    </div>
</div>

</body>
<script>
$('.DM').click(function(){
    $('.droplow').toggleClass("show");
});
$('.DM1').click(function(){
    $('.droplow1').toggleClass("show1");
});
$('.DM2').click(function(){
    $('.droplow2').toggleClass("show2");
});
$('.DM3').click(function(){
    $('.droplow3').toggleClass("show3");
});
$('.DM4').click(function(){
    $('.droplow4').toggleClass("show4");
});
$('.DM5').click(function(){
    $('.droplow5').toggleClass("show5");
});
$('.DM6').click(function(){
    $('.droplow6').toggleClass("show6");
});
</script>
@endsection

