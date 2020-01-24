
@extends('layouts.app')

@section('content')
<h1>Add users</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::get('message'))
    <div class="alert alert-danger">
        <ul>
          <li>{{ Session::get('message') }}</li>
        </ul>
    </div>
@endif
    <form action="/users" method="post" class="col-6 d-flex flex-column align-items-start">
        @csrf
    <input type="text" class="col-8 py-1 my-1" name="name" placeholder="name" value="{{ old('name') }}">
    <input type="email" class="col-8 py-1 my-1" name="email" placeholder="email" value="{{ old('email') }}">
    <input type="password" class=" col-8 py-1 my-1" name="password" placeholder="password">
    <div class="mt-2 p-0 col-8">
        <button type="submit" class="btn btn-success">Create</button>
    </div>
    </form>
@endsection