<div class="header-admin">
    <div class="row">
        <div class="col-12  ">
            <div class="d-flex ">
                <div class="col-sm-9 col-md-9">
                    <a href ="{{ URL::to('/index')}}"><img src="{{ asset('image/logo.png') }}" height="100" width="120"></a>
                </div>
                <div class="col-sm-3 col-md-3 mt-5 d-block">
                <a href =""><i class="fas fa-user" style="font-size:22px;color:blue;"></i></a>
                    <?php
                        $name = Session::get('admin_name');
                        if($name){
                            echo $name;
                        }                    
                    ?>
                        <a href ="{{URL::to('/logout-admin')}}">Đăng Xuất</a>                                        
                </div>
            </div>
        </div>
    </div>
    <div class="mx-4 mt-3 text-primary">
        <h6><a href="{{URL::to('/dashboard')}}">Trang Admin</a></h6>
    </div>
</div>
