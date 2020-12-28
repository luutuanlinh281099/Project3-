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
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{route('page.home')}}">Home</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div>
		<h2>Nhập thông tin giao hàng</h2>
		<div class="register-req">
			<p>Khách hàng lưu ý không được để trống phần nhập</p>
		</div>
		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-6">
					<div class="shopper-info">
						<p>Điền thông tin đơn hàng</p>
						<form action="{{ route('checkout.add')}}" method="post">
							{{csrf_field()}}
							<input type="text" name="name" placeholder="Họ tên">
							<input type="text" name="email" placeholder="Email">
							<input type="text" name="address" placeholder="Địa chỉ">
							<input type="text" name="phone" placeholder="Điện thoại">
							<textarea name="note" rows="5"> Ghi chú </textarea>
							<p>Chọn tỉnh thành</p>
							<select class="form-control select2_init" name="ship_id">
								@foreach($ships as $ship)
								<option value="{{ $ship->id }}">{{ $ship->name }}</option>
								@endforeach
							</select>
							<input class="btn btn-primary" type="submit" name="bill" placeholder="Gửi">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="payment-options">
			<h2>Chọn hình thức thanh toán</h2>
			<span>
				<label><input type="checkbox" checked="checked">Thanh toán khi nhận hàng</label>
			</span>
		</div>
	</div>
</section>
<!--/#cart_items-->
@endsection