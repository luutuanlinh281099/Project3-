<header id="header">
	<!--header-->
	<div class="header_top">
		<!--header_top-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="contactinfo">
						<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i> 0334190818</a></li>
							<li><a href="#"><i class="fa fa-envelope"></i> tuanlinh99lfc@gmail.com</a></li>
							<li><a href="https://www.facebook.com/tuanlinh99lfc/"><i class="fa fa-facebook"></i> Lưu Tuấn Linh</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="social-icons pull-right">
						<ul class="nav navbar-nav">
							<div class="btn-group pull-right clearfix">
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
										Ngôn ngữ
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="">Tiếng Việt</a></li>
									</ul>
									<li><a href="{{route('admin.login')}}"><i class="fa fa-lock"></i>ADMIN</a></li>
								</div>
							</div>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header_top-->

	<div class="header-middle">
		<!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-md-4 clearfix">
					<div class="logo pull-left">
						<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
					</div>
				</div>
				<div class="col-md-8 clearfix">
					<div class="shop-menu clearfix pull-right">
						<ul class="nav navbar-nav">
							@if(Auth::check())
							<li><a href="{{route('customer.show', ['id' => Auth::user()->id])}}"><i class="fa fa-user"></i> {{Auth::user()->name}}</a></li>
							@else
							<li><a href="{{route('customer.login')}}"><i class="fa fa-user"></i>Đăng nhập</a></li>
							@endif
							@if(Auth::check())
							<li><a href=""><i class="fa fa-star"></i> Đơn hàng</a></li>
							@endif
							@if(Auth::check() && Cart::count()>=1)
							<li><a href="{{route('checkout.show')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
							@elseif(Auth::check())
							<li><a href="{{route('cart.index')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
							@endif
							@if(Auth::check())
							<li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
							@endif
							@if(Auth::check())
							<li><a href="{{route('customer.logout')}}"><i class="fa fa-lock"></i>Đăng xuất</a></li>
							@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/header-middle-->

	<div class="header-bottom">
		<!--header-bottom-->
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="mainmenu pull-left">
						<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="{{ route('page.home')}}" class="active">Trang chủ</a></li>
							<li><a href="{{ route('product.all')}}">Sản phẩm</a></li>
							<li><a href="">Tin tức</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<form action="{{route('page.search')}}" method="post">
						<div class="search_box pull-right">
							<input type="text" name="key" placeholder="Tìm kiếm sản phẩm" />
						</div>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--/header-bottom-->
</header>
<!--/header-->