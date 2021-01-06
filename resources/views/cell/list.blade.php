@extends('master')

@section('page')
<div class="container">
<h1>Prison Cell List</h1>


    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cell Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
@foreach($list as $key=>$data)

            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$data->cell_name}}</td>
                <td>{{$data->category->name}}</td>
                <td>{{$data->status}}</td>

                <td>
                   <a class="btn btn-primary" href="">Edit</a>
                    <a class="btn btn-danger" href="">Delete</a>
                    <a class="btn btn-warning" href="">View</a>

                </td>
            </tr>
@endforeach
            </tbody>



        </table>
        {{$list->links()}}
    </div>

    @stop
