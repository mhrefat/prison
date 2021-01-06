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
<form method="post" action="{{route('visitor.form')}}">
@csrf
  <div class="form-group" >
    <label for="visitor_name">Visitor Name</label>
    <input type="text" required name="visitor_name" class="form-control" value="{{old('visitor_name')}}"  id="visitor_name" aria-describedby="emailHelp" placeholder="Enter Visitor name">
    
  </div>

  <div class="form-group">
    <label for="nid">Visitor NID</label>
    <input type="number" name="nid"  min="0" oninput="validity.valid||(value='');" class="form-control" id="nid" placeholder="Enter Visitor NID">
  </div>

  <div class="form-group">
    <label for="relation">Relation</label>
    <input type="text" name="relation" class="form-control" id="relation" placeholder="Enter the Relation">
  </div>

  <div class="form-group">
    <label for="mobile">Mobile Number</label>
    <input type="number" name="mobile" class="form-control" id="mobile" placeholder="Enter Visitor Mobile Number">
  </div>

  <div class="form-group">
    <label for="address">Visitor Address</label>
    <input type="text" name="address" class="form-control" id="address" placeholder="Enter Visitor Address">
  </div>
     
  
  <div class="form-group">
    <label for="time">Visiting Time</label>
    <input type="time" name="time" class="form-control" id="time" placeholder="Enter Visitor Visiting Time">
  </div>

  <div class="form-group">
    <label for="date">Visiting Date</label>
    <input type="date" name="date" class="form-control" id="date" placeholder="Enter Visitor Visiting Time">
  </div>
   
  <div class="form-group">
      <label for="gender">Gender</label>
      <select id="gender" required name="gender" class="form-control">
        <option selected>Choose...</option>
        <option>male</option>
        <option>female</option>
      </select>
    </div>

    <div class="form-group">
      <label for="purpose">Visiting Purpose</label>
      <textarea type="text" name="purpose" class="form-control" id="purpose" placeholder="Purpose of Visiting" cols="20" rows="5"></textarea>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop