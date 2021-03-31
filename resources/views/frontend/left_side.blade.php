<?php 
	$categories = DB::table('category')->get();
	$productsSell = DB::table('product')->join('order_item','product.id','=','order_item.product_id')->join('order','order.id','=','order_item.order_id')->where('order.status','Đã nhận hàng')->select('product.*',DB::raw('SUM(order_item.quantity) as number_sell'))->groupBy('product.id')->orderBy('number_sell','DESC')->limit(6)->get();
?>
<div class="col-md-3 pb-4 pt-3">
	<div class="list-category">
		<div class="card-header bg-secondary text-uppercase text-white" style="cursor: pointer;">
			<table style="width: 100%" class="category">
				<tr>
					<td><i class="fas fa-list"></i> Danh mục</td>
					<td width="20"><i class="fas fa-angle-up d-lg-none d-md-none"></i></td>
				</tr>
			</table>
		</div>
		<ul class="list-group category_block d-none d-md-block">
			@foreach($categories as $category)
			<?php 
				$count = DB::table('product')->where([['category_id','=',$category->id],['enabled',1]])->count();
				$urlid = request()->get('category');
			?>
		    <li class="list-group-item {{($urlid==$category->id)? 'list-group-item-secondary' :''}}"><a
		    class=" {{($urlid==$category->id)? 'text-danger' :''}}" href="{{url('/product?category='.$category->id)}}" style="text-decoration: none;">{{$category->name}}</a><small style="float: right;">({{$count}})</small></li>
		   	@endforeach
	  	</ul>
	</div> 
	<div class="hot-products mt-4">
		<div class="card-header bg-secondary text-uppercase text-white" style="cursor: pointer;">
			<table style="width: 100%" class="list-hot">
				<tr>
					<td><i class="fas fa-poll"></i> Sản phẩm bán chạy</td>
					<td width="20"><i class="fas fa-angle-up d-lg-none d-md-none"></i></td>
				</tr>
			
			</table>
		</div>
		<ul class="list-group d-none d-md-block rounded list-hot-block">
			@foreach($productsSell as $item)
			<?php 
					$image = DB::table('image')->where('product_id',$item->id)->first();
				?>
			<li class="list-group-item list-group-item list-group-item-action" title="{{$item->name}}">
				<div class="row">
					<div class="col-5 embed-responsive embed-responsive-1by1">
						<img src="{{asset('/images/product/'.$image->name)}}" class="embed-responsive-item" style="object-fit: cover;">
					</div>
					<div class="col-7">
						<div class="row mx-auto" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
							<a href="{{url('/product/detail/'.$item->id)}}" style="text-decoration: none;">{{$item->name}}</a>
						</div>
						<div class="row mx-auto">
							@if($item->promotion_price!=0)
						    <h6 class="price">
						     <small style="color: grey"><s>{{ number_format($item->price)}}đ</s></small> 							 
						    	{{number_format($item->promotion_price)}}đ
						    </h6>
						    @else
						    <h6 class="price"> 							 
						    	{{ number_format($item->price)}}đ
						    </h6>
						    @endif							
						</div>
						<div class="row mx-auto">
							<p>
								<i class="fas fa-shopping-cart text-success"></i>{{$item->number_sell}}
								&nbsp;
								<i class="fas fa-eye"></i>{{$item->views}}
							</p>
						</div>
					</div>
				</div>
			</li>
			<a href="#" data-toggle="tooltip" ></a>
			@endforeach
		</ul>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('.category').click(function(){
			$('.category_block').toggleClass('d-none d-md-block');
			$('.category tr td:last-child i').toggleClass('fa-angle-up').toggleClass('fa-angle-down');
		});
		$('.list-hot').click(function(){
			$('.list-hot-block').toggleClass('d-none d-md-block');
			$('.list-hot tr td:last-child i').toggleClass('fa-angle-up').toggleClass('fa-angle-down');
		});
	});
</script>