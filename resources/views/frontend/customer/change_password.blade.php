@extends('frontend.master')
@section('title')
	<title>Thay đổi mật khẩu</title>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<!-- menu -->
		@include('frontend.customer.menu')
		<!-- end menu -->
		<div class="col-md-9">
			<div class="page-header">
			    <h3>Thay đổi mật khẩu</h3>
			    <hr> 
			</div>
			<div class="card-body border rounded bg-white">
				<form method="post">
					@csrf
					<div class="form-group row">
						<label for="stringOldPassword" class="col-md-3 text-muted">Mật khẩu cũ <b style="color: red">*</b></label>
						<input class="col-md-5 form-control" id="stringOldPassword" type="password" name="stringOldPassword" placeholder="Nhập mật khẩu cũ" required>
					</div>
					<div class="form-group row">
						<label for="stringOldPassword" class="col-md-3 text-muted">Mật khẩu mới <b style="color: red">*</b></label>
						<input class="col-md-5 form-control" id="stringPassword" type="password" name="stringPassword" placeholder="Nhập mật khẩu mới" required>
					</div>
					@if($errors->has('stringPassword'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringPassword') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
					<div class="form-group row">
						<label for="stringOldPassword" class="col-md-3 text-muted">Nhập lại mật khẩu <b style="color: red">*</b></label>
						<input class="col-md-5 form-control" id="stringRePassword" type="password" name="stringRePassword" placeholder="Nhập lại mật khẩu mới" required>
					</div>
					@if($errors->has('stringRePassword'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringRePassword') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
					<input type="submit" name="" class="btn btn-success d-flex justify-content-center" value="Thực thi" style="margin-left: 40%;width: 20%">
				</form>
			</div>  			
		</div>
	</div>
</div>
@endsection