
<div class="header">
    <a href="{{ URL::to('/')}}" class="logo">
        <img src="{{ asset('image/logo.png') }}" alt=""> <span>Demo</span> 
    </a>

    <nav class="navbar">
        <ul>
            <li>
                <a href="{{ URL::to('/') }}">Trang chủ</a>
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
    </nav>
   

    <div class="icons">
        <div class="icon-header fas fa-bars" id="menu-btn"></div>
        <div class="icon-header fas fa-search" id="search-btn"></div>
        <!-- <div class="icon-header fas fa-shopping-cart" id="cart-btn"> -->
            <!-- <span class="show-cart"></span> -->
            <a class="icon-header fas fa-shopping-cart" id="cart-btn" href="{{ URL::to('/cart')}}"><span class="show-cart"></span></a>   
        <!-- </div> -->
        
        @if(Auth::check())
            {{Auth::user()->name}}
            <a class="logout" href ="{{URL::to('/logout')}}">Đăng xuất</a>
        @else
        <a href="{{URL::to('/login')}}">
            <div class="icon-header fas fa-user" id="login-btn"></div>
        </a> 
        @endif
    </div>

    <!-- search -->
    <form action="{{ URL::to('/search') }}" class="search-form" method="post">
        {{ csrf_field() }}
        <input type="search" id="search-box"  name="keywords" placeholder="Tìm kiếm..." aria-label="Recipient's username">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <!-- login -->
    <!-- <form action="{{ URL::to('/login')}}" method="post" class="login-form">
        {{ csrf_field() }}  
        <h3>Đăng nhập</h3>
        <input type="email" placeholder="email" class="box">
        <input type="password" placeholder="password" class="box">
        <p>Chưa có tài khoản <a href="{{ URL::to('/sign-up')}}">Tạo ngay</a></p>
        <input type="submit" value="Đăng nhập" class="btn">
    </form> -->
</div>



<script>
    // search
    const searchForm = document.querySelector('.search-form');
    const searchBtn = document.querySelector('#search-btn');
    
    searchBtn.addEventListener('click', function(){
        searchForm.classList.toggle('active');
        navbar.classList.remove('active');
    });

    const navbar = document.querySelector('.navbar');
    const menuBtn = document.querySelector('#menu-btn');  

    menuBtn.addEventListener('click', function(){
        navbar.classList.toggle('active');
        searchForm.classList.remove('active');
    });

    // $(document).ready(function (){
    //     show_cart();
    //     function show_cart(){
    //         $.ajax({
    //             url:'{{ url('/show-cart') }}',
    //             method: "GET",
    //             success:function(data){
    //                 $('.show-cart').html(data);
    //             }
    //         });
    //     }    
    // });
    
</script>
