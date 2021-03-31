<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    @yield('title')
	<link rel="icon" type="image/png" href="{{asset('images/logoWEB/logo1.png')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/hotline.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/js/bootstrap.js')}}"></script>

</head>
<body>
	<!-- header -->
	@include('frontend.header')
	<!-- end header -->
	<!-- alert  -->
	@if(session('msg'))
	    <div class="alert alert-{{session('typeMsg')}} alert-dismissible text-center mt-1" style="position: absolute;right: 0;z-index: 5">{{ session('msg') }}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	 	</button>
		</div>
	@endif
	<!-- end alert -->
	<!-- main -->
	<div class="main {{(request()->is('/')) ? '' : 'pt-3 pb-4' }}">
	@yield('content')
	</div>
	<!-- end main -->
	<!-- footer -->
	@include('frontend.footer')
	<!-- end footer -->
	<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn muốn đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn muốn rời phiên đăng nhập.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                    <a class="btn btn-primary" href="{{url('/logout')}}">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <div class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
            <a href="tel:0775275597"  class="pps-btn-img">
                <img src="{{ asset('images/logoWEB/icon-call-nh.png')}}" alt="Gọi điện thoại" width="50">
            </a>
            </div>
        </div>
        <div class="hotline-bar">
            <a  style="text-decoration: none" href="tel:0775275597">
                <span class="text-hotline">0775275597</span>
            </a>
        </div>
    </div>
    <!-- scroll về top -->
    <button id="scroll-top" class="btn"><i class="fas fa-angle-double-up"></i></button>
	<!-- javascript -->
	<script type="text/javascript" src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/js/bootstrap.js')}}"></script>

	<script type="text/javascript">
		$(function(){
		  	$('.carousel').carousel({
		      interval: 2000
		    });
		    $('.dropdown-toggle').dropdown();
		    /*load lại trang*/
		  	if(performance.navigation.type == 2){
			   location.reload(true);
			   $(this).scrollTop(0);
			}
			$('#scroll-top').click(function(){
				$(window).scrollTop(0);
			});
			window.setTimeout(function() {
			    $(".alert").fadeOut(2000);
			    $(".alert").setTimeout(function(){
			    	$(this).remove();
			    });
			}, 3000);
		});

		function addCartItem(id){
			var quantity = 1;
			if($('.quantity'+id)[0]) quantity = $('.quantity'+id).val();
			$.ajax({
				url : 'addCartItem/'+id +'/',
				type : 'GET'
			}).done(function(response){
				$(".add-cart"+id).empty();
				$(".add-cart"+id).html("<i class='fas fa-check'></i> Đã thêm vào giỏ").attr({'class':'btn btn-success add-cart'+id,'href':'javascript:void(0);'});
				$('.mini-cart').empty();
				$('.mini-cart').html(response);
				$('.total-quantity').text($('.total-quantity-hidden').val());
			});
		}
		function deleteCartItem(id){
			$.ajax({
				url : 'deleteCartItem/'+id,
				type : 'GET'
			}).done(function(response){
				$(".add-cart"+id).empty();
				$(".add-cart"+id).html("<i class='fas fa-cart-plus'></i> Thêm vào giỏ").attr({'class':'btn btn-danger add-cart'+id,'href':"javascript: addCartItem("+id+");"});
				$('.mini-cart').empty();
				$('.mini-cart').html(response);
				$('.total-quantity').text(($('.total-quantity-hidden')[0]) ? $('.total-quantity-hidden').val():'');
			});
		}
		function updateCartItem(id){
			$.ajax({
				url : 'updateCartItem/'+id+'/'+$('.quantity'+id).val(),
				type : 'get'
			}).done(function(response){
				if ($('.quantity'+id).val()<=0) {
					$(".add-cart"+id).empty();
					$(".add-cart"+id).html("<i class='fas fa-cart-plus'></i> Thêm vào giỏ").attr({'class':'btn btn-danger add-cart'+id,'href':"javascript: addCartItem("+id+");"});
				}
				$('.mini-cart').empty();
				$('.mini-cart').html(response);
				$('.total-quantity').text($('.total-quantity-hidden').val());
			});
		}
		/*số lượng cho ô nhập giỏ hàng*/
		function quantityCart(id){
		var value = $('.quantity'+id).val();
		value = value.replace(/[^0-9]/img,"");
		$('.quantity'+id).val(value);
		var max =parseInt($('.quantity'+id).attr('max'));
		if(value>max) $('.quantity'+id).val(max);
		}


	</script>
</body>
</html>
