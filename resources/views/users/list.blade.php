
@extends('layouts.app')

@section('content')
@if (Session::get('message'))
    <div class="alert alert-success">
        <ul>
          <li>{{ Session::get('message') }}</li>
        </ul>
    </div>
@endif
    <h1>User list :</h1><br>
<table class="table table-striped table-hover table-responsive">
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
            <td>{{ Str::limit($user->password, 20) }}</td>
          <td class="d-flex align-items-center justify-content-start">
                <form class="mr-2" action="/users/{{ $user->id }}" method="get">
                    {{ method_field('show') }}
                    <button class="btn btn-default" type="submit">See more</button>
                </form>
                {{-- <form  class="mr-2" action="/users/{{ $user->id }}" method="post">
                    {{ method_field('delete') }}
                    <button class="btn btn-default" type="submit">Delete</button>
                </form> --}}
                <a class="btn btn-info mr-2" href="/users/{{$user->id}}/edit">Edit</a>
                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$user->id}})" 
                  data-target="#DeleteModal" class="btn btn-xs btn-danger mr-2"><i class="fa fa-trash"></i> Delete</a>
                <div id="DeleteModal" class="modal fade text-danger" role="dialog">
                  <div class="modal-dialog ">
                    <!-- Modal content-->
                    <form action="" id="deleteForm" method="post">
                        <div class="modal-content">
                            <div class="modal-header bg-danger d-flex align-items-center justify-content-center">
                                <button type="button" class="close m-0" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title text-center text-white">DELETE CONFIRMATION</h4>
                            </div>
                            <div class="modal-body">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <p class="text-center">Are You Sure Want To Delete ?</p>
                            </div>
                            <div class="modal-footer">
                                <center>
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                                </center>
                            </div>
                        </div>
                    </form>
                  </div>
                 </div>
                
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <script>
      
      function deleteData(id) {
          var id = id;
          var url = '{{ route("users.destroy", ":id") }}';
          url = url.replace(':id', id);
          $("#deleteForm").attr('action', url);
      }

      function formSubmit() {
          $("#deleteForm").submit();
      }

      </script>
    
@endsection