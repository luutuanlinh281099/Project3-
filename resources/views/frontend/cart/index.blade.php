@extends('frontend.layouts.page')

@section('title')
<title>Home page</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('productdetail/detail.css') }}">
@endsection

@section('js')
<link rel="stylesheet" href="{{ asset('/home/home.js') }}">
@endsection

@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs row">
			<ol class="breadcrumb">
				<li><a href="{{route('page.home')}}">Home</a></li>
				<li class="active">Giỏ hàng</li>
			</ol>
		</div>
		@if (Cart::count()>=1)
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Ảnh</td>
						<td class="description">Tên sản phẩm</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Thành tiền</td>
						<td class="action">Quản lí</td>
					</tr>
				</thead>
				<tbody>
					@foreach($carts as $Item)
					<tr>
						<td class="cart_product">
							<img src="{{ $Item->options->img }}" alt="" style="width:100px ; height:100px">
						</td>
						<td class="cart_description">
							<h4><a href="">{{ $Item->name }}</a></h4>
							<p>Mã sản phẩm: {{ $Item->id }}</p>
						</td>
						<td class="cart_price">
							<p>{{ number_format($Item->price) }} VNĐ</p>
						</td>
						<td class="cart_quantity">
							<form action="{{ route('cart.update') }}" method="post">
								{{csrf_field()}}
								<div class="cart_quantity_button">
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $Item->qty }}" size="3">
									<input class="form-control" type="hidden" name="rowId" value="{{ $Item->rowId }}">
									<input class="btn-btn-default  btn-sm" type="submit" name="update" value="cập nhật">
								</div>
							</form>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">{{ number_format($Item->price * $Item->qty ) }} VNĐ</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{ route('cart.delete',['id' => $Item->rowId]) }}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<h1>Tổng tiền : {{ ($total) }} VNĐ</h1>
					</div>
					<div class="col-md-6" style="padding-top: 20px;">
						<a href="{{ route('cart.delete',['id' => 'all']) }}" class="btn btn-danger" style=" float:right">Xóa giỏ hàng</a>
						<a href="{{ route('page.home') }}" class="btn btn-success float-right m-2" style=" float:right">Tiếp tục mua hàng</a>
					</div>
				</div>
			</div>
		</div>
		@else
		<h2>Giỏ hàng rỗng</h2>
		@endif
	</div>
</section>
<!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Tổng tiền <span>{{ ($total) }} VNĐ</span></li>
						<li>Phí vận chuyển <span>0 VNĐ</span></li>
						<li>Số tiền cần thanh toán <span>{{ ($total) }} VNĐ</span></li>
					</ul>
					@if(Auth::check())
					<a class="btn btn-default check_out" href="{{route('checkout.show')}}">Thanh toán</a>
					@else
					<a class="btn btn-default check_out" href="{{route('customer.login')}}">Thanh toán</a>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
<!--/#do_action-->
@endsection