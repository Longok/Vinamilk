<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-2 p-0 ">
            <div class="sidebar">
                <ul class="sub">
                    <li> <a href="#"class="DM"> Danh mục </a>
                        <ul class="droplow">
                            <li><a href="{{URL::to('/category')}}">Thêm danh mục</a></li>
                            <li><a href="{{URL::to('/all-category')}}">Danh sách danh mục</a></li>
                        </ul>
                    </li>
                    <li><a href="#"class="DM1">Sản phẩm</a>
                        <ul class="droplow1">
                            <li><a href="{{URL::to('/product')}}">Thêm sản phẩm</a></li>
                            <li><a href="{{URL::to('/all-product')}}">Danh sách sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a href="#"class="DM2">Side</a>
                        <ul class="droplow2">
                            <li><a href="{{URL::to('/slide')}}">Thêm Silde</a></li>
                            <li><a href="{{URL::to('/all-slide')}}">Danh sách Slide</a></li>
                        </ul>
                    </li>
                    <li><a href="#"class="DM3">User</a>
                        <ul class="droplow3">
                            <li><a href="{{URL::to('/list-user')}}">Danh sách User</a></li>
                        </ul>
                    </li>
                    <li><a href="#"class="DM4">Quản lý đơn hàng</a>
                        <ul class="droplow4">
                            <li><a href="{{URL::to('/manage-order')}}">Danh sách đơn hàng</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
$('.DM').click(function(){
    $(' ul.droplow').toggleClass("show");
});
$('.DM1').click(function(){
    $(' ul.droplow1').toggleClass("show1");
});
$('.DM2').click(function(){
    $(' ul.droplow2').toggleClass("show2");
});
$('.DM3').click(function(){
    $(' ul.droplow3').toggleClass("show3");
});
$('.DM4').click(function(){
    $(' ul.droplow4').toggleClass("show4");
});
</script>