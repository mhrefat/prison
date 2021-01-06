

<!DOCTYPE html>
<html lang="en">
<head>
<title>Jailor Login Form</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<style type="text/css">
      body{
      background-image:  url('{{asset('/style/img/2243354.jpg')}}');
      height: 100vh;
      background-size: cover;
      font-family: 'Baloo Chettan 2', cursive;
      }
      .col-md-4{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      }
      form{
      background-color:rgba(0,0,0,0.7);
      box-shadow: 0 0 10px rgba(0,0,0,0.7);
      padding: 30px;
      }
      label{
      color: #fff;
      }
      .form-control{
      height: 50px;
      border: none;
      border-bottom: 2px solid #313131;
      background: none;
      font-size: 20px;
      border-radius: 0px;
      }
      .form-control:active{
      outline: none;
      border: none;
      }
      .form-control:focus{
      background: none;
      box-shadow: none;
      outline: none;
      border:none;
      color: #fff;
      border-bottom: 2px solid #000;
      outline: 0;
      }
      .form-control:hover{
      border-bottom: 2px solid #000;
      outline: none;
      border-color: none;
      }
      .btn-custom{
      background-color: #121212;
      border-color: #1a1a1a;
      color: #fff;
      }
      .btn-custom{
      color: #fff !important;
      }
      .btn.focus, .btn:focus {
      box-shadow: none !important;
      }
    
    </style>
</head>

<!--alert message-->
@if(session()->has('message'))
    <p style="color:green" class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach  
@endif


<!--login content-->
<body>
<div class="container">
<div class="row">
<div class="col-md-8">
</div>
<div class="col-md-4">

<form action="{{ route('login.process') }}" method="post" class="pt-5">
  @csrf
<div class="form-group">
    <h1 style="color:green">KODEEO PRISON</h1>
<label for="email">Username</label>
<input name="email" type="email" class="form-control" placeholder="Enter email" id="email">
</div>
<div class="form-group">
<label for="password">Password</label>
<input name="password" type="password" class="form-control" placeholder="Enter password" id="password">
</div>
<div class="form-group form-check">
<label class="form-check-label">
<input class="form-check-input" type="checkbox"> Remember me
</label>
</div>
<button type="submit" class="btn btn-custom">Login</button> <a href="/prison/public/registration">Register Here!!!</a>
</form>
</div>
</div>
</div>
</body>
</html>