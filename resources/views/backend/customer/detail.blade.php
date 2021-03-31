@extends('backend.master')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Khách hàng<small> > {{(request()->is('admin-page/admin/add'))?'Thêm':'Sửa'}}</small></h1>
<div class="card shadow mb-4">
<div class="card-body">
	<legend>Thông tin cá nhân và tài khoản</legend>
	<hr>
		<div class="row mb-3">
			<div class="col-sm-3"><b>Tên tài khoản</b></div>
			<div class="col-sm-9"><input class="form-control" type="text" name="stringUsername" readonly value="{{(isset($customer))?$customer->person->account->username:''}}"></div>
		</div>
		<div class="row mb-3">
			<div class="col-md-3"><b>Họ và tên</b></div>
			<div class="col-md-9"><input readonly class="form-control" id="stringFullName" type="text" name="stringFullName" placeholder="vd: Lung Thị Linh" value="{{(isset($customer))?$customer->person->full_name:''}}"></div>
		</div>
		<div class="row mb-2">
				<div class="col-sm-3"><b>Trạng thái</b></div>
				<div class="col-sm-9">
					<input type="radio" name="intGender" value="1" disabled checked>
					<label>Nam</label><br>
					<input type="radio" name="intGender" value="0" disabled {{(isset($customer)&&$customer->person->gender=='Nữ')?'checked':''}}>
					<label>Nữ</label><br>
				</div>
		</div>
		<div class="row mb-3">
			<div class="col-md-3"><b>Địa chỉ</b></div>
			<div class="col-md-9"><input readonly class="form-control" id="stringAddress" type="text" name="stringAddress" placeholder="vd: Hà Nam" value="{{(isset($customer))?$customer->person->address:''}}"></div>
		</div>
		<div class="row mb-3">
			<div class="col-md-3"><b>Ngày sinh</b></div>
			<div class="col-sm-9"><input readonly class="form-control" id="dateOfBirth" type="date" name="dateOfBirth" min="1920-01-01" max="2010-12-31" value="{{(isset($customer))?$customer->person->date_of_birth:''}}"></div>
		</div>
		<div class="row mb-3">
			<div class="col-md-3"><b>Số điện thoại</b></div>
			<div class="col-md-9"><input readonly class="form-control" pattern="[0-9]{10}" id="stringPhone" type="tel" name="stringPhone" placeholder="vd: 0843330889" required value="{{(isset($customer))?$customer->person->phone:''}}"></div>
		</div>
		<div class="row mb-3">
			<div class="col-md-3"><b>Email</b></div>
			<div class="col-md-9"><input readonly class="form-control" id="stringEmail" type="email" name="stringEmail" placeholder="vd: lunglinh@mail.com" value="{{(isset($customer))?$customer->person->email:''}}"></div>
		</div>
	<form method="post">
		@csrf
		<div class="row mb-3">
			<div class="col-sm-3"><b>Loại khách hàng</b></div>
			<div class="col-sm-9">
				<div class="row">
		    		<div class="col-md-4 col-sm-7">		
		    			<select name="intType" class="form-control mb-1">
		    				<option value="0" {{($customer->type=='Thường')?'selected':''}}>Thường</option>
		    				<option value="1" {{($customer->type=='Thân thiết')?'selected':''}}>Thân thiết</option>
		    				<option value="2" {{($customer->type=='Vip')?'selected':''}}>Vip</option>
		    			</select>
				 	</div>
				   	<div class="col-md-8 col-sm-5 text-center">
				   		<input type="submit" value="Cập nhật loại khách hàng" class="btn btn-primary" name=""> 	
				    </div>
				</div>
			</div>
		</div>
	</form>
	<legend>Danh sách địa chỉ giao hàng</legend>
	<hr>
	<div class="table-responsive">
    	<table class="table table-bordered table-sm" id="dataTable" cellspacing="0" width="100%">
    		<thead>
    			<tr>
    				<th>Id</th>
    				<th>Tên người nhận</th>
    				<th>Điện thoại người nhận</th>
    				<th>Tỉnh/thành phố</th>
    				<th>Quận/huyện</th>
    				<th>Xã/phường</th>
    				<th>Địa chỉ chi tiết</th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach($customer->customer_shipping_addresses as $item)
    			<tr>
    				<td>{{ $item->id}}</td>
    				<td>{{ $item->recipient_name}}</td>
    				<td>{{ $item->recipient_phone}}</td>
    				<td>{{ $item->province}}</td>
    				<td>{{ $item->district}}</td>
    				<td>{{ $item->wards}}</td>
    				<td>{{ $item->address_detail}}</td>
    			</tr>
    			@endforeach
    		</tbody>
    	</table>
    </div>
</div>
</div>
@endsection