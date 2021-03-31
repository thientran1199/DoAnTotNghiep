@extends('frontend.master')
@section('title')
	<title>Địa chỉ giao hàng</title>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<!-- menu -->
		@include('frontend.customer.menu')
		<!-- end menu -->
		<div class="col-md-9">
			<div class="page-header">
			    <h3>Địa chỉ giao hàng<small> >{{(request()->is('customer/shipping-address/add'))?'Thêm':'Sửa'}}</small> </h3>
			    <hr>
			</div>
			<div class="card-body border rounded bg-white">
				<form method="post">
					@csrf
					<div class="form-group row">
						<label for="stringRecipientName" class="col-md-3 text-muted">Họ và tên <b style="color: red">*</b></label>
						<input class="col-md-5 form-control" id="stringRecipientName" type="text" name="stringRecipientName" value="{{isset($customerShippingAddress->recipient_name)?$customerShippingAddress->recipient_name:''}}" required>
					</div>
					<div class="form-group row">
						<label for="stringRecipientPhone" class="col-md-3 text-muted">Điện thoại <b style="color: red">*</b></label>
						<input class="col-md-5 form-control" id="stringRecipientPhone" type="tel" name="stringRecipientPhone" value="{{isset($customerShippingAddress->recipient_phone)?$customerShippingAddress->recipient_phone:''}}" required>
					</div>
					<div class="form-group row">
						<label for="stringProvince" class="col-md-3 text-muted">Tỉnh/thành phố <b style="color: red">*</b></label>
						<input class="col-md-5 form-control" id="stringProvince" type="text" name="stringProvince" value="{{isset($customerShippingAddress->province)?$customerShippingAddress->province:''}}" required>
					</div>
					<div class="form-group row">
						<label for="stringDistrict" class="col-md-3 text-muted">Quận/huyện <b style="color: red">*</b></label>
						<input class="col-md-5 form-control" id="stringDistrict" type="text" name="stringDistrict" value="{{isset($customerShippingAddress->district)?$customerShippingAddress->district:''}}" required>
					</div>
					<div class="form-group row">
						<label for="stringWards" class="col-md-3 text-muted">Phường/xã <b style="color: red">*</b></label>
						<input class="col-md-5 form-control" id="stringWards" type="text" name="stringWards" value="{{isset($customerShippingAddress->wards)?$customerShippingAddress->wards:''}}" required>
					</div>
					<div class="form-group row">
						<label for="stringAddressDetail" class="col-md-3 text-muted">Chi tiết <b style="color: red">*</b></label>
						<input class="col-md-5 form-control" id="stringAddressDetail" type="text" name="stringAddressDetail" value="{{isset($customerShippingAddress->address_detail)?$customerShippingAddress->address_detail:''}}" required>
					</div>
					<div class="form-group row">
						<div class="col-md-3"><label class="form-check-label text-muted" for="boolDefault">Mặc định</label></div>
						<div class="col-md-5">
						    <input type="checkbox" class="form-check-input" id="boolDefault" name="boolDefault" {{(isset($customerShippingAddress->default)&&$customerShippingAddress->default==1)?'checked':''}} {{(request()->is('customer/shipping-address/add'))?'checked':''}}>   
						</div>
					</div>
					<input type="submit" name="" class="btn btn-success d-flex justify-content-center" value="Thực thi" style="margin-left: 40%;width: 20%">
				</form>
			</div>  			
		</div>
	</div>
</div>
@endsection