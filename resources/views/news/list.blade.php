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
                            <th scope="col-4" class="">Title</th>
                            <th scope="col-4" class="">Description</th>
                            <!-- <th scope="col-4" class="">Content</th> -->
                            <th scope="col-4" class="">Image</th>
                            <th scope="col-4" class="">Sửa/Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $new)
                            <tr class="text-center">
                                <td scope="row">{{$new->id}}</td>
                                <td scope="row">{{$new->title}}</td>
                                <td scope="row">{{$new->description}}</td>
                                <!-- <td scope="row">{{$new->content}}</td> -->
                                <td scope="row">
                                    <img src="{{ asset('/storage/image/'.$new->image) }}" height="160" width="100%">
                                </td>
                                <td>
                                    <a href="#">Xóa</a>|
                                    <a href="#">Sửa</a>
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