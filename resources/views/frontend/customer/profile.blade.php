@extends('frontend.master')
@section('title')
	<title>Thông tin cá nhân</title>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<!-- menu -->
		@include('frontend.customer.menu')
		<!-- end menu -->
		<div class="col-md-9">
			<div class="page-header">
			    <h3>Thông tin cá nhân</h3>
			    <hr> 
			</div>
			<div class="card-body border rounded bg-white">
				<?php 
					$account = Auth::guard('account_customer')->user();
				?>
				<form method="post">
					@csrf
					<div class="form-group row">
						<label class="col-md-3 text-muted">Tên tài khoản</label>
						<input class="col-md-5 form-control" style="background-color: #dddddd" type="text"
						value="{{$account->username}}" 
						readonly>
					</div>
					<div class="form-group row">
						<label for="stringFullName" class="col-md-3 text-muted">Họ và tên</label>
						<input class="col-md-5 form-control" id="stringFullName" type="text" name="stringFullName" placeholder="vd: Lung Thị Linh" value="{{$account->person->full_name}}">
					</div>
					<div class="form-group row">
						<div class="col-md-3 text-muted">Giới tính</div>
						<div class="col-md-5">
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="male" name="intGender" value="1" checked class="custom-control-input">
							  <label class="custom-control-label" for="male">Nam</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="female" name="intGender" value="0" class="custom-control-input" {{($account->person->gender=='Nữ')?'checked':''}}>
							  <label class="custom-control-label" for="female">Nữ</label>
							</div>
						</div>	
					</div>
					<div class="form-group row">
						<label for="stringAddress" class="col-md-3 text-muted">Địa chỉ</label>
						<input class="col-md-5 form-control" id="stringAddress" type="text" name="stringAddress" placeholder="vd: Hà Nam" value="{{$account->person->address}}">
					</div>
					<div class="form-group row">
						<label for="dateOfBirth" class="col-md-3 text-muted">Ngày sinh</label>
						<input class="col-md-5 form-control" id="dateOfBirth" type="date" name="dateOfBirth" value="{{$account->person->date_of_birth}}" min="1920-01-01" max="2010-12-31">
					</div>
					<div class="form-group row">
						<label for="stringPhone" class="col-md-3 text-muted">Số điện thoại</label>
						<input class="col-md-5 form-control" pattern="[0-9]{10}" id="stringPhone" type="tel" name="stringPhone" placeholder="vd: 0843330889" required value="{{$account->person->phone}}">
					</div>
					<div class="form-group row">
						<label for="stringEmail" class="col-md-3 text-muted">Email</label>
						<input class="col-md-5 form-control" id="stringEmail" type="email" name="stringEmail" placeholder="vd: lunglinh@mail.com" value="{{$account->person->email}}">
					</div>
					<input type="submit" name="" class="btn btn-success d-flex justify-content-center" value="Thực thi" style="margin-left: 40%;width: 20%">
				</form>
			</div>  			
		</div>
	</div>
</div>
@endsection