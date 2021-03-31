@extends('backend.master')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Slide<small> > Danh sách</small></h1>
<div class="card shadow mb-4 col-md-9 mx-auto">
<div class="card-body">
    <div class="table-responsive">
	<table class="table table-bordered table-sm" id="dataTable" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Ảnh</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Id</th>
				<th>Ảnh</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
		</tfoot>
		<tbody>
			@foreach($listSlide as $item)
			<tr>
				<td>{{ $item->id}}</td>
				<td>
					<div class="embed-responsive embed-responsive-16by9">
					<img class="embed-responsive-item" src="{{asset('images/slide/'.$item->name)}}">
					</div>
				</td>
				<td class="text-center">				
					<a href="{{url('/admin-page/slide/edit/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
				</td>
				<td class="text-center">
					<span class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$item->id}}"><i class="fas fa-trash-alt"></i></span>
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
			                    <a class="btn btn-primary" href="{{url('/admin-page/slide/delete/'.$item->id)}}">Đồng ý</a>
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