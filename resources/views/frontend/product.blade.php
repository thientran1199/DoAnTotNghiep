@extends('frontend.master')
@section('title')
	<title>Sản phẩm</title>
@endsection
@section('content')
<?php 
	$cart = session()->has('cart') ? session('cart') : null;
?>
<div class="container">
	<div class="row">
		<!-- danh muc -->
			@include('frontend.left_side')
		<!-- end danh muc -->
		<div class="col">
			<div class="page-header">
			    	<h3>Sản phẩm
			    		<?php
			    			$key= request()->get('key');
				    		$id = request()->get('category');
				    		if($id!=null) {
				    		$db = DB::table('category')->where('id',$id)->first();
			    		?>
			   				<small>> {{$db->name}}</small>
			    		<?php }?>
			    			<small> {{(isset($key))?'> Tìm kiếm':''}}</small>
			    	</h3> 
			    	<hr>     
			</div>
			<div class="container">
				<!-- lựa chọn nâng cao như giá, sắp tên -->
				@include('frontend.advanced_options')
			</div>
			<hr>
			<div class="mb-4">
				<p>Hiển thị {{$listProduct->count()}} sản phẩm (tổng số {{$listProduct->total()}} sản phẩm) {{(isset($key))?('cho từ khóa : "'.$key.'"'):''}}</p>
				
			</div>
			<div class="row">
				@foreach($listProduct as $item)
				<div class="col-md-4">
					<!-- sản phẩm -->
					<div class="card mb-4">
						<div class="card-img-top embed-responsive embed-responsive-1by1">
					  		<img src="{{asset('images/product/'.$item->images[0]->name)}}" alt="ảnh{{ $item->name}}" class="embed-responsive-item">
					  		<div class="button-product">
							    <div><a href="{{url('/product/detail/'.$item->id)}}" class="btn btn-light text-danger"><i class="fas fa-info-circle"></i> Chi tiết</a></div>
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
				</div>
				@endforeach
			</div>
			{{$listProduct->withQueryString()->links()}}
		</div>
	</div>		
</div>
@endsection