@extends('frontend.master')
@section('title')
	<title>T-Shop</title>
@endsection
@section('content')
<?php
	$cart = session()->has('cart') ? session('cart') : null;
?>
<div class="container">
<div class="row">
	<!--  -->

	@include('frontend.left_side')

	<div class="col-md-9">
		<div class="row">
			<!-- slide -->
			<div class="col-12">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
			       	<ol class="carousel-indicators">
			       	@foreach($slides as $key => $slide)
			         @if($key == 0)
			          <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="active"></li>
			         @else
			          <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}"></li>
			         @endif
			         @endforeach
			        </ol>

			        <div class="carousel-inner embed-responsive embed-responsive-16by9">
			          @foreach($slides as $key => $slide)
			          @if($key == 0)
			          <div class="carousel-item active embed-responsive-item">
			          	<img class="d-block w-100" src="{{('images/slide/'.$slide->name)}}" alt="slide{{$slide->id}}">
			          </div>
			          @else
			          <div class="carousel-item embed-responsive-item">
			          	<img class="d-block w-100" src="{{('images/slide/'.$slide->name)}}" alt="slide{{$slide->id}}">
			          </div>
			          @endif
			          @endforeach
			        </div>
			        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			          <span class="sr-only">Previous</span>
			        </a>
			        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			          <span class="carousel-control-next-icon" aria-hidden="true"></span>
			          <span class="sr-only">Next</span>
			        </a>
			      </div>
			</div>
		</div>
		<!-- end slide -->
		<!-- san pham moi thêm -->
		<div class="row">
			<div class="col">
				<div class="button button-latest">
					<span class="btn btn-outline-dark button-left"><i class="fas fa-angle-left"></i></span>
					<span class="btn btn-outline-dark button-right"><i class="fas fa-angle-right"></i></span>
				</div>
				<div class="card-header bg-success text-uppercase text-white"><i class="fas fa-spinner"></i><b> Sản phẩm mới</b></div>
				<div class="card-body slider">
					<div class="list-item list-latest">
						@foreach($listLatest as $item)
						<!-- sản phẩm -->
							<div class="card product">
								<div class="card-img-top embed-responsive embed-responsive-1by1">
							  		<img src="{{asset('images/product/'.$item->images[0]->name)}}" alt="ảnh{{ $item->name}}" class="embed-responsive-item">
							  		<div class="button-product">
									    <a href="{{url('/product/detail/'.$item->id)}}" class="btn btn-light text-danger"><i class="fas fa-info-circle"></i> Chi tiết</a>
									    @if($item->quantity_in_stock>0)
										    @if($cart!=null&&array_key_exists($item->id,$cart->getListCartItem()))
										    <a class="btn btn-success add-cart{{$item->id}}" href="javascript:void(0);"><i class='fas fa-check'></i> Đã thêm vào giỏ</a>
										    @else
										    <a href="javascript: addCartItem({{$item->id}});" class="btn btn-danger add-cart{{$item->id}}"><i class="fas fa-cart-plus"></i> Thêm vào giỏ</a>
										    @endif
									    @else
											<span class="btn btn-warning"><i class="far fa-frown"></i> Sản phẩm đã bán hết</span>
										@endif
									</div>
							  	</div>
							  	@if($item->promotion_price!=0)
							  	<span class="badge badge-info sale-item">Giảm giá</span>
							  	@endif
							  	<span class="badge badge-secondary quantity-in-stock">Còn {{$item->quantity_in_stock}} sản phẩm</span>
							  	<div class="card-body">
								    <h6 class="card-title"><b>{{ $item->name}}</b></h6>
								    <p><i>{{ $item->category->name}}</i></p>
								    @if($item->promotion_price!=0)
								    <h6 class="price" style="color: red">
								     <small style="color: grey"><s>{{ number_format($item->price)}}đ</s></small>
								    	{{number_format($item->promotion_price)}}đ
								    </h6>
								    @else
								    <h6 class="price" style="color: red">
								    	{{ number_format($item->price)}}đ
								    </h6>
								    @endif
							  	</div>
							</div>
						<!-- end sản phẩm -->
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<!-- end san pham moi  -->
		<!-- san pham sale -->
		<div class="row">
			<div class="col">
				<div class="button button-sale">
					<span class="btn btn-outline-dark button-left"><i class="fas fa-angle-left"></i></span>
					<span class="btn btn-outline-dark button-right"><i class="fas fa-angle-right"></i></span>
				</div>
				<div class="card-header bg-warning text-uppercase text-white">
					<i class="fab fa-hotjar"></i><b> Sản phẩm đang giảm giá</b>
				</div>
				<div class="card-body slider">
					<div class="list-item list-sale">
						@foreach($listSale as $item)
						<!-- sản phẩm -->
							<div class="card product">
								<div class="card-img-top embed-responsive embed-responsive-1by1">
							  		<img src="{{asset('images/product/'.$item->images[0]->name)}}" alt="ảnh{{ $item->name}}" class="embed-responsive-item">
							  		<div class="button-product">
									    <a href="{{url('/product/detail/'.$item->id)}}" class="btn btn-light text-danger"><i class="fas fa-info-circle"></i> Chi tiết</a>
									    @if($item->quantity_in_stock>0)
										    @if($cart!=null&&array_key_exists($item->id,$cart->getListCartItem()))
										    <a class="btn btn-success add-cart{{$item->id}}" href="javascript:void(0);"><i class='fas fa-check'></i> Đã thêm vào giỏ</a>
										    @else
										    <a href="javascript: addCartItem({{$item->id}});" class="btn btn-danger add-cart{{$item->id}}"><i class="fas fa-cart-plus"></i> Thêm vào giỏ</a>
										    @endif
										@else
											<span class="btn btn-warning"><i class="far fa-frown"></i> Sản phẩm đã bán hết</span>
										@endif
									</div>
							  	</div>
							  	@if($item->promotion_price!=0)
							  	<span class="badge badge-info sale-item">Giảm giá</span>
							  	@endif
							  	<span class="badge badge-secondary quantity-in-stock">Còn {{$item->quantity_in_stock}} sản phẩm</span>
							  	<div class="card-body">
								    <h6 class="card-title"><b>{{ $item->name}}</b></h6>
								    <p><i>{{ $item->category->name}}</i></p>
								    @if($item->promotion_price!=0)
								    <h6 class="price" style="color: red">
								     <small style="color: grey"><s>{{ number_format($item->price)}}đ</s></small>
								    	{{number_format($item->promotion_price)}}đ
								    </h6>
								    @else
								    <h6 class="price" style="color: red">
								    	{{ number_format($item->price)}}đ
								    </h6>
								    @endif
							  	</div>
							</div>
						<!-- end sản phẩm -->
						@endforeach
					</div>
				</div>

			</div>
		</div>
		<!-- end san pham sale -->
	</div>
