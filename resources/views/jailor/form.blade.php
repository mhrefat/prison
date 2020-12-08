@extends('master')
@section('page')

<div class="container">

<!--alert message-->
@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
    @endforeach  
@endif

<!--Prisoner Form -->
<form method="post" action="{{route('jailor.form')}}">
@csrf
  <div class="form-group" >
    <label for="jailor_name">Jailor Name</label>
    <input type="text" required name="jailor_name" class="form-control" value="{{old('jailor_name')}}"  id="jailor_name" aria-describedby="emailHelp" placeholder="Enter your name">
    
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
  </div>

  <div class="form-group">
    <label for="age">Age</label>
    <input type="number" name="age" class="form-control" id="age" placeholder="Enter your age">
  </div>
  
  <div class="form-group">
    <label for="address">Address</label>
    <input type="string" name="address" class="form-control" id="address" placeholder="Enter your address">
  </div>
   
  <div class="form-group">
      <label for="gender">Gender</label>
      <select id="gender" required name="gender" class="form-control">
        <option selected>Choose...</option>
        <option>male</option>
        <option>female</option>
      </select>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop