@extends('frontend.master')
@section('title')
	<title>Chi tiết đơn đặt hàng</title>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<!-- menu -->
		@include('frontend.customer.menu')
		<!-- end menu -->
		<div class="col-md-9">
			<div class="page-header">
			    <h3>Lịch sử đặt hàng<small> > Chi tiết đơn hàng</small></h3>
			    <hr>
			</div>
		    <div class="card-body border bg-white rounded">

		    	<!--  -->
		    	<div class="row mb-1">
			    	<h6 class="col-md-3 text-muted">Địa chỉ giao hàng</h6>
			    	<div class="col-md-9 row">
			    		<b class="col-6">{{$order->shipping_address->recipient_name.' - '.$order->shipping_address->recipient_phone}}</b>
						<span class="col-6">{{$order->shipping_address->address_detail.', '.$order->shipping_address->wards.', '.$order->shipping_address->district.', '.$order->shipping_address->province}}
						</span>
			    	</div>
		    	</div>
		    	<!--  -->
		    	<div class="row mb-1">
		    		<h6 class="text-muted col-md-3">Thanh toán</h6>
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
		    		<h6 class="text-muted col-md-3">Ghi chú</h6>
		    		<div class="col-md-9">{{($order->note!='')?$order->note:'(trống)'}}</div>
		    	</div>
		    	<!--  -->
		    	<!--  -->
		    	<div class="row mb-1">
		    		<h6 class="text-muted col-md-3">Thời gian đặt hàng</h6>
		    		<div class="col-md-9">{{$order->created_at}}</div>
		    	</div>
		    	<!--  -->
		    		<!--  -->
		    	<div class="row mb-1">
		    		<h6 class="text-muted col-md-3">Tổng số sản phẩm</h6>
		    		<div class="col-md-9">{{$order->total_quantity}}</div>
		    	</div>
		    	<!--  -->
		    	<!--  -->
		    	<div class="row mb-1">
		    		<h6 class="text-muted col-md-3">Tổng tiền</h6>
		    		<div class="col-md-9">{{number_format($order->grand_total)}}đ</div>
		    	</div>
		    	<!--  -->
		    	<!--  -->
		    	<div class="row mb-1">
		    		<h6 class="text-muted col-md-3">Trạng thái đơn</h6>
		    		<div class="col-md-4">{{$order->status}}</div>
		    		@if($order->status == 'Chờ xử lý')
		    		<div class="col-md-5"><a href="{{url('/customer/order-history/cancel/'.$order->id)}}" class="btn btn-sm btn-danger">Hủy đặt hàng</a></div>
		    		@endif
		    	</div>
		    	<!--  -->
		    	<div class="row">
			    	<h6 class="text-muted col-md-3">Danh sách sản phẩm</h6>
			    	<div style="max-height: 300px;overflow-y: scroll;">
				    	<table class="table table-hover table-sm table-responsive col-md-9" style="background-color: white;">
							<tbody>
								@foreach($order->order_items as $item)
								<tr>
									<td style="text-align: center;"><img src="{{asset('images/product/'.$item->product->images[0]->name)}}" style="width: 70px"></td>
									<td>
										<a href="{{url('/product/detail/'.$item->product->id)}}">{{$item->product->name}}</a>
										<p>{{number_format($item->price_sell)}}đ x {{$item->quantity}}</p>
									</td>
									<td>Thành tiền<p><b>{{number_format($item->sub_total)}}đ</b></p></td>
									@if($order->status=='Đã nhận hàng' && $item->review->reviewed == 0)
									<td><span class="btn btn-sm btn-warning" data-toggle="modal" data-target="#review{{$item->review->id}}">Đánh giá</span></td>
									@elseif($order->status=='Đã nhận hàng' && $item->review->reviewed == 1)
									<td><span class="btn btn-sm btn-success">Đã đánh giá</span></td>
									@endif
								</tr>
								<!-- modal review $item->review->id -->
								<div class="modal fade" id="review{{$item->review->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$item->review->id}}"
							        aria-hidden="true">
							        <div class="modal-dialog" role="document">
							            <div class="modal-content">
							                <div class="modal-header">
							                    <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Đánh giá sản phẩm này</h5>
							                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
							                        <span aria-hidden="true">×</span>
							                    </button>
							                </div>
							                <form method="post" action="">
							                	@csrf
								                <div class="modal-body">
								                		<div class="form-group row">
								                			<input type="hidden" name="intReviewId" value="{{$item->review->id}}">
								                			<div class="text-muted col-4">Xếp hạng</div>
												            <h2 class="rate-star col-8" onclick="rateNow({{$item->review->id}})">
												            	<label>
												            		<input type="radio" name="intRate" class="rate-review" value="1" checked>
																	<span class="fas fa-star star-rating" id="rate1{{$item->review->id}}"></span>
																</label>
																<label>
												            		<input type="radio" name="intRate" class="rate-review" value="2">
																	<span class="fas fa-star" id="rate2{{$item->review->id}}"></span>
																</label>
																<label>
												            		<input type="radio" name="intRate" class="rate-review" value="3">
																	<span class="fas fa-star" id="rate3{{$item->review->id}}"></span>
																</label>
																<label>
												            		<input type="radio" name="intRate" class="rate-review" value="4">
																	<span class="fas fa-star" id="rate4{{$item->review->id}}"></span>
																</label>
																<label>
												            		<input type="radio" name="intRate" class="rate-review" value="5">
																	<span class="fas fa-star" id="rate5{{$item->review->id}}"></span>
																</label>
															</h2>
								                		</div>
								                		<div class="form-group">
								                			<div class="text-muted">Nhận xét</div>
								                			<textarea class="form-control" name="stringComment" style="resize: none;width: 100%"></textarea>
								                		</div>	
								                </div>
								                <div class="modal-footer">
								                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
								                    <button class="btn btn-primary" type="submit">Đánh giá</button>
								                </div>
							                </form>
							            </div>
							        </div>
							    </div>
								@endforeach
							</tbody>					
						</table>
					</div>
				</div>
		    
		    </div>
		</div>
	</div>
</div>
<script type="text/javascript">	
	function rateNow(idReview){
		$('.rate-review').click(function(){
			var rateValue = $(this).val();
			for (var i = 1; i <= rateValue; i++) {
				 $('#rate'+i+idReview).addClass('star-rating');
			}
			for (var i = 5; i > rateValue; i--) {
				$('#rate'+i+idReview).removeClass('star-rating');
			} 
		});
	}
</script>
@endsection