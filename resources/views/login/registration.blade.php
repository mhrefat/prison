

<div class="container">

<!--Registration Form -->
@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p style="color:green" class="alert alert-danger">{{$er}}</p>
    @endforeach  
@endif

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
      border-bottom: 2px solid #2f1c5a;
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
      .h1{
         color: #08da94; 
      }
    </style>
</head>
<h1 class="h1" style="text-align: center">Registration Form</h1>


<!--login content-->





<form method="post" action="{{route('registration.form')}}" enctype="multipart/form-data">
@csrf
  <div class="form-group" >
    <label for="name">Jailor Name</label>
    <input type="text" required name="name" class="form-control" value="{{old('name')}}"  id="name" aria-describedby="emailHelp" placeholder="Enter your name">
  </div>

  <div class="form-group" >
    <label for="username">User Name</label>
    <input type="text" required name="username" class="form-control" value="{{old('username')}}"  id="username" aria-describedby="emailHelp" placeholder="Enter your username">
  </div>

  <div class="form-group" >
    <label for="nid">Jailor NID</label>
    <input type="number" required name="nid" min="0" oninput="validity.valid||(value='');" class="form-control" value="{{old('nid')}}"  id="nid" aria-describedby="emailHelp" placeholder="Enter your NID">
    
  </div>

  <div class="form-group">
    <label for="age">Age</label>
    <input type="number" name="age" class="form-control" value="{{old('age')}}" id="age" placeholder="Enter your age">
  </div>
  
  <div class="form-group">
    <label for="address">Address</label>
    <input type="string" name="address" class="form-control" value="{{old('address')}}" id="address" placeholder="Enter your address">
  </div>
   
  <div class="form-group">
      <label for="gender">Gender</label>
      <select id="gender" required name="gender" class="form-control"> value="{{old('gender')}}"
        <option selected>Choose...</option>
        <option>male</option>
        <option>female</option>
      </select>
    </div>
   
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" placeholder="Enter your email">
      </div>
    
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" value="" id="password" placeholder="Enter your password">
      </div>
      
      <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" name="image" class="form-control" value="" id="image" placeholder="Select Image">
      </div>

 <div class="form-group">
  <button type="submit" class="btn btn-primary">Submit</button>
 </div>
  
</form>

