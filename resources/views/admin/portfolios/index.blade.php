

@extends('admin.layout.master')
@section('content')

<div  class="container-fluid">
<div class="row">
    <div class="col-12">
        <h2 class="mb-4">All Portfolio</h2>
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
        <th>Image</th>
        <th>Client</th>
        <th>Content</th>
        <th>Category</th>
        <th>Careated At</th>
        <th>Action</th>
    </tr>
@foreach ( $portfolios as $portfolio )
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$portfolio->name}}</td>
        <td>
            <img width="80" src="{{asset('uplods/'.$portfolio->image)}}" alt="">
        </td>
        <td>{{$portfolio->Client}}</td>
        <td>{{$portfolio->content}}</td>
        <td>{{$portfolio->category->name}}</td>
        <td>{{$portfolio->created_at->format('d - m - Y ')}}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="{{route('portfolios.edit',$portfolio->id)}}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{route('portfolios.destroy',$portfolio->id)}}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm ('are you sure ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
@endforeach
</table>
{{$portfolios->links()}}
    </div>
</div>
</div>


@stop
