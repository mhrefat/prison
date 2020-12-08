
@extends('master')
@section('page')
<div class="container"> 
<h1>
Jailor Registration Form
</h1>
@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach  
@endif

<form method="post" action="{{route('update.jailor',$jailor->id)}}">
@csrf
  <div class="form-group" >
    <label for="jailor_name">Jailor Name</label>
    <input type="text" required name="jailor_name" class="form-control" value="{{$jailor->jailor_name}}"  id="jailor_name" aria-describedby="emailHelp" placeholder="Enter your name">
    
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email"value="{{$jailor->email}}" >
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password"value="{{$jailor->password}}" >
  </div>

  <div class="form-group">
    <label for="age">Age</label>
    <input type="number" name="age" class="form-control" id="age" placeholder="Enter your age"value="{{$jailor->age}}" >
  </div>
  
  <div class="form-group">
    <label for="address">Address</label>
    <input type="string" name="address" class="form-control" id="address" placeholder="Enter your address"value="{{$jailor->address}}" >
  </div>
   
  <div class="form-group">
      <label for="gender">Gender</label>
      <select id="gender" required name="gender" class="form-control"value="{{$jailor->gender}}" >
        <option selected>Choose...</option>
        <option>male</option>
        <option>female</option>
      </select>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop