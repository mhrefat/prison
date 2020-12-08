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

<!--Jailor Form -->
<form method="post" action="{{route('prisoner.form')}}">
@csrf

  <div class="form-group" >
    <label for="prisoner_name">Prisoner Name</label>
    <input type="text" required name="prisoner_name" class="form-control" value="{{old('prisoner_name')}}"  id="prisoner_name" aria-describedby="emailHelp" placeholder="Enter Prisoner Name">
    
  </div>

  <div class="form-group">
    <label for="crime">Crime</label>
    <input type="text" name="crime" class="form-control" id="crime" placeholder="Enter Prisoner Crime">
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Prisoner Address">
  </div>

  <div class="form-group">
    <label for="punishment">Punishment</label>
    <input type="text" name="punishment" class="form-control" id="punishment" placeholder="Prisoner Punishment">
  </div>

  <div class="form-group">
    <label for="age">Age</label>
    <input type="number" name="age" class="form-control" id="age" placeholder="Enter Prisoner age">
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