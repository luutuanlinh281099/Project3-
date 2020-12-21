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
<section id="form">
	<!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form">
					<!--login form-->
					<h2>Đăng nhập</h2>
					<form action="{{route('customer.post-login')}}" method="post">
						{{csrf_field()}}
						<input type="email" name="email" id="email" placeholder="Email" />
						<input type="password" name="password" id="password" placeholder="Mật khẩu" />
						<span>
							<input type="checkbox" class="checkbox" name="remember_me">
							nhớ mật khẩu
						</span>
						<button type="submit" class="btn btn-default">Đăng nhập</button>
					</form>
				</div>
				<!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">Or</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form">
					<!--sign up form-->
					<h2>Đăng kí</h2>
					<form action="{{route('customer.add')}}" method="post">
					{{csrf_field()}}
						<input type="text" name="name" placeholder="Tên" />
						<input type="email" name="email" placeholder="Email" />
						<input type="password" name="password" placeholder="Password" />
						<select class="form-control select2_init" name="role_id">
							<option value="3">Khách hàng</option>
						</select>
						<br>
						<button type="submit" class="btn btn-default">Đăng kí</button>
					</form>
				</div>
				<!--/sign up form-->
			</div>
		</div>
	</div>
</section>
<!--/form-->
@endsection