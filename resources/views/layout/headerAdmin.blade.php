<header>

    <h2>
        <label for="nav-toggle">
            <span class="fas fa-bars"></span>
        </label>
        Dashboard
    </h2>

    <div class="search-wrapper">
        <span class="fas fa-search"></span>
        <input type="search" placeholder="search here..."/>
    </div>

    <div class="user-wrapper">
        <div>
            <h4>
                <a href =""><i class="fas fa-user" style="font-size:22px;color:blue;"></i></a>
                <?php
                    $name = Session::get('admin_name');
                    if($name){
                        echo $name;
                    }                    
                ?>
                    <a href ="{{URL::to('/logout-admin')}}">Đăng Xuất</a> 
            </h4>                                                      
        </div>
    </div>

</header>
