@extends('layouts.admin')

@section('title')
    Users
 @stop
@section('content')
    @if(Session::has('updated'))
        <p class="bg-success">{{session('updated')}}</p>
        @endif
    @if(Session::has('created'))
        <p class="bg-success">{{session('created')}}</p>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
             <th>Role</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><img height="50" src="{{asset('/images/'.($user->image))}}" alt=""></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td><a href="{{url('admin/users/' . $user->id .'/edit')}}" role="button" class="btn btn-info" >Edit</a></td>

          </tr>
            @endforeach
         @endif
        </tbody>
      </table>
@stop