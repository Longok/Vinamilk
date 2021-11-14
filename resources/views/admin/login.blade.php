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

        <a href="{{ URL::to('index')}}">Trang chủ</a>
        <div class="login">
            <form action="{{ URL::to('/dashboard')}}" method="post">
                {{ csrf_field() }}             
                <div class="login-box">
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

                        <input type="email" class="form-control" name="admin_email" placeholder="ĐIền email" required="">

                    </div>
                    <div class="form-group">

                        <input type="password" class="form-control" name="admin_password" placeholder="Điền password" required="">
                    </div>
                    <button type="submit" class="btn">Đăng nhập</button>

                    <a href="{{ URL::to('/create-admin')}}">Đăng ký</a>

                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>
<style>
    body{
        background: #111111;
    }
    a {
        color: white;
        margin-top: 20px;
        font-size: 1.8rem;
    }

    a:hover{
        color:white;
        text-decoration:none;
    }

    .login {
        display: flex;
        justify-content: center;
    }

    .login-box{
        border: 1px solid #66ff66;
        padding:15px;
        margin-top:75px;
        border-radius:5px;
        box-shadow: 3px 3px none;
        color:white;
        background:none;
        outline:none;
    } 

    .login-box h1{
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
        border-radius: .5rem;
        color: #fff;
        width: 100%;
        margin: 1rem 0;
    }
    
</style>
