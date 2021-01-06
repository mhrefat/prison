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
<form method="post" action="{{route('update.prisoner',$prisoner->id)}}">
@csrf

  <div class="form-group" >
    <label for="prisoner_name">Prisoner Name</label>
    <input type="text" required name="prisoner_name" class="form-control" value="{{$prisoner->prisoner_name}}"  id="prisoner_name" aria-describedby="emailHelp" placeholder="Enter Prisoner Name">
    
  </div>

  <div class="form-group" >
    <label for="nid">Prisoner NID</label>
    <input type="number" required name="nid" class="form-control" value="{{$prisoner->nid}}"  id="nid" aria-describedby="emailHelp" placeholder="Enter Prisoner NID">
    
  </div>

  <div class="form-group">
    <label for="crime">Crime</label>
    <input type="text" name="crime" class="form-control" value="{{$prisoner->crime}}" id="crime" placeholder="Enter Prisoner Crime">
  </div>

  <div class="form-group">
    <label for="crime_details">Crime Details</label>
    <textarea type="text" name="crime_details" class="form-control" value="{{$prisoner->crime_details}}" id="crime_details" placeholder="Details of Prisoner Crime" cols="20" rows="5"></textarea>
  </div>


  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" class="form-control" value="{{$prisoner->address}}" id="address" placeholder="Enter Prisoner Address">
  </div>

  <div class="form-group">
    <label for="punishment">Punishment</label>
    <input type="text" name="punishment" class="form-control" value="{{$prisoner->punishment}}" id="punishment" placeholder="Prisoner Punishment">
  </div>

  <div class="form-group">
    <label for="age">Age</label>
    <input type="number" name="age" class="form-control" value="{{$prisoner->age}}" id="age" placeholder="Enter Prisoner age">
  </div>
   
  <div class="form-group">
      <label for="gender">Gender</label>
      <select id="gender" required name="gender" class="form-control" value="{{$prisoner->gender}}"> 
        <option selected>Choose...</option>
        <option>male</option>
        <option>female</option>
      </select>
    </div>

    <div class="form-group">
      <label for="status">Status</label>
      <select id="status" required name="status" class="form-control">
        <option selected>Choose...</option>
        <option>Active</option>
        <option>Bailed</option>
      </select>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop