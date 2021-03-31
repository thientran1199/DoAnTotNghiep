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
			    <h3>Địa chỉ giao hàng<small style="float: right;"><a href="{{url('/customer/shipping-address/add')}}" class="btn btn-dark btn-sm">+ Thêm địa chỉ</a> </small> </h3>
			    <hr>
			</div>
			<div class="card-body border rounded bg-white" style="height: 400px;overflow-y: scroll;">
				@if(count($listCustomerShippingAddress)==0)
					<i>Chưa có địa chỉ nào, mời bạn bổ sung</i>
				@endif
				@foreach($listCustomerShippingAddress as $item)
				<div class="row border rounded mb-3 bg-light">
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-4 text-muted">Họ và tên</div>
							<div class="col">{{$item->recipient_name}}</div>
							@if($item->default == 1)
							<div class="col"><span class="badge badge-info">Mặc định</span></div>
							@endif
						</div>
						<div class="row">
							<div class="col-md-4 text-muted">Điện thoại</div>
							<div class="col">{{$item->recipient_phone}}</div>
						</div>
						<div class="row">
							<div class="col-md-4 text-muted">Địa chỉ</div>
							<div class="col">
								<div>{{ $item->province}}</div>
								<div>{{ $item->district }}</div>
								<div>{{ $item->wards }}</div>
								<div>{{ $item->address_detail }}</div>
							</div>
						</div>
					</div>
					<div class="col pt-2 text-center">
						<a href="{{url('/customer/shipping-address/edit/'.$item->id)}}" class="btn btn-info btn-sm">Sửa</a>
						<span data-toggle="modal" data-target="#deleteAddress{{$item->id}}" class="btn btn-danger btn-sm text-white">Xóa</span>
					</div>
				</div>
				<!-- modal delete -->
				<div class="modal fade" id="deleteAddress{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$item->id}}"
			        aria-hidden="true">
			        <div class="modal-dialog" role="document">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Bạn muốn xóa địa chỉ giao hàng này?</h5>
			                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
			                        <span aria-hidden="true">×</span>
			                    </button>
			                </div>
			                <div class="modal-body">Chọn "Đồng ý" bên dưới để xóa địa chỉ.</div>
			                <div class="modal-footer">
			                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
			                    <a class="btn btn-primary" href="{{url('/customer/shipping-address/delete/'.$item->id)}}">Đồng ý</a>
			                </div>
			            </div>
			        </div>
			    </div>
				@endforeach
			</div>  			
		</div>
	</div>
</div>

@endsection