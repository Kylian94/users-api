
@extends('layouts.app')

@section('content')

    <h1>User list :</h1><br>
<table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">password</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
          <td class="d-flex align-items-center justify-content-start">
                <form class="mr-2" action="/users/{{ $user->id }}" method="get">
                    {{ method_field('show') }}
                    <button class="btn btn-default" type="submit">See more</button>
                </form>
                <form  class="mr-2" action="/users/{{ $user->id }}" method="post">
                    {{ method_field('delete') }}
                    <button class="btn btn-default" type="submit">Delete</button>
                </form>
                <a class="btn btn-light" href="/users/{{$user->id}}/edit">Edit</a>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    
    
@endsection