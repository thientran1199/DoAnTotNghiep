@extends('backend.master')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Danh mục<small> > {{(request()->is('admin-page/category/add'))?'Thêm':'Sửa'}}</small></h1>
<div class="card shadow mb-4">
<div class="card-body">
		<form action="" method="post">
			@csrf
			<div class="row">
				<div class="col-sm-3"><b>Tên danh mục</b></div>
				<div>
					<input type="text" name="stringName" value="{{isset($category->name)?$category->name:''}}" placeholder="Nhập tên danh mục" class="form-control">
				</div>
			</div>
			@if($errors->has('stringName'))
				<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringName') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			 	</button>
				</div>
			@endif
			<div class="row" style="margin-top:5px;">
				<div class="col-sm-3"></div>
				<div>
					<input type="submit" name="" value="Thực thi" class="btn btn-success">
				</div>
			</div>
		</form>
</div>
</div>
@endsection