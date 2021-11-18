
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">

        <div class="sidebar-brand">
            <h2>
                <span class="far fa-smile-wink"></span>
                <span><a href="{{ URL::to('/index')}}">Vinamilk </a></span>
             </h2>           
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ URL::to('/dashboard')}}" class="active"><span class="fas fa-bars"></span>
                    <span>Dashboard</span></a>               
                </li>
                <li>
                    <a href="#"class="dropdown-btn"><span class="far fa-calendar-minus"></span>
                    <span>Categories</span> <i class="ti-angle-down"></i></a>                   
                    <ul class="dropdown-container">
                        <li><a href="{{URL::to('/category')}}">Thêm danh mục</a></li>
                        <li><a href="{{URL::to('/all-category')}}">Danh sách danh mục</a></li>
                    </ul>                 
                </li>
                <li>
                    <a href="#"class="dropdown-btn"><span class="fab fa-product-hunt"></span>
                    <span>Products</span> <i class="ti-angle-down"></i></a>                   
                    <ul class="dropdown-container">
                        <li><a href="{{URL::to('/product')}}">Thêm sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-product')}}">Danh sách sản phẩm</a></li>
                    </ul>    
                </li>
                <li>
                    <a href="#"class="dropdown-btn"><span class="fab fa-slideshare"></span>
                    <span>Slides</span> <i class="ti-angle-down"></i></a>                   
                    <ul class="dropdown-container">
                        <li><a href="{{URL::to('/slide')}}">Thêm Slide</a></li>
                        <li><a href="{{URL::to('/all-slide')}}">Danh sách Slide</a></li>
                    </ul>    
                </li>
                <li>
                    <a href="#"class="dropdown-btn"><span class="fas fa-user"></span>
                    <span>Users</span> <i class="ti-angle-down"></i></a>                   
                    <ul class="dropdown-container">
                        <li><a href="{{URL::to('/list-user')}}">Danh sách Users</a></li>
                    </ul>    
                </li>
                <li>
                    <a href="#"class="dropdown-btn"><span class="far fa-calendar-check"></span>
                    <span>Orders</span> <i class="ti-angle-down"></i></a>                   
                    <ul class="dropdown-container">
                        <li><a href="{{URL::to('/manage-order')}}">Danh sách đơn hàng</a></li>
                    </ul>    
                </li>
                <li>
                    <a href="#"class="dropdown-btn"><span class="fas fa-newspaper"></span>
                    <span>News</span> <i class="ti-angle-down"></i></a>                   
                    <ul class="dropdown-container">
                        <li><a href="{{URL::to('/add-news')}}">Thêm tin tức</a></li>
                        <li><a href="{{URL::to('/list-news')}}">Danh sách tin tức</a></li>
                    </ul>    
                </li>
                <li>
                    <a href="#"class="dropdown-btn"><span class="fas fa-warehouse"></span>
                    <span>Warehouses</span> <i class="ti-angle-down"></i></a>                   
                    <ul class="dropdown-container">
                        <li><a href="{{URL::to('/manage-warehouse')}}">Quản lý kho hàng</a></li>
                    </ul>    
                </li>
            </ul>
        </div>
    </div>
 
</body>
 
<script>

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

</script>