</div>
</div>
<script type="text/javascript">
	$(function(){
		/*slide product hơi cùi*/
		/*list sale*/
		$('.button-sale .button-left').click(function(){
			var left = parseFloat($('.list-sale').css('left'));
			left+=230;
			if(left>0){
				left = 0;
			}
			$('.list-sale').css('left',left);
		});
		$('.button-sale .button-right').click(function(){
			var limit = parseFloat($('.list-sale').css('width')) -parseFloat($('.slider').css('width')) ;
			var left = parseFloat($('.list-sale').css('left'));
			left-=230;
			if(left<-limit-230){
				left=0;
			}
			$('.list-sale').css('left',left);
		});
		/*list latest same*/
		$('.button-latest .button-left').click(function(){
			var left = parseFloat($('.list-latest').css('left'));
			left+=230;
			if(left>0){
				left = 0;
			}
			$('.list-latest').css('left',left);
		});
		$('.button-latest .button-right').click(function(){
			var limit = parseFloat($('.list-latest').css('width')) -parseFloat($('.slider').css('width')) ;
			var left = parseFloat($('.list-latest').css('left'));
			left-=230;
			if(left<-limit-230){
				left=0;
			}
			$('.list-latest').css('left',left);
		});
		var intervalLastest =  setInterval(function(){
			$('.button-latest .button-right').click();
		},5000);
	});
</script>
@endsection
