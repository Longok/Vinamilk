<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('./favicon.ico')}}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Vinamilk Demo</title>
 
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/asset/font-icon/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('/asset/css/sweetalert.css')}}">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script src="{{asset('/asset/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('/asset/js/sweetalert.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <link rel="stylesheet" href="{{asset('/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('/style.css')}}">
</head>

<body>    
  @section('content')

  @show  
  @yield('script')  
</body>
<!-- <script>
  $(document).ready(function(){
    swal("Hello world!");
  });
</script> -->
</html>
