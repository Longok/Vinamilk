@extends('layout.master')
@section('content')
@include('layout.header')

<body>
    <div id="menu">
        <ul>
            <li class="active">
                <a href="{{ URL::to('/index') }}">Trang chủ</a>
            </li>
            <li>
                <a href="#">Sản phẩm
                    <i class="ti-angle-down"></i>
                </a>
                <ul class="submenu">
                    @foreach($categorys as $category)
                    <li><a href="{{URL::to('/category/'.$category->id)}}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="{{ URL::to('/news') }}">Tin tức</a></li>
            <li><a href="#">Liên hệ</a></li>
        </ul>
        <div class="search-btn">
            <form action="{{ URL::to('/search') }}" method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keywords" placeholder="Tìm kiếm.."
                        aria-label="Recipient's username">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </form>
        </div>
        <div id="menu-icon" class="menu-icon">
            <i class="ti-align-justify"></i>
        </div>
    </div>
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
            <div class=" col-md-10 col-xs-12 mt-4 news ">                   
                <h5 class=" ">{{$news->title}}</h5>
                   
                <img src="{{ asset('/storage/image/'.$news->image) }}" height="100%" width="100%">
                  
                <h6 class=" mt-4 ">{{ $news->description}}</a></h6>

                <h6>{!! $news->content !!}</h6>        
            </div>           
        </div>    
        <div class="">
                <h4 class="text-warning mt-5 text-center">Bài viết liên quan</h4>
                <ul class="list-news col-5">
                    @foreach($list_news as $news)
                    <a href="{{ URL::to('/news-detail/'.$news->id) }}"><li>{{$news->title}}</li></a>                   
                    @endforeach
                </ul>
        </div> 
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
    background-color: whitesmoke;
    padding: 0;
    margin:0;
    box-sizing: border-box;
}    
.news {
    /* border: 2px solid black ; */
    color: #000;
    margin: auto;
    min-height: 300px;
}
.list-news {
    margin: auto;

}
@media (max-width: 740px) {
    .list-news {
        font-size: 15px;
    }
}
</style>
@include('layout.footer')
@endsection