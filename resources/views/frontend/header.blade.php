
<div class="navbar navbar-expand-md header">
		<div class="container">
			<div class="logo_container">
				<a href="{{url('/')}}"><img src="{{asset('images/logoWEB/logo1.png')}}" alt="LOGO"></a>
			</div>
			<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse"  aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
			<div class="collapse navbar-collapse menu_header">

				<ul class="navbar-nav ml-auto">
					<form class="form-inline" style="margin: auto;" method="get" action="{{url('/product')}}">
						<div class="input-group" style="min-width: 280px">
							<input class="form-control" type="search" name="key" placeholder="Nhập từ khóa tên sản phẩm" aria-label="Search" required>
							<div class="input-group-append">
			   					<button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
			   				</div>
						</div>
					</form>
					<li class="nav-item rounded">
				    	<a class="nav-link"  href="{{url('/')}}"><i class="fas fa-home"></i> Trang chủ</a>
				  	</li>
				  	<li class="nav-item rounded">
				    	<a class="nav-link" href="{{url('/product')}}"><i class="fas fa-clock"></i> Sản phẩm</a>
				  	</li>
				  	<li class="nav-item rounded">
				    	<a class="nav-link" href="{{url('/contact')}}"><i class="fas fa-phone-alt"></i> Liên hệ</a>
				  	</li>
				  	<li class="nav-item rounded dropdown">
				    	<a class="nav-link dropdown-toggle" id="navbarDropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-user-circle"></i> {{(Auth::guard('account_customer')->check())?Auth::guard('account_customer')->user()->username:'Tài khoản'}}</a>
				    	<div class="dropdown-menu" aria-labelledby="navbarDropdownLink">
				    		@if(!(Auth::guard('account_customer')->check()))
					        <a class="dropdown-item" href="{{url('/login')}}"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
					        <a class="dropdown-item" href="{{url('/signup')}}"><i class="fas fa-users"></i> Đăng kí</a>
					        @else
						        <a class="dropdown-item" href="{{url('/customer/profile')}}"><i class="fas fa-id-card-alt"></i> Trang cá nhân</a>
						        <div class="dropdown-divider"></div>
						        <a class="dropdown-item" href="{{url('/logout')}}" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
					        @endif
				        </div>
				  	</li>

				    <a class="text-white btn btn-success button-mini-cart {{(request()->is(['cart','order'])) ? 'd-none' : '' }}"><i class="fas fa-shopping-cart"></i> Giỏ hàng <span class="badge badge-light total-quantity">{{session()->has('cart') ? session('cart')->getTotalQuantity():''}}</span></a>

				</ul>
			</div>
		</div>
	</div>
	<div class="mini-cart rounded">
	        @include('frontend.cart.minicart')
	</div>

<script type="text/javascript">
	$(function(){
		$('.button-mini-cart').click(function(){
		$('.mini-cart').slideToggle();
			});
		/*$('.dropdown-toggle').dropdown();*/
		$('.navbar-toggler').click(function(){
			$('.menu_header').slideToggle();
		});
		// $('#key').change(function(){
		// 	var hrefValue = $('#search').attr('href')+'?search='+$(this).val();
		// 	$('#search').attr('href',hrefValue);
		// });
	});

</script>
