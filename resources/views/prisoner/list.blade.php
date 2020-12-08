@extends('master')
@section('page')

<h1>Prisoners List</h1>
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
<table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prisoner Name</th>
            <th scope="col">Crime</th>
            <th scope="col">Address</th>
            <th scope="col">Punishment</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $key=>$data)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$data->prisoner_name}}</td>
                <td>{{$data->crime}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->punishment}}</td>
                <td>{{$data->age}}</td>
                <td>{{$data->gender}}</td>
                <td>
                   <a class="btn btn-primary" href="{{route('edit.prisoner',$data->id)}}">Edit</a>
                   <a class="btn btn-danger" href="{{route('delete.prisoner',$data->id)}}">Delete</a>
                   <a class="btn btn-warning" href="{{route('view.prisoner',$data->id)}}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
     {!! $list->links() !!}
    </div>

@stop