@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Category
					<small>Edit</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-7" style="padding-bottom:120px">
				@if(count($errors)>0)
				<div class="errors">
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
				<form action="admin/category/postedit/{{$cate->id}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">

						<label>Tên thể loại</label>
						<input class="form-control" name="txtCateName" placeholder="Please Enter Category Name"  value="{{$cate->name}}" />
					</div>
					<div class="form-group">

						<label>Mô tả</label>
						<input class="form-control" name="txtCateDes" placeholder="Please Enter Category Describ"  value="{{$cate->des}}" />
					</div>


					<button type="submit" class="btn btn-default">Cập nhật</button>
					<button type="reset" class="btn btn-default">Reset</button>
					<form>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		@endsection