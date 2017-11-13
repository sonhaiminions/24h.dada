@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div style="margin-bottom: 15px;">
                <form action="admin/user/search" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" name="search">
                    <input type="submit" name="gui" value="tim">
                </form>
            </div>
            @if (session('success'))
            <div class="alert alert-success">
              <p>{{ session('success') }}</p>
          </div>
          @endif
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên </th>
                    <th>user</th>
                    <th>email</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $key)
                <tr class="even gradeC" align="center">
                    <td>{{$key->id}}</td>
                    <td>{{$key->name}}</td>
                    <td>{{$key->user}}</td>
                    <td>{{$key->email}}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$key->id}}"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$key->id}}">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection