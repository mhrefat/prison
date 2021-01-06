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

  <div class="form-group" >
    <label for="nid">Prisoner NID</label>
    <input type="number" required name="nid"  min="0" oninput="validity.valid||(value='');" class="form-control" value="{{old('nid')}}"  id="nid" aria-describedby="emailHelp" placeholder="Enter Prisoner Name">
    
  </div>

  <div class="form-group">
    <label for="crime">Crime</label>
    <input type="text" name="crime" class="form-control" id="crime" placeholder="Enter Prisoner Crime">
  </div>

  <div class="form-group">
    <label for="crime_details">Crime Details</label>
    <textarea type="text" name="crime_details" class="form-control" id="crime_details" placeholder="Details of Prisoner Crime" cols="20" rows="5"></textarea>
  </div>

  <div class="form-group">
    <label for="case">Case Category</label>
    <select class="form-control" name="case" id="case">
      <option selected>Choose...</option>
        @foreach ($cases as $case)
        <option value="{{$case->id}}">{{$case->name}}</option>
        @endforeach
    </select>  
</div>

  <div class="form-group">
    <label for="category">Cell Category</label>
    <select class="form-control" name="category" id="category">
      <option selected>Choose...</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>  
 </div>
 <!--category controller-->
  <div class="form-group">
    <label for="cell">Cell Name</label>
    <select class="form-control" name="cell" id="cell">
      <option selected>Choose...</option>
        @foreach ($cells as $cell)
        <option value="{{$cell->id}}">{{$cell->cell_name}}</option>
        @endforeach
    </select>  
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
    <label for="date_in">Date In</label>
    <input type="date" name="date_in" class="form-control" id="date_in" placeholder="Entrance Date">
  </div>

  <div class="form-group">
    <label for="date_out">Date Out</label>
    <input type="date" name="date_out" class="form-control" id="date_out" placeholder="Release Date">
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