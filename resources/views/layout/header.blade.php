<div id="header">
    <div class="image-nav">
        <div class="image">
        <a href ="{{ URL::to('/')}}"><img src="{{ asset('image/logo.png') }}" height="70" width="120"></a>
            <div class="brand">
                <span>D</span>emo
            </div>
        </div>
        <div class="nav">
            <ul>
                <li><a href="{{ URL::to('/show-cart')}}">Giỏ hàng</a></li>
                @if(Auth::check())
                <li><a href="{{ URL::to('/check-out')}}">Thanh toán</a></li>
                @else 
                <li> <a href="{{ URL::to('/login')}}">Thanh toán</a></li>
                @endif

                @if(Auth::check())
                    <i class="fas fa-smile" style="color:blue"></i> {{Auth::user()->name}}
                    <li><a href ="{{URL::to('/logout')}}">Đăng Xuất</a></li>
                @else
                <li><a href ="{{URL::to('/login')}}">Đăng nhập</a></li>
                <li><a href ="{{URL::to('/sign-up')}}">Đăng ký</a></li>   
                @endif                      
            </ul>
        </div> 
    </div> 
        
</div>


