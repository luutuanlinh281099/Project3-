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
		<!--/breadcrums-->

		<div class="register-req">
			<p>Khách hàng lưu ý không được để trống phần nhập</p>
		</div>
		<!--/register-req-->

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
							<select>
								<option value="hanoi" data-ship-fee="0.1">Hanoi</option>
							</select>
							<input type="text" name="phone" placeholder="Điện thoại">
							<textarea name="note" rows="5"> Ghi chú </textarea>
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
			<span>
				<label><input type="checkbox">Thanh toán qua ATM</label>
			</span>
		</div>
		<div class="review-payment">
			<h2>Xem lại giỏ hàng</h2>
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
				<li>Phí vận chuyển <span>0 VNĐ</span></li>
				<li>Số tiền cần thanh toán <span>{{ ($total) }} VNĐ</span></li>
			</ul>
		</div>
	</div>
</section>
<!--/#cart_items-->
@endsection