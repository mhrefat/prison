@extends('master')

@section('page')
<div class="container">
<h3>Category List</h3>


    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Capacity of Cell Category</th>
                <th scope="col">Description</th>
               
            </tr>
            </thead>
            <tbody>
@foreach($categories as $key=>$category)

            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->capacity}}</td>
                <td>{{$category->description}}</td>
                

                <td>
                    <a class="btn btn-primary" href="{{route('edit.category',$category->id)}}">Edit</a>
                    <a class="btn btn-danger" onclick="return confirm('Are you sure?')"  href="{{route('delete.category',$category->id)}}">Delete</a>
{{--                    <a class="btn btn-warning" href="">View</a>--}}
           {{--     <a class="btn btn-success" href="rou }}te('category.all.products',$category->id)}}">View all Prison Cell</a> --}}

                </td>
            </tr>
@endforeach
            </tbody>



        </table>
        {{$categories->links()}}
    </div>

    @stop
