@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                <div class="alert-warning">
                    @foreach($errors->all() as $err)
                    {!!$err.'<br>'!!}
                    @endforeach
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                <form action="{!! route('rsuser.store') !!}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>name </label>
                        <input class="form-control" name="txtName" placeholder="Please Enter  Name" />
                    </div>
                    <div class="form-group">
                        <label>username</label>
                        <input class="form-control" name="txtUser" placeholder="Please Enter username" />
                    </div>

       <button type="submit" class="btn btn-default">User Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        @endsection