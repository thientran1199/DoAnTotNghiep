@extends('frontend.master')
@section('title')
	<title>{{$product_detail->name}}</title>
@endsection
@section('content')
<?php
	$cart = session()->has('cart') ? session('cart') : null;
?>
	<div class="container">

		<div class="row">
			<!-- danh mục -->
				@include('frontend.left_side')
			<!-- end danh mục -->
			<div class="col">
				<div class="page-header">
					<h3>Sản phẩm<small> > Chi tiết ><small> {{$product_detail->name}}</small></small></h3>
					<hr>
				</div>
				<div class="row card-body border rounded bg-white">
					<div class="col-md-6">
						<!-- anh chinh -->
						<div class="main-image embed-responsive embed-responsive-1by1">
							<img src="{{asset('/images/product/'.$product_detail->images[0]->name)}}" class="embed-responsive-item border border-secondary">
						</div>
						<!-- end anh chinh -->
						<!-- list anh -->
						<div class="row mt-3">
							<div class="col mini-image">
								@foreach($product_detail->images as $key => $image)
								<label>
									<input type="radio" name="image-product" {{($key==0)?'checked':''}}>
									<img src="{{asset('/images/product/'.$image->name)}}" width="90" height="90">
								</label>
								@endforeach
							</div>
						</div>
						<!-- end list anh -->
					</div>
					<?php
						$number_sell1 = 0;
						foreach ($product_detail->order_items as $key => $value) {
							$number_sell1 +=$value->quantity;
						}
					?>
					<div class="col-md-6">
						<small style="float: right;"><i class="fas fa-shopping-cart text-success"></i> Đã bán : {{$number_sell1}} | <i class="fas fa-eye"></i> Lượt xem : {{$product_detail->views}} </small>
						<h3 style="clear: both;">{{$product_detail->name}}</h3>
						<h4 class="bg-warning text-white rounded d-flex justify-content-center">
							@if($product_detail->promotion_price>0)
							<small style="margin-top: auto; margin-bottom: auto;"><s>{{number_format($product_detail->price)}}đ</s></small>&nbsp;{{number_format($product_detail->promotion_price)}}đ
							@else
								{{number_format($product_detail->price)}}đ
							@endif
						</h4>
						<table style="width: 100%" class="mt-5">
							<tbody>
								<tr style="line-height: 50px">
									<td style="float: right; color: grey">Danh mục : </td>
									<td>{{$product_detail->category->name}}</td>
								</tr>
								<tr style="line-height: 50px">
									<td style="float: right;color: grey">Thương hiệu :</td>
									<td>{{$product_detail->brand}}</td>
								</tr>
								<tr style="line-height: 50px">
									<td style="float: right;color: grey">Xuất xứ :</td>
									<td>{{$product_detail->origin}}</td>
								</tr>
								<tr style="line-height: 50px">
									<td style="float: right;color: grey">Số lượng :</td>
									<td>
										<input type="number" class="quantity{{$product_detail->id}}" onkeyup="quantityCart({{$product_detail->id}})" value="1" min="1" max="{{$product_detail->quantity_in_stock}}" name="quantity" style="width: 60px;line-height: 30px">
										{{$product_detail->quantity_in_stock}} sản phẩm có sẵn</td>
								</tr>
							</tbody>
							<tfoot>
								<tr style="line-height: 50px;text-align: center;">
									<td colspan="2">
									@if($product_detail->quantity_in_stock > 0)
										@if($cart !=null && array_key_exists($product_detail->id,$cart->getListCartItem()))
									    <a class="btn btn-success add-cart{{$product_detail->id}}" href="javascript:void(0);"><i class='fas fa-check'></i> Đã thêm vào giỏ</a>
									    @else
									    <a href="javascript: addCartItem({{ $product_detail->id }});" class="btn btn-danger add-cart{{$product_detail->id}}"><i class="fas fa-cart-plus"></i> Thêm vào giỏ</a>
									    @endif
									@else
											<span class="btn btn-warning"><i class="far fa-frown"></i> Sản phẩm đã bán hết</span>

									@endif
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<!-- chi tiết + đánh giá -->
				<div class="row pt-3">
					<div class="col">
						<div class="border bg-white rounded">
							<h6 class="card-header border_left">Mô tả sản phẩm</h6>
							<div class="card-body description-product">
								<?php
								if($product_detail->description!="")
								echo $product_detail->description;
								else echo '<i>Chưa có mô tả cho sản phẩm này</i>';
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="row pt-3">
					<div class="col">
						<div class="border bg-white rounded">
							<h6 class="card-header border_left">Đánh giá từ người mua</h6>
							<div class="card-body">
									<!-- sao đánh giá -->
								<div class="row">
									<div class="rate col-md-3" style="margin: auto;text-align: center;">
										<div class="rate-number">
											<?php
												$sum = 0;
												$totalCount = count($listReview);
												$count5 = 0;
												$count4 = 0;
												$count3 = 0;
												$count2 = 0;
												$count1 = 0;
												$averageStar = round(1.6, 1, PHP_ROUND_HALF_UP);
												foreach ($listReview as $key => $review) {
													# code...
													$sum+=$review->rate;
													switch ($review->rate) {
														case 5:
															$count5++;
															break;
														case 4:
															$count4++;
															break;
														case 3:
															$count3++;
															break;
														case 2:
															$count2++;
															break;
														case 1:
															$count1++;
															break;
														default:
															# code...
															break;
													}
												}
												if($totalCount!=0) $average = $sum/$totalCount;
												else $average = 0;

											?>
											<h4>{{round($average,1)}}<small> trên 5</small></h4>
										</div>
										<div class="rate-star">
											@for($i=0;$i< floor($average) ;$i++)
												<span class="fas fa-star star-rating"></span>
											@endfor
											@if($average-floor($average)<=0.5&&$average-floor($average)>0)
												<span class="fas fa-star-half-alt star-rating"></span>
											@elseif($average-floor($average)==0)
											@else
												<span class="fas fa-star star-rating"></span>
											@endif
											@for($j = 5-ceil($average);$j>0;$j--)
												<span class="fas fa-star"></span>
											@endfor
										</div>
										Có {{count($listReview)}} đánh giá
									</div>
									<div class="rate-info col-md-9">
										<table style="margin : auto">
											<tr>
												<td>5 sao</td>
												<td width="280">
													<div class="rate-bar">
														<span style="width: {{($count5>0)?($count5*100/$totalCount):$count5}}%;" class="rating-bar"></span>
													</div>
												</td>
												<td>{{$count5}}</td>
											</tr>
											<tr>
												<td>4 sao</td>
												<td width="280">
													<div class="rate-bar">
														<span style="width: {{($count4>0)?($count4*100/$totalCount):$count4}}%;" class="rating-bar"></span>
													</div>
												</td>
												<td>{{$count4}}</td>
											</tr>
											<tr>
												<td>3 sao</td>
												<td width="280">
													<div class="rate-bar">
														<span style="width: {{($count3>0)?($count3*100/$totalCount):$count3}}%;" class="rating-bar"></span>
													</div>
												</td>
												<td>{{$count3}}</td>
											</tr>
											<tr>
												<td>2 sao</td>
												<td width="280"><div class="rate-bar">
														<span style="width: {{($count2>0)?($count2*100/$totalCount):$count2}}%;" class="rating-bar"></span>
													</div>
												</td>
												<td>{{$count2}}</td>
											</tr>
											<tr>
												<td>1 sao</td>
												<td width="280"><div class="rate-bar">
														<span style="width: {{($count1>0)?($count1*100/$totalCount):$count1}}%;" class="rating-bar"></span>
													</div>
												</td>
												<td>{{$count1}}</td>
											</tr>
										</table>
									</div>
								</div>
								<hr>
								<!-- end sao đánh giá -->
								<!-- detail review -->
								@if(count($listReview)==0)
									<i>Chưa có đánh giá nào</i>
								@else
								<div class="row detail-review">
									<div class="col-12">
										@foreach($listReview as $item)
										<table class="rounded mb-3 border-bottom">
											<tbody>
												<tr>
													<th class="text-muted">Khách hàng</th>
													<td>{{$item->order_item->order->customer->person->full_name}}</td>
												</tr>
												<tr>
													<th class="text-muted">Thời gian</th>
													<td>
														{{$item->updated_at}}
													</td>
												</tr>
												<tr>
													<th class="text-muted">Xếp hạng</th>
													<td>
														<small>
															@for($i=1;$i<=$item->rate;$i++)
															<span class="fas fa-star star-rating"></span>
															@endfor
														</small>
													</td>
												</tr>
												<tr>
													<th class="text-muted">Nhận xét</th>
													<td><textarea disabled style="width: 100%;resize: none;">{{($item->comment!='')?$item->comment:'(trống)'}}</textarea></td>
												</tr>
											</tbody>
										</table>
										@endforeach

									</div>
								</div>
								@endif
								<!-- end detail review -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$('.mini-image img').hover(function(){
		$(this).click();
		var src = $(this).attr('src')
		$('.main-image img').attr('src',src);
	});

</script>
@endsection

