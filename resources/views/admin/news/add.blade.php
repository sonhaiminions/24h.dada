@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New
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
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form action="admin/news/postadd"  method="POST"
    enctype="multipart/form-data"
                >
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="form-group">
                    <label>Tiêu đề</label>
                    <input class="form-control" name="txttitle" placeholder="Please Enter Category Name" />
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    <select class="form-control" name="category">
                     @foreach($cate as $ct)
                     <option value="{{$ct->id}}">{{$ct->name}}</option>
                     @endforeach
                 </select>
             </div>



             <div class="form-group">
                <label>Nội dung</label>
                <textarea name="txtcontent" class="form-control ckeditor" row="3"></textarea>
            </div>
            <div class="form-group">
                <label>hình ảnh</label>
                <input type="file"  name="txtimg" placeholder="Please Enter Category Keywords" />
            </div>


            <button type="submit" class="btn btn-default">New Add</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection