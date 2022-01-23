@extends('admin.layout.master')
@section('content')


<form action="{{route('portfolios.update',$portfolio->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"> Update Portfolio</h2>
@include('admin.layout.error')
<div class="mb-3">
    <label >Name</label>
    <input type="text" placeholder="Name" name="name" class="form-control" value="{{$portfolio->name}}">
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image"class="form-control" >
        <img class="mt-1" width="80" src="{{asset('uplods/'.$portfolio->image)}}" alt="">
    </div>
    <div class="mb-3">
        <label>content</label>
        <input type="text" placeholder="Content" name="content" class="form-control" value="{{$portfolio->content}}">
        </div>
            <div class="mb-3">
                <label>Client</label>
                <input type="text" placeholder="Client" name="Client" class="form-control" value="{{$portfolio->Client}}">
                </div>
                <div class="mb-3">
                    <select name="category_id" class="form-control">
                        <option value="" selected disabled>Selected Category</option>
                        @foreach ( $categories as $category )
                            <option {{$category->id == $portfolio->category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    </div>
                <button class="btn btn-success px-5">Update</button>
        </div>
    </div>
</div>

</form>

@stop
