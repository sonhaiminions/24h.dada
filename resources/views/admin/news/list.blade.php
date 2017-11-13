@extends('admin.layout.index')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">New
                            <small>List</small>
                        </h1>
                    </div>
                     <div style="margin-bottom: 15px;">
                <form action="admin/news/search" method="POST">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" name="search">
                    <input type="submit" name="gui" value="tim">
                </form>
            </div>
                    @if(session('thongbao'))
                    <div class="alert alert-success">
                        <p>{{session('thongbao')}}</p>
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>thể loại</th>
                                <th>Nội Dung</th>
                                <th>Hình ảnh</th>
                                <th>lượt xem</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($new as $key)
                            <tr class="odd gradeX" align="center">

                                <td>{{$key->id}}</td>
                                <td>{{$key->title}}</td>
                                <td>{{$key->id_cat}}</td>
                                <td>{{$key->content}}</td>
                                <td>{{$key->img}}</td>
                                <td>{{$key->view}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/news/delete/{{$key->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/news/edit/{{$key->id}}">Edit</a></td>
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