<?php
	$cart = session()->has('cart') ? session('cart') : null;
?>

<div class="items-selected mb-3" >
	@if($cart == null)
		<p style="margin-left: 20%;margin-top: 5px">Chưa có sản phẩm nào trong giỏ</p>
	@else
	<div  style="max-height: 300px;overflow-y: scroll;">
		<table class="table table-sm">
			<tbody>
				@foreach($cart->getListCartItem() as $cartItem)
				<tr>
					<td><img src="{{asset('images/product/'.$cartItem->getProduct()->images[0]->name)}}" style="width: 100px"></td>
					<td>
						<h6><a href="{{url('/product/detail/'.$cartItem->getProduct()->id)}}">{{$cartItem->getProduct()->name}}</a></h6>
						<span>{{number_format(($cartItem->getProduct()->promotion_price!=0)?$cartItem->getProduct()->promotion_price:$cartItem->getProduct()->price)}}đ</span>
					</td>
					<td><input type="number" class="quantity{{$cartItem->getProduct()->id}}" onkeyup="quantityCart({{$cartItem->getProduct()->id}})" max="{{$cartItem->getProduct()->quantity_in_stock}}" min="0" value="{{$cartItem->getQuantity()}}" onchange="updateCartItem({{$cartItem->getProduct()->id}})" style="width: 50px"></td>
					<td><a href="javascript: deleteCartItem({{$cartItem->getProduct()->id}});" class="btn">X</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<table class="table table-sm">
	<tfoot>
		<tr class="total-selected">
			<th>Tổng tiền :</th>
			<th>{{number_format($cart->getGrandTotal())}}đ</th>
		</tr>
	</tfoot>
	</table>
	<input type="hidden" class="total-quantity-hidden" value="{{$cart->getTotalQuantity()}}">
	@endif
	<a href="{{ url('/cart')}}" class="btn btn-info" style="margin-left: 20%;">Xem giỏ hàng</a>
	@if($cart!=null)
	<a href="{{ url('/order')}}" class="btn btn-success">Đặt hàng</a>
	@endif
</div>
