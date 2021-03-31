@extends('frontend.master')
@section('title')
	<title>Đặt hàng</title>
@endsection
@section('content')
<?php
	$cart = session()->has('cart') ? session('cart') : null;
?>
<div class="container">
	<h3 style="text-align: center;">Đặt hàng</h3>
	<hr>
	<form method="post">
		@csrf
	<div class="row">
		<div class="col-md-4">
			<div class="border mb-4">
				<h6 class="card-header bg-white"><i  class="fas fa-shopping-cart"></i> Sản phẩm trong giỏ</h6>
				<div style="height: 400px;overflow-y: scroll;">
					<table class="table table-sm table-hover">
						<tbody>
							@foreach($cart->getListCartItem() as $cartItem)
							<tr>
								<td><img src="{{asset('images/product/'.$cartItem->getProduct()->images[0]->name)}}" style="width: 100px"></td>
								<td>
									<h6><a href="{{url('/product/detail/'.$cartItem->getProduct()->id)}}">{{$cartItem->getProduct()->name}}</a></h6>
									<span>{{number_format(($cartItem->getProduct()->promotion_price!=0)?$cartItem->getProduct()->promotion_price:$cartItem->getProduct()->price)}}đ x {{$cartItem->getQuantity()}}</span>
								</td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>
				<div class="border bg-white text-center">
					Tổng tiền hàng : <b>{{number_format($cart->getGrandTotal())}}đ</b>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="border mb-4 ">
			<h6 class="card-header bg-white"><i class="fas fa-map-marker-alt"></i> Địa chỉ giao hàng</h6>
			<div class="card-body">
				@if(count($listCustomerShippingAddress)==0)
				<div>Bạn chưa có địa chỉ giao hàng <a href="{{url('/customer/shipping-address/add')}}" class="btn btn-dark btn-sm">+ Thêm địa chỉ</a></div>
				@else
				<div class="row choice">
					<div class="display-address col-md-9 mb-1 row"></div>
					<div class="col-md-3 text-center"><span class="btn btn-info btn-sm" id="change">Thay đổi</span></div>
				</div>
				@endif
				<div class="hidden-address">
					@foreach($listCustomerShippingAddress as $item)
					<div class="custom-control custom-radio">
						<input type="radio" name="intShippingAddress" value="{{$item->id}}" {{($item->default==1)?'checked':''}} >
						<span id="item{{$item->id}}">
							<b class="col">{{$item->recipient_name.' - '.$item->recipient_phone}}</b>
							<span class="col">{{$item->address_detail.', '.$item->wards.', '.$item->district.', '.$item->province}}
							@if($item->default == 1)
								<span class="badge badge-info">Mặc định</span>
							@endif
							</span>
						</span>
					</div>
					@endforeach
					<div class="text-center mt-1">
						<span class="btn btn-secondary btn-sm" id="back">Xong</span><b class="text-warning"> Hoặc </b><a href="{{url('/customer/shipping-address/add')}}" class="btn btn-dark btn-sm">+ Thêm địa chỉ</a>
					</div>
				</div>
			</div>
			</div>
			<!-- thanh toan va note -->
			<div class="row">

				<div class="col-md-6">
					<div class="border mb-4">
						<h6 class="card-header bg-white"><i class="fas fa-pencil-alt"></i> Ghi chú</h6>
						<div class="card-body">
							<textarea name="stringNote" class="form-control" placeholder="Lời nhắn của bạn dành cho cửa hàng" style="width: 100%;height: 100px;resize: none;"></textarea>
						</div>
					</div>
				</div>
				<!-- thanh toán -->
				<div class="col-md-6">
					<div class="border">
						<h6 class="card-header bg-white"><i class="fas fa-coins"></i> Thanh toán</h6>
						<div class="card-body">
							<div>
								<input type="radio" name="intPayment" value="0" checked> Thanh toán khi nhận hàng
							</div>
							<div>
								<input type="radio" name="intPayment" value="1" disabled> Thanh toán trực tuyến
							</div>
						</div>
					</div>
					<div>

					</div>
						<div class="text-center text-muted"><small><i class="fas fa-shipping-fast"></i> Hiện tại cửa hàng freeship</small></div>
						<button type="submit" name="" class="btn btn-success btn-block mt-1 btn-sm"><i class="fas fa-check"></i> Xác nhận</button>

				    </div>
                    <button id="back" type="submit" name="" class="btn btn-danger btn-block mt-1 btn-sm"><i class="fas fa-arrow-left"></i> <a  style="color: white; text-decoration:none;" href="/">Tiếp tục mua sắm</a></button>

			</div>
		</div>
	</div>
	</form>
</div>
<script type="text/javascript">
	var id = $('.hidden-address input:checked').val();
	$('.display-address').html($('#item'+id).html());
	$('.hidden-address input').change(function(){
		id = $(this).val();
		$('.display-address').html($('#item'+id).html());
	});
	$('.hidden-address').hide();
	$('#change').click(function(){
		$('.hidden-address').show();
		$('.choice').hide();
	});
	$('#back').click(function(){
		$('.choice').show();
		$('.hidden-address').hide();
	});
</script>
@endsection
