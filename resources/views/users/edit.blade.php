
@extends('layouts.app')

@section('content')

@if (Session::get('message'))
    <div class="alert alert-danger">
        <ul>
          <li>{{ Session::get('message') }}</li>
        </ul>
    </div>
@endif
    <h1>Add users</h1>
    

    

    <form action="/users/{{$user->id}}" method="post" class="col-6 d-flex flex-column align-items-start">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <input type="text" class="col-8 py-1 my-1" name="name" placeholder="name" value="{{$user->name}}">
    <input type="email" class="col-8 py-1 my-1" name="email" placeholder="email" value="{{$user->email}}" >
    <input type="password" class="col-8 py-1 my-1" name="password" placeholder="password" value="{{$user->password}}">
    <div class="mt-2 p-0 col-8">
        <button type="submit" class="btn btn-info">Edit</button>
    </div>
        
    </form>
@endsection