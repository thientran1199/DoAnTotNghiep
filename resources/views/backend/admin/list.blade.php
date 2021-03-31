@extends('backend.master')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Quản trị viên<small> > Danh sách</small></h1>
<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">
	<table class="table table-bordered" id="dataTable" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Căn cước</th>
				<th>Tên</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
				<th>Ngày sinh</th>
				<th>Điện thoại</th>
				<th>Email</th>
				<th>Tên tài khoản</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Căn cước</th>
				<th>Tên</th>
				<th>Giới tính</th>
				<th>Địa chỉ</th>
				<th>Ngày sinh</th>
				<th>Điện thoại</th>
				<th>Email</th>
				<th>Tên tài khoản</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>			
		</tfoot>
		<tbody>
			@foreach($listAdmin as $item)
			<tr>
				<td style="max-width: 90px;">{{ $item->identity}}</td>
				<td>{{ $item->person->full_name}}</td>
				<td>{{ $item->person->gender}}</td>
				<td>{{ $item->person->address}}</td>
				<td>{{ $item->person->date_of_birth}}</td>
				<td>{{ $item->person->phone}}</td>
				<td style="max-width: 90px;">{{ $item->person->email}}</td>
				<td>{{ $item->person->account->username}}</td>
				<td class='text-center'>
					<a href="{{url('/admin-page/admin/edit/'.$item->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
				</td>
				<td class="text-center">
					@if($item->person->account->id != Auth::guard('account_admin')->id())
					<span data-toggle="modal" data-target="#delete{{$item->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></span>
					@else
						Tài khoản của bạn
					@endif
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
			                    <a class="btn btn-primary" href="{{url('/admin-page/admin/delete/'.$item->id)}}">Đồng ý</a>
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