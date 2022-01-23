

@extends('admin.layout.master')
@section('content')

<div  class="container-fluid">
<div class="row">
    <div class="col-12">
        <h2 class="mb-4">All Category</h2>
        @if (session('success'))
        <div class="alert alert-{{session('type')}} alert-dismissible fade show">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
    @endif
@include('admin.layout.error')

<table class="table">
    <tr class="dark  thead-dark">
        <th>ID</th>
        <th>Name</th>
        <th>Careated At</th>
        <th>Action</th>
    </tr>
@foreach ( $categories as $category )
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->created_at->format('d - m - Y ')}}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="{{route('categories.edit',$category->id)}}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{route('categories.destroy',$category->id)}}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm ('are you sure ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
@endforeach
</table>
{{$categories->links()}}
    </div>
</div>
</div>


@stop
