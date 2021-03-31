@extends('backend.master')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Sản phẩm<small> > Danh sách</small></h1>
<div class="card shadow mb-4">
<div class="card-body">
	<div class="alert alert-info text-center mt-1 show">Không thể xóa các sản phẩm có trong đơn hàng. Tuy nhiên bạn có thể ẩn chúng</div>
    <div class="table-responsive">
	<table class="table table-bordered table-sm" id="dataTable" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Tên</th>
				<th>Thương hiệu</th>
				<th>Xuất xứ</th>
				<th>Giá</th>
				<th>Giá ưu đãi</th>
				<th>Số lượng tồn</th>
				<th>Trạng thái</th>
				<th>Lượt xem</th>
				<th>Ảnh</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Id</th>
				<th>Tên</th>
				<th>Thương hiệu</th>
				<th>Xuất xứ</th>
				<th>Giá</th>
				<th>Giá ưu đãi</th>
				<th>Số lượng hàng</th>
				<th>Trạng thái</th>
				<th>Lượt xem</th>
				<th>Ảnh</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
		</tfoot>
		<tbody>
			@foreach($listProduct as $item)

			<tr>
				<td>{{ $item->id}}</td>
				<td>{{ $item->name}}</td>
				<td>{{ $item->brand}}</td>
				<td>{{ $item->origin}}</td>
				<td>{{ number_format($item->price)}}</td>
				<td>{{ number_format($item->promotion_price)}}</td>
				<td>{{ $item->quantity_in_stock}}</td>
				<td>
					@if($item->enabled==1)
					<span class="btn btn-sm btn-info">Hiện</span>
					@else
					<span class="btn btn-secondary btn-sm">Ẩn</span>
					@endif
				</td>
				<td>{{ $item->views}}</td>
				<td>
					<img style="width: 80px" src="{{asset('images/product/'.$item->images[0]->name)}}">
				</td>
				<td class="text-center">
					<a href="{{url('/admin-page/product/edit/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
				</td>
				<td class="text-center">
					<span data-toggle="modal" data-target="#delete{{$item->id}}" class="btn btn-danger btn-sm {{(count($item->order_items)>0)?'disabled':''}}"><i class="fas fa-trash-alt"></i></span>
				</td>
			</tr>
			<!-- modal delete -->
				<div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$item->id}}"
			        aria-hidden="true">
			        <div class="modal-dialog" role="document">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Bạn muốn xóa bản ghi này?</h5>
			                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
			                        <span aria-hidden="true">×</span>
			                    </button>
			                </div>
			                <div class="modal-body">Chọn "Đồng ý" bên dưới để xóa.</div>
			                <div class="modal-footer">
			                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
			                    <a class="btn btn-primary" href="{{url('/admin-page/product/delete/'.$item->id)}}">Đồng ý</a>
			                </div>
			            </div>
			        </div>
			    </div>
			@endforeach
		</tbody>
	</table>
	</div>
</div>
</div>
@endsection
