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
            <div class=" col-md-10 col-xs-12 mt-4 news ">                   
                <h1>{{$news->title}}</h1>
                   
                <img src="{{ asset('/storage/image/'.$news->image) }}" height="100%" width="100%">
                  
                <h4 class="mt-4 ">{{ $news->description}}</a></h4>

                <h4 class="text-secondary">{!! $news->content !!}</h4>        
            </div>           
        </div>    
        <div class="">
                <h3 class="text-dark mt-5 text-center">Bài viết liên quan</h3>
                <ul class="list-news">
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

.container h1 {
    margin: 2rem 0;
    padding: 2rem 0;
    text-align: center;
}
.news {
    color: #000;
    margin: auto;
    min-height: 300px;
}
.list-news {
    margin-left: 25%;
    display: flex;
    flex-direction: column;
    align-items: start;
}

.list-news > a {
    font-size: 1.5rem;
    margin-top: 1rem;
}

@media (min-width: 740px) and (max-width:1023px) {
    .list-news {
    margin-left: 10%;
    display: flex;
    flex-direction: column;
    align-items: start;
    }
}
  
@media (max-width: 740px) {
    .list-news {
    margin-left: 10%;
    display: flex;
    flex-direction: column;
    align-items: start;
    }
}
</style>
@include('layout.footer')
@endsection