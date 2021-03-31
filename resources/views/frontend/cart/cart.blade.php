@extends('frontend.master')
@section('title')
	<title>Giỏ hàng</title>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="page-header">
			    	<h3 class="text-center">Giỏ hàng của bạn</h3> 
			    	<hr>     
			  	</div>
			  	
			@include('frontend.cart.cartlist')
			@if(session('cart'))
			<div style="float: right;">
					<a class="btn btn-secondary text-white" data-toggle="modal" data-target="#destroyCartModal"><i class="fas fa-trash-alt"></i> Hủy giỏ hàng</a>
					<a href="{{url('/order')}}" class="btn btn-success">Đặt hàng</a>
			</div>
			@endif
		</div>
	</div>
</div>
<!-- destroy cart ? Modal-->
    <div class="modal fade" id="destroyCartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn muốn hủy giỏ hàng?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đồng ý" bên dưới để hủy giỏ hàng.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                    <a class="btn btn-primary" href="{{url('/destroyCartList')}}">Đồng ý</a>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
	function deleteCartList(id){
		$.ajax({
			url : 'deleteCartList/'+id,
			type : 'get'
		}).done(function(response){
			$('.cartlist').empty();
			$('.cartlist').html(response);
		});
	}
	function updateCartList(id){
		$.ajax({
			url : 'updateCartList/'+id+'/'+$('.cartlist .quantity'+id).val(),
			type : 'get'
		}).done(function(response){
			$('.cartlist').empty();
			$('.cartlist').html(response);
		});
	}
	/*cart bên trang cart vì bị lỗi @@*/
		function quantityCartList(id){
		var value = $('.cartlist .quantity'+id).val();
		value = value.replace(/[^0-9]/img,"");
		$('.cartlist .quantity'+id).val(value);
		var max =parseInt($('.cartlist .quantity'+id).attr('max'));
		if(value>max) $('.cartlist .quantity'+id).val(max);
		}		
</script>
@endsection