@extends('layouts.app')

@section('content')
<h1>User information :</h1><br>
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
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
          <td class="d-flex align-items-center justify-content-center">
          <a class="btn btn-light" href="/users/{{$user->id}}/edit">Edit</a>
          </td>
          </tr>
        </tbody>
      </table>
    
@endsection