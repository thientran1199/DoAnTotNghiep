@extends('frontend.master')
@section('title')
	<title>Lịch sử đặt hàng</title>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<!-- menu -->
		@include('frontend.customer.menu')
		<!-- end menu -->
		<div class="col-md-9">
			<div class="page-header">
			    <h3>Lịch sử đặt hàng</h3>
			    <hr>
			</div>
			<div class="card-body border bg-white rounded" style="overflow-y: scroll;height: 400px">
				<table class="table table-hover table-responsive-md">
					<thead>
						<tr>
							<th style="width: 30px">Id</th>
							<th>Thời gian đặt hàng</th>
							<th>Thanh toán</th>
							<th>Tổng tiền</th>
							<th>Ghi chú</th>
							<th>Trạng thái</th>
							<th>Chi tiết</th>
						</tr>
					</thead>
					<tbody>
						@foreach($listOrder as $item)
						<tr>
							<td>{{$item->id}}</td>
							<td>{{$item->created_at}}</td>
							<td>{{$item->payment->method}}</td>
							<td>{{number_format($item->grand_total)}}đ</td>
							<td>{{($item->note!='')?$item->note:'(trống)'}}</td>
							@switch($item->status)
							@case('Chờ xử lý')
								<td><span class="btn btn-sm btn-info">{{$item->status}}</span></td>
								@break
							@case('Hủy')
								<td><span class="btn btn-sm btn-danger">{{$item->status}}</span></td>
								@break
							@case('Đang giao')
								<td><span class="btn btn-sm btn-warning">{{$item->status}}</span></td>
								@break
							@case('Đã nhận hàng')
								<td><span class="btn btn-sm btn-success">{{$item->status}}</span></td>
								@break
							@default
							@endswitch	
							<td class="text-center"><a href="{{url('/customer/order-history/detail/'.$item->id)}}"><i class="fas fa-eye"></i></a></td>
						</tr>
						@endforeach
					</tbody>
			
				</table>
			</div>	
		</div>	
	</div>
</div>
@endsection