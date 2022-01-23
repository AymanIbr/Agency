@extends('admin.layout.master')
@section('content')


<form action="{{route('portfolios.store')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4"> Add New Portfolio</h2>
            @include('admin.layout.error')
            <div class="mb-3">
                <input type="text" placeholder="Name" name="name" class="form-control" value="{{old('name')}}">
                </div>
                <div class="mb-3">
                    <label>Image</label>
                    <input type="file" name="image"class="form-control" >
                </div>
                <div class="mb-3">
                    <input type="text" placeholder="Content" name="content" class="form-control" value="{{old('content')}}">
                    </div>
                        <div class="mb-3">
                            <input type="text" placeholder="Client" name="Client" class="form-control" value="{{old('Client')}}">
                            </div>
                            <div class="mb-3">
                                <select name="category_id" class="form-control">
                                    <option value="" selected disabled>Selected Category</option>
                                    @foreach ( $categories as $category )
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                <button class="btn btn-info px-5">Add</button>
        </div>
    </div>
</div>

</form>

@stop
