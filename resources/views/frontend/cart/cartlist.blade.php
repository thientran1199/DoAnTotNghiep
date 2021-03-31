		<div class="cartlist">	
			<?php 
					$cart = session()->has('cart') ? session('cart') : null;
				?>
			@if($cart==null)
				<p class="text-center">Chưa có sản phẩm nào trong giỏ hàng</p>
			@else
				<table class="table table-bordered table-hover table-sm" style="background-color: white;">
					<thead>
						<tr class="align-top text-center">
							<th class="d-none d-md-block" style="bottom: 0">Ảnh</th>
							<th style="width: 200px;">Tên</th>
							<th>Đơn giá</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
							<th>Xóa</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cart->getListCartItem() as $cartItem)
						<tr>
							<td class="d-none d-md-block" style="text-align: center;"><img src="{{asset('images/product/'.$cartItem->getProduct()->images[0]->name)}}" style="width: 100px"></td>
							<td><a href="{{url('/product/detail/'.$cartItem->getProduct()->id)}}">{{$cartItem->getProduct()->name}}</a></td>
							<td>{{number_format(($cartItem->getProduct()->promotion_price!=0)?$cartItem->getProduct()->promotion_price:$cartItem->getProduct()->price)}}đ</td>
							<td>
								<input type="number" class="quantity{{$cartItem->getProduct()->id}}" onkeyup="quantityCartList({{$cartItem->getProduct()->id}})" max="{{$cartItem->getProduct()->quantity_in_stock}}" min="0" value="{{$cartItem->getQuantity()}}" onchange="updateCartList({{$cartItem->getProduct()->id}})" style="width: 80px;" required>
								<p><i>Có sẵn {{$cartItem->getProduct()->quantity_in_stock}}</i></p>
							</td>
							<td>{{number_format($cartItem->getSubTotal())}}đ</td>
							<td class="text-center"><a href="javascript: deleteCartList({{$cartItem->getProduct()->id}})" class="btn">X</a></td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
			            <tr>		   
			            	<td colspan="6" class="text-center text-danger">Tổng tiền hàng({{$cart->getTotalQuantity()}} sản phẩm) :<b> {{ number_format($cart->getGrandTotal())}}đ</b></td> 
			            </tr>
			        </tfoot>
				</table>
			@endif
		</div>
