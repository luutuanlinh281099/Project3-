@extends('frontend.layouts.page')

@section('title')
<title>Home page</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
<section id="cart_items">
	@foreach ($bills as $bill)
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{route('page.home')}}">Home</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div>
		<div class="shopper-informations">
			<h2>Thông tin nhận hàng</h2>
			<div class="row">
				<div class="col-sm-6">
					<div class="shopper-info">
						<p style="background:pink"> {{$bill->name}} </p>
						<p style="background:pink"> {{$bill->email}} </p>
						<p style="background:pink"> {{$bill->address}} </p>
						<p style="background:pink"> {{$bill->phone}} </p>
						<p style="background:pink"> {{$bill->note}} </p>
						<select class="form-control select2_init" name="ship_id">
							<option>{{ optional($bill->ship)->name }}</option>
						</select>
					</div>
				</div>
			</div>
			<div class="payment-options">
				<div class="float-right col-md-6">
					<h2></h2>
				</div>
				<span>
					<h3>Thanh toán khi nhận hàng</h3>
				</span>
			</div>
		</div>
		<div class="review-payment">
			<h1>Xem lại giỏ hàng</h1>
		</div>
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
			<ul>
				<li>Tổng tiền <span>{{ ($total) }} VNĐ</span></li>
				<li>Phí vận chuyển <span>{{ optional($bill->ship)->ship }} VNĐ</span></li>
			</ul>
		</div>
		<div class="col-md-12">
			<a href="{{ route('checkout.order', ['id' => $bill->id]) }}" class="btn btn-success float-right m-2">Xác nhận đơn hàng</a>
		</div>
		@endforeach
</section>
@endsection