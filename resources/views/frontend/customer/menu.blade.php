<div class="col-md-3 pb-4">
	<div class="card-header" style="cursor: pointer;background-color: rgba(255,255,255, 0);">
		<table style="width: 100%" class="menu-customer">
			<tr>
				<td><i class="fas fa-user-circle" style="color: orange;font-size: 40px"></i> </td>
				<td width="20"></td>
				<td><b><i class="text-success">{{Auth::guard('account_customer')->user()->username}}</i></b>
					<p class="text-muted">
						<small>
						<?php $type = Auth::guard('account_customer')->user()->person->customer->type;  ?>
						@switch($type)
						@case('Thường')
						<span class="btn btn-sm btn-secondary">
							{{$type}} <i class="fas fa-male"></i>
						</span>
							@break
						@case('Thân thiết')
						<span class="btn btn-sm btn-info">
							{{$type}} <i class="far fa-handshake"></i>
						</span>
							@break
						@case('Vip')
						<span class="btn btn-sm btn-warning">
							{{$type}} <i class="fas fa-crown"></i>
						</span>
							@break
						@default
						@endswitch
						</small>
					</p>
				</td>
				<td><i class="fas fa-angle-up d-lg-none d-md-none"></i></td>
			</tr>
		</table>
		
	</div>
	<div class="list-group d-none d-md-block menu-customer-block">
		<a href="{{url('/customer/profile')}}" class="list-group-item list-group-item-action {{(request()->is('customer/profile'))? 'list-group-item-secondary text-danger' :''}}"><i class="fas fa-address-card"></i> Thông tin cá nhân</a>
		<a href="{{url('/customer/change-password')}}" class="list-group-item list-group-item-action {{(request()->is('customer/change-password'))? 'list-group-item-secondary text-danger' :''}}"><i class="fas fa-key"></i> Đổi mật khẩu</a>
		<a href="{{url('/customer/shipping-address/list')}}" class="list-group-item list-group-item-action {{(request()->is('customer/shipping-address*'))? 'list-group-item-secondary text-danger' :''}}"><i class="fas fa-map-marker-alt"></i> Địa chỉ giao hàng</a>
		<a href="{{url('/customer/order-history/list')}}"class="list-group-item list-group-item-action {{(request()->is('customer/order-history*'))? 'list-group-item-secondary text-danger' :''}}"><i class="fas fa-clipboard-list"></i> Lịch sử đặt hàng</a>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('.menu-customer').click(function(){
			$('.menu-customer-block').toggleClass('d-none d-md-block');
			$('.menu-customer tr td:last-child i').toggleClass('fa-angle-up').toggleClass('fa-angle-down');
		});
	});
</script>