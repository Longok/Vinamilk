@extends('layout.master')
@include('layout.header')
@section('content')
<div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ URL::to('/home') }}">Trang chủ</a></li>
        </ol>
    </nav>
    <div class="div">
        <h5>Cảm ơn bạn đã đặt hàng, chúng tôi sẽ giao hàng sớm nhất !!</h5>
    </div>
</div>
<style>
    .cart_menu {
        background: linear-gradient(45deg, #40b2f5, #ffbc00);
        color: white;
    }
</style>
@endsection