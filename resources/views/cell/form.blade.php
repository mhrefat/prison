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
<form method="post" action="{{route('cell.form')}}">
@csrf
  <div class="form-group" >
    <label for="cell_name">Cell Name</label>
    <input type="text" required name="cell_name" class="form-control" value="{{old('cell_name')}}"  id="cell_name" aria-describedby="emailHelp" placeholder="Enter Cell Name">
    
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

  <div class="form-group">
    <label for="age">Status</label>
    <select id="status" required name="status" class="form-control">
      <option selected>Choose...</option>
      <option>Active</option>
      <option>Inactive</option>
    </select>
  </div>
  

    

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop