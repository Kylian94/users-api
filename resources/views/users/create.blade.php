
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
    <form action="/users" method="post">
        @csrf
    <input type="text" name="name" placeholder="name" <?php if($user ?? '') : ?> value="{{$user->name}}" <?php endif; ?> >
    <input type="email" name="email" placeholder="email" <?php if($user ?? '') : ?> value="{{$user->email}}" <?php endif; ?> >
    <input type="password" name="password" placeholder="password" <?php if($user ?? '') : ?> value="{{$user->password}}" <?php endif; ?> >
    <button type="submit">Create</button>
    
    
    </form>
@endsection