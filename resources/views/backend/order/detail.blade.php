@extends('backend.master')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Đơn hàng<small> > Chi tiết</small></h1>
<div class="card shadow mb-4">
<div class="card-body">
	<!--  -->	
	<div class="row mb-1">
		<h6 class="col-md-3"><b>Khách hàng</b></h6>
    	<div class="col-md-9">
    		<table class="table table-bordered table-sm table-responsive" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Loại khách</th>
					<th>Tên</th>
					<th>Giới tính</th>
					<th>Địa chỉ</th>
					<th>Ngày sinh</th>
					<th>Điện thoại</th>
					<th>Email</th>
					<th>Tên tài khoản</th>
				</tr>
			</thead>
			<tbody>
				<?php  
					$item = $order->customer;
				?>
				<tr>
					<td>{{ $item->type}}</td>
					<td>{{ $item->person->full_name}}</td>
					<td>{{ $item->person->gender}}</td>
					<td>{{ $item->person->address}}</td>
					<td>{{ $item->person->date_of_birth}}</td>
					<td>{{ $item->person->phone}}</td>
					<td>{{ $item->person->email}}</td>
					<td>{{ $item->person->account->username}}</td>
				</tr>
			</tbody>
		</table>
    	</div>
	</div>
	<div class="row mb-1">
    	<h6 class="col-md-3"><b>Địa chỉ giao hàng</b></h6>
    	<div class="col-md-9 row">
    		<span class="col-6">{{$order->shipping_address->recipient_name.' - '.$order->shipping_address->recipient_phone}}</span>
			<span class="col-6">{{$order->shipping_address->address_detail.', '.$order->shipping_address->wards.', '.$order->shipping_address->district.', '.$order->shipping_address->province}}
			</span>
    	</div>
	</div>
	<!--  -->
	<div class="row mb-1">
		<h6 class="col-md-3"><b>Thanh toán</b></h6>
		<div class="col-md-9 row">
			<span class="col-6">{{$order->payment->method}}</span>
			<span class="col-6">
				{{$order->payment->status}}
			</span>
		</div>

	</div>
	<!--  -->
	
	<!--  -->
	<div class="row mb-1">
		<h6 class="col-md-3"><b>Ghi chú</b></h6>
		<div class="col-md-9">{{($order->note!='')?$order->note:'(trống)'}}</div>
	</div>
	<!--  -->
	<!--  -->
	<div class="row mb-1">
		<h6 class="col-md-3"><b>Thời gian đặt hàng</b></h6>
		<div class="col-md-9">{{$order->created_at}}</div>
	</div>
	<!--  -->
		<!--  -->
	<div class="row mb-1">
		<h6 class="col-md-3"><b>Tổng số sản phẩm</b></h6>
		<div class="col-md-9">{{$order->total_quantity}}</div>
	</div>
	<!--  -->
	<!--  -->
	<div class="row mb-1">
		<h6 class="col-md-3"><b>Tổng tiền</b></h6>
		<div class="col-md-9">{{number_format($order->grand_total)}}đ</div>
	</div>
	<!--  -->
	<!--  -->
	<form method="post">
		@csrf
	<div class="row mb-1">
		<h6 class="col-md-3"><b>Trạng thái đơn</b></h6>
		<div class="col-md-9">
			<div class="row">
	    		<div class="col-md-4 col-sm-7">		
	    			<select name="intStatus" class="form-control mb-1">
	    				<option disabled value="0" {{($order->status=='Chờ xử lý')?'selected':''}}>Chờ xử lý</option>
	    				<option value="1" {{($order->status!='Chờ xử lý')?'disabled':''}} {{($order->status=='Hủy')?'selected':''}}>Hủy</option>
	    				<option value="2" {{($order->status=='Đang giao')?'selected':''}}>Đang giao</option>
	    				<option value="3" {{($order->status!='Đang giao')?'disabled':''}} {{($order->status=='Đã nhận hàng')?'selected':''}}>Đã nhận hàng</option>
	    			</select>
			 	</div>
			 	@if($order->status!='Hủy' && $order->status!='Đã nhận hàng')
			   	<div class="col-md-8 col-sm-5 text-center">
			   		<input type="submit" value="Xử lý đơn" class="btn btn-primary" name=""> 	
			    </div>
			    @endif
			</div>
		</div>
	</div>
	</form>
	<!--  -->
	<div class="row">
    	<h6 class="col-md-3"><b>Danh sách sản phẩm</b></h6>
    	<div style="max-height: 300px;overflow-y: scroll;" class="col-md-6">
	    	<table class="table table-hover table-sm table-responsive" style="width: 100%">
				<tbody>
					@foreach($order->order_items as $item)
					<tr>
						<td style="text-align: center;"><img src="{{asset('images/product/'.$item->product->images[0]->name)}}" style="width: 70px"></td>
						<td>
							<a href="{{url('/product/detail/'.$item->product->id)}}">{{$item->product->name}}</a>
							<p>{{number_format($item->price_sell)}}đ x {{$item->quantity}}</p>
						</td>
						<td>Thành tiền<p><b>{{number_format($item->sub_total)}}đ</b></p></td>
					</tr>
					<!-- modal review $item->review->id -->
					@endforeach
				</tbody>					
			</table>
		</div>
	</div>
</div>
</div>
@endsection   