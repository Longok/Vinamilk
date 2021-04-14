<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký tài khoản</title>
  <link rel="stylesheet" href="{{asset('/bootstrap.css')}}">
</head>
<body>
<div class="col-sm-8 col-md-9">
  <a href ="{{ URL::to('/home')}}"><img src="{{ asset('image/logo.jpg') }}" height="100" width="120"></a>
</div>
<div class="container mt-3">
  <div class="div">
    <a href="{{ URL::to('/dashboard')}}">Quay lại trang chủ</a>
  </div>
  <header class="col-xs-4 col-md-4 mx-auto text-primary text-center">
    Đăng ký tài khoản
  </header>
  
 <div class="d-flex flex-row ">
    <div class="col-6 px-10 mx-auto">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <div class="alert-danger">
      <?php
        $message = Session::get('Thongbao');
        if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            session::put('Thongbao',null);
        }
      ?>
    </div>
      <form action="{{ URL::to('create-admin') }}" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="name">Name</label>
          <input type="text" class="form-control rounded-0" id="name" placeholder="Name" name="admin_name">
        </div>
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="email">email</label>
          <input type="email" class="form-control rounded-0" id="email" placeholder="Email" name="admin_email">
        </div>
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="password">password</label>
          <input type="password" class="form-control rounded-0" id="password" placeholder="Password" name="admin_password">
        </div>
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="re_password">Repassword</label>
          <input type="password" class="form-control rounded-0" id="re_password" placeholder="Repassword" name="re_password">
        </div>
        <div class="form-group ">
          <label class="text-uppercase font-weight-bold" for="roles">Roles</label>
          <input type="number" class="form-control rounded-0" min="0" max="1" id="roles" placeholder="Roles" name="admin_roles">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-danger text-uppercase rounded-0 font-weight-bold">
           Đăng ký
          </button>
        </div>
      </form>
    </div>
  </div>
</div>  
</body>
</html>