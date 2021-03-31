@extends('frontend.master')
@section('title')
	<title>Đăng ký tài khoản khách hàng</title>
@endsection
@section('content')
	<div class="container pb-4">
		<div class="row">
		<div class="border bg-white" style="width: 90%;margin: auto;top: 20px;padding: 30px 10px;">
			<div class="card-header bg-white text-center"><h3>Đăng ký tài khoản khách hàng</h3></div>
			<div class="card-body">
				<form method="post" action="">
					@csrf
					<div class="row mb-3">
						<div class="col-md-5">
							<h6 class="mb-3 text-center card-header">Tài khoản đăng nhập</h6>
							<div class="form-group row">
								<label for="stringUsername" class="col-md-6">Tên người dùng <b style="color: red">*</b></label>
								<input id="stringUsername" class="col-md-6 form-control" type="text" name="stringUsername" placeholder="vd: customertest2" required>
							</div>
							@if($errors->has('stringUsername'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringUsername') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
							<div class="form-group row">
								<label for="stringPassword" class="col-md-6">Mật khẩu <b style="color: red">*</b></label>
								<input id="stringPassword" class="col-md-6 form-control" type="password" name="stringPassword" placeholder="vd: 12345" required>
							</div>
							@if($errors->has('stringPassword'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringPassword') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
							<div class="form-group row">
								<label for="stringRePassword" class="col-md-6">Nhập lại mật khẩu <b style="color: red">*</b></label>
								<input id="stringRePassword" class="col-md-6 form-control" type="password" name="stringRePassword" placeholder="vd: 12345" required>
							</div>
							@if($errors->has('stringRePassword'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringRePassword') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
						</div>
						<!-- chia đôi -->
						<div class="col-md" style="border-right:1px solid #dddddd;max-width: 20px;margin-right: 20px"></div>
						<div class="col-md-6">
							<h6 class="mb-3 text-center card-header">Thông tin cá nhân</h6>
							<div class="form-group row">
								<label for="stringFullName" class="col-md-5">Họ và tên <b style="color: red">*</b></label>
								<input class="col-md-7 form-control" id="stringFullName" type="text" name="stringFullName" placeholder="vd: Lung Thị Linh" required>
							</div>
							@if($errors->has('stringFullName'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringFullName') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
							<div class="form-group row">
								<div class="col-md-5">Giới tính</div>
								<div class="col-md-7">
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="male" name="intGender" value="1" checked class="custom-control-input">
									  <label class="custom-control-label" for="male">Nam</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="female" name="intGender" value="0" class="custom-control-input">
									  <label class="custom-control-label" for="female">Nữ</label>
									</div>
								</div>	
							</div>
							<div class="form-group row">
								<label for="stringAddress" class="col-md-5">Địa chỉ <b style="color: red">*</b></label>
								<input class="col-md-7 form-control" id="stringAddress" type="text" name="stringAddress" placeholder="vd: Hà Nam" required>
							</div>
							<div class="form-group row">
								<label for="dateOfBirth" class="col-md-5">Ngày sinh <b style="color: red">*</b></label>
								<input class="col-md-7 form-control" id="dateOfBirth" type="date" name="dateOfBirth" min="1920-01-01" max="2010-12-31" required>
							</div>
							<div class="form-group row">
								<label for="stringPhone" class="col-md-5">Số điện thoại <b style="color: red">*</b></label>
								<input class="col-md-7 form-control" id="stringPhone" type="tel" name="stringPhone" placeholder="vd: 0843330889" required>
							</div>
							@if($errors->has('stringPhone'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringPhone') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
							<div class="form-group row">
								<label for="stringEmail" class="col-md-5">Email</label>
								<input class="col-md-7 form-control" id="stringEmail" type="email" name="stringEmail" placeholder="vd: lunglinh@mail.com">
							</div>
						</div>
					</div>
					<input type="submit" name="" class="btn btn-primary btn-user btn-block" value="Đăng ký"> 
				</form>
			</div>
		</div>
		</div>
	</div>
@endsection