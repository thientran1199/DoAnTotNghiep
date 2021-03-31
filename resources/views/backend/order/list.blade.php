@extends('backend.master')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Đơn hàng<small> > Danh sách</small></h1>
<div class="card shadow mb-4">
<div class="card-body">
    <div class="table-responsive">
    	<table class="table table-bordered table-sm" id="dataTable" cellspacing="0" width="100%">
    		<thead>
				<tr>
					<th>Id</th>
					<th>Thời gian đặt hàng</th>
					<th>Thanh toán</th>
					<th>Tổng tiền</th>
					<th>Ghi chú</th>
					<th>Trạng thái</th>
					<th>Chi tiết</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Id</th>
					<th>Thời gian đặt hàng</th>
					<th>Thanh toán</th>
					<th>Tổng tiền</th>
					<th>Ghi chú</th>
					<th>Trạng thái</th>
					<th>Chi tiết</th>
				</tr>
			</tfoot>
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
					<td class="text-center"><a href="{{url('admin-page/order/detail/'.$item->id)}}" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i></a></td>
				</tr>
				@endforeach
			</tbody>
    	</table>
    </div>
</div>
</div>
@endsection    	