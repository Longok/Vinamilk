<div id="header">
    <div class="image-nav">
        <div class="logo-brand">
            <a href ="{{ URL::to('/index')}}"><img src="{{ asset('image/logo.png') }}" height="70" width="110"></a>
            <div class="brand">
                <span>D</span>emo
            </div>
        </div>
        <div class="nav">
            <ul>
                <li>
                    <a href="{{ URL::to('/cart')}}">Giỏ hàng<span class="show-cart"></span></a>                
                </li>
                @if(Auth::check())
                <li><a href="{{ URL::to('/check-out')}}">Thanh toán</a></li>
                @else 
                <li><a href="{{ URL::to('/login')}}">Thanh toán</a></li>
                @endif

                @if(Auth::check())
                    <!-- {{Auth::user()->customer_id}} -->
                    <i class="fas fa-smile" style="color:blue"></i> {{Auth::user()->name}}
                    <li><a href ="{{URL::to('/logout')}}">Đăng Xuất</a></li>
                @else
                <li><a href ="{{URL::to('/login')}}">Đăng nhập</a></li>
                <li><a href ="{{URL::to('/sign-up')}}">Đăng ký</a></li>   
                @endif                      
            </ul>
        </div> 
        <div class="nav-icon">
            <ul>
                <li>
                    <a href="{{ URL::to('/cart')}}">
                        <i class="ti-shopping-cart"><span class="show-cart"></span></i>                       
                    </a>  
                              
                </li>
                @if(Auth::check())
                <li><a href="{{ URL::to('/check-out')}}">
                        <i class="ti-check-box"></i>
                    </a>
                </li>
                @else 
                <li><a href="{{ URL::to('/login')}}">
                        <i class="ti-check-box"></i>
                    </a>
                </li>
                @endif
                   
                @if(Auth::check())
                
                    <!-- <i class="fas fa-smile" style="color:blue"></i> {{Auth::user()->name}}
                    <li href ="{{URL::to('/logout')}}"></a></li> -->
                        <i class="ti-comments-smiley" style="color:blue"></i>
                    <li>
                        <a href ="{{URL::to('/logout')}}">
                            <i class="ti-face-sad" style="color:red"></i>
                        </a>
                    </li>
                @else
                <li>
                    <a href ="{{URL::to('/login')}}">
                        <i class="ti-user"></i>
                    </a>
                </li>
                <li>
                    <a href ="{{URL::to('/sign-up')}}">
                        <i class="ti-slice"></i>
                    </a>
                </li>   
                @endif                      
            </ul>
        </div> 
    </div> 
        
</div>
<style>
   
</style>
<script>
    $(document).ready(function (){
        show_cart();
        function show_cart(){
            $.ajax({
                url:'{{ url('/show-cart') }}',
                method: "GET",
                success:function(data){
                    $('.show-cart').html(data);
                }
            });
        }    
    });
    
</script>

