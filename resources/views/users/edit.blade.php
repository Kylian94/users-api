
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
    

    

    <form action="/users/{{$user->id}}" method="post">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <input type="text" name="name" placeholder="name" value="{{$user->name}}">
    <input type="email" name="email" placeholder="email" value="{{$user->email}}" >
    <input type="password" name="password" placeholder="password" value="{{$user->password}}">
        <button type="submit">Edit</button>
    </form>
@endsection