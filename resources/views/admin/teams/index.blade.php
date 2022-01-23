

@extends('admin.layout.master')
@section('content')

<div  class="container-fluid">
<div class="row">
    <div class="col-12">
        <h2 class="mb-4">All Team</h2>
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
        <th>Job</th>
        <th>Careated At</th>
        <th>Action</th>
    </tr>
@foreach ( $teams as $team )
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$team->name}}</td>
        <td>
            <img width="80" src="{{asset('uplods/'.$team->image)}}" alt="">
        </td>
        <td>{{$team->job}}</td>
        <td>{{$team->created_at->format('d - m - Y ')}}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="{{route('teams.edit',$team->id)}}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{route('teams.destroy',$team->id)}}" method="POST">
                @csrf
                @method('delete')
                <button onclick="return confirm ('are you sure ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
@endforeach
</table>
{{$teams->links()}}
    </div>
</div>
</div>


@stop
