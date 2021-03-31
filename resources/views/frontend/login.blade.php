@extends('frontend.master')
@section('title')
	<title>Đăng nhập</title>
@endsection
@section('content')
	<div class="container">
		<div class="row">
		<div class="border bg-white" style="width: 60%;;margin: auto;top: 20px;padding: 30px 10px;">
			<div class="card-header bg-white text-center"><h3>Đăng nhập</h3></div>
			<div class="card-body">
				<form method="post" action="">
					@csrf
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="btn btn-secondary" disabled><i class="fas fa-user"></i></span>
						</div>	
						<input type="text" name="stringUsername" placeholder="Nhập username" class="form-control" required>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="btn btn-secondary" disabled><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="stringPassword" placeholder="Nhập password" class="form-control" required>
					</div>
					<div class="custom-control custom-checkbox mb-3">
					  <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
					  <label class="custom-control-label" for="customCheck1">Duy trì đăng nhập</label>
					</div>
					<input type="submit" name="" class="btn btn-primary btn-user btn-block" value="Đăng nhập"> 
				</form>
				<p class="text-center text-muted  pt-4">Bạn chưa có tài khoản ? <a style="text-decoration: none" href="{{url('/signup')}}">Đăng ký ngay</a></p>
				@if($errors->has('stringUsername'))
								<div class="alert alert-danger alert-dismissible text-center mt-1">{{ $errors->first('stringUsername') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							 	</button>
								</div>
							@endif
			</div>
		</div>
		</div>
	</div>
@endsection