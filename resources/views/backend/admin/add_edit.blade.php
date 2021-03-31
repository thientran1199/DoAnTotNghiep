@extends('backend.master')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Quản trị viên<small> > {{(request()->is('admin-page/admin/add'))?'Thêm':'Sửa'}}</small></h1>
<div class="card shadow mb-4">
<div class="card-body">
	<form method="post">
		@csrf
		<legend>Thông tin tài khoản</legend>
		<hr>
		<div class="row mb-3">
			<div class="col-sm-3"><b>Tên tài khoản</b></div>
			<div class="col-sm-9"><input class="form-control" type="text" name="stringUsername" {{(isset($admin))?'readonly':''}} value="{{(isset($admin))?$admin->person->account->username:''}}" required></div>
		</div>
		@if($errors->has('stringUsername'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringUsername') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
		@if(isset($admin))
		<div class="row mb-3">
			<div class="col-sm-3"><b>Mật khẩu cũ</b></div>
			<div class="col-sm-9"><input class="form-control" type="password" name="stringOldPassword"></div>
		</div>
		@endif
		<div class="row mb-3">
			<div class="col-sm-3"><b>Mật khẩu mới</b></div>
			<div class="col-sm-9"><input class="form-control" type="password" name="stringPassword" {{(request()->is('admin-page/admin/add'))?'required':''}}></div>
		</div>
		@if($errors->has('stringPassword'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringPassword') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
		<div class="row mb-3">
			<div class="col-sm-3"><b>Nhập lại mật khẩu</b></div>
			<div class="col-sm-9"><input class="form-control" type="password" name="stringRePassword"></div>
		</div>
		@if($errors->has('stringRePassword'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringRePassword') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
		<legend>Thông tin cá nhân</legend>
		<hr>
		<div class="row mb-3">
			<div class="col-md-3"><b>Căn cước</b></div>
			<div class="col-md-9"><input class="form-control" id="intIdentity" type="text" name="intIdentity" placeholder="vd: 001098014016" value="{{(isset($admin))?$admin->identity:''}}" {{(isset($admin))?'readonly':''}} required></div>
		</div>	
		@if($errors->has('intIdentity'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('intIdentity') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
		<div class="row mb-3">
			<div class="col-md-3"><b>Họ tên</b></div>
			<div class="col-md-9"><input class="form-control" id="stringFullName" type="text" name="stringFullName" placeholder="vd: Lung Thị Linh" value="{{(isset($admin))?$admin->person->full_name:''}}" required></div>
		</div>
		@if($errors->has('stringFullName'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringFullName') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
		<div class="row mb-2">
				<div class="col-sm-3"><b>Giới tính</b></div>
				<div class="col-sm-9">
					<input type="radio" name="intGender" value="1" checked>
					<label>Nam</label><br>
					<input type="radio" name="intGender" value="0" {{(isset($admin)&&$admin->person->gender=='Nữ')?'checked':''}}>
					<label>Nữ</label><br>
				</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-3"><b>Địa chỉ</b></div>
			<div class="col-md-9"><input class="form-control" id="stringAddress" type="text" name="stringAddress" placeholder="vd: Hà Nam" value="{{(isset($admin))?$admin->person->address:''}}" required></div>
		</div>
		<div class="row mb-3">
			<div class="col-md-3"><b>Ngày sinh</b></div>
			<div class="col-sm-9"><input class="form-control" id="dateOfBirth" type="date" name="dateOfBirth" min="1920-01-01" max="2010-12-31" value="{{(isset($admin))?$admin->person->date_of_birth:''}}" required></div>
		</div>
		<div class="row mb-3">
			<div class="col-md-3"><b>Số điện thoại</b></div>
			<div class="col-md-9"><input class="form-control" id="stringPhone" type="tel" name="stringPhone" placeholder="vd: 0843330889" required value="{{(isset($admin))?$admin->person->phone:''}}" required></div>
		</div>
		@if($errors->has('stringPhone'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringPhone') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
		<div class="row mb-3">
			<div class="col-md-3"><b>Email</b></div>
			<div class="col-md-9"><input class="form-control" id="stringEmail" type="email" name="stringEmail" placeholder="vd: lunglinh@mail.com" value="{{(isset($admin))?$admin->person->email:''}}"></div>
		</div>
		<div class="row mt-1">
			<div class="col-sm-3"></div>
			<div class="col-sm-9">
				<input type="submit" name="" value="Thực thi" class="btn btn-success">
			</div>
		</div>
	</form>
</div>
</div>
@endsection