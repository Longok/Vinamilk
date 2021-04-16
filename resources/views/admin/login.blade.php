<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{asset('/bootstrap.css')}}">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="sign-in mx-5 ">
    <div class="row">
        <a href="{{ URL::to('home')}}">Trang chủ</a>
        <div class="col-6 col-md-3 mx-auto">
            <form action="{{ URL::to('/dashboard')}}" method="post">
                {{ csrf_field() }}             
                <div class="loginbox">
                    <div class="text-danger mt-3 ">
                   <?php
                       $message = Session::get('message');
                       if($message){
                           echo $message;
                           Session::put('message', null);
                       } 
                   ?>
                    </div>
                    <h1>Login</h1>
                    <div class="form-group">
                        <!-- <label for="email">Email</label><br> -->
                        <input type="email" class="form-control" name="admin_email" placeholder="ĐIền email" required="">

                    </div>
                    <div class="form-group">
                        <!-- <label for="password">Password</label><br> -->
                        <input type="password" class="form-control" name="admin_password" placeholder="Điền password" required="">
                    </div>
                    <button type="submit"class="btn form-control btn-primary ">Đăng nhập</button>
                    <span>
                        <a href="{{ URL::to('/create-admin')}}">Đăng ký</a>
                    </span>
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>
<style>
    body{
        background:black;
    }
    a {
        color:white;
        margin-top:20px;
    }

    a:hover{
        color:white;
        text-decoration:none;
    }
    .loginbox{
        position:absolute;
        border: 1px solid #66ff66;
        padding:15px;
        margin-top:75px;
        border-radius:5px;
        box-shadow: 3px 3px none;
        color:white;
        background:none;
        outline:none;
    }    
    .loginbox h1{
        font-size:40px;
        border-bottom:1px solid #66ff66;
        padding:10px 0;
        margin-bottom:50px;
        color:none;
        margin-left:8px;
    }
    .form-group{
        color:white;
        border-bottom:1px solid #66ff66;
        margin:10px 0;
        padding:10px 0;
        font-size:20px;
    }
    .form-group input{
        background:none;
        border:none;
        outline:none;
        color:white;
        font-size:20px;
    }
    .btn{
        background:none;
    }
    
</style>
