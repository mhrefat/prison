@extends('master')

@section('page')
<div class="container">
    <h4>Create New Cell Category</h4>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif

    @if(session()->has('msg'))
        <p class="alert alert-success">{{session()->get('msg')}}</p>
    @endif
    

    <form method="post" action="{{route('category.form')}}">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input name="name" required placeholder="Enter Category Name" type="text" class="form-control"
                   id="name">
        </div>

        <div class="form-group">
            <label for="capacity">Capacity of Cell Category</label>
            <input type="number" name="capacity" required placeholder="     " type="text" class="form-control"
                   id="capacity">
        </div>


        <div class="form-group">
            <label for="price">Category Description</label>
            <textarea name="description" id="" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
