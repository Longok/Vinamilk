@extends('layout.master')
@section('content')
@include('layout.header')

<body>
    <div class="slide">
        <div id="demo" class="carousel " data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                @php
                $i = 0;
                @endphp
                @foreach ($slides as $slide)
                @php
                $i++;
                @endphp
                <div class="carousel-item {{ $i == 1 ? 'active' :''}}">
                    <img src="{{ asset('/storage/image/'.$slide->image) }}" width="100%">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    </div>
    <div class="content bg-light mt-2">
        <div class="container">
            @foreach( $news as $new)
                <div class="mt-4 news">                                      
                        <img src="{{ asset('/storage/image/'.$new->image) }}" height="160" width="100%">
                        <h4 class=" mt-2 "><a href="{{ URL::to('/news-detail/'.$new->id)}}">{{$new->title}}</a></h4>                   
                        <h5><a href="{{ URL::to('/news-detail/'.$new->id)}}">{{ $new->description}}</a></h5>
                    <div class="d-flex date">                        
                        <p class="mr-auto">{{$new->created_at}}</p> 
                        <h5><a href="{{ URL::to('/news-detail/'.$new->id)}}">Xem thêm</a></h5>     
                    </div>                   
                </div>
            @endforeach   
        </div>
        <ul class="d-flex justify-content-center mx-auto mt-5">
            {{ $news->render() }}
        </ul>
    </div>
</body>
<script>
    var menu = document.getElementById('menu');
    var menuIcon = document.getElementById('menu-icon');
    var menuHeight = menu.clientHeight;

    menuIcon.onclick = function () {
        var closeIcon = menu.clientHeight === menuHeight;
        if (closeIcon) {
            menu.style.height = 'auto';
        } else {
            menu.style.height = null;
        }
    }
</script>
<style>
body{
    background-color: rgb(223, 242, 245);
}  

.container {
    background-color: whitesmoke;
    display: flex;
    flex-wrap: wrap;
}
.news {
    /* border: 2px solid black ; */
    color: #000;
    text-align: center;
    margin-left: 30px;
    min-height: 300px;
    width: calc(25% - 30px);
}

.news > h5 > a {
    text-decoration: none;
    color: #666;
}
.news > p > a {
    text-decoration: none;
}

.date > p {
    font-size: 15px;
    color: rgb(124, 121, 121);
}

.date > a {
    text-decoration: none;
}
@media (min-width: 740px) and (max-width:1023px) {
        .container {
        background-color: whitesmoke;
        display: flex;
        flex-wrap: wrap;
    }
    .news {
        color: #000;
        text-align: center;
        min-height: 300px;
        margin-left: 10px;
        width: calc(33% - 10px);
    }
}    
@media (max-width: 740px) {
        .container {
        background-color: whitesmoke;
        display: flex;
        flex-wrap: wrap;
    }
    .news {
        color: #000;
        text-align: center;
        min-height: 300px;
        margin-left: 10px;
        width: calc(100% - 10px);
    }
}    
</style>
@include('layout.footer')
@endsection