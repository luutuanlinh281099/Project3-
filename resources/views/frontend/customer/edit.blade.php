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
<section>
    <div class="container">
        <div class="row">
            @include('frontend.partials.sidebar')
            <div class="col-sm-9 padding-right">
                <div class="col-md-6">
                    <form action="{{ route('customer.update', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Đổi mật khẩu</label>
                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu mới">
                        </div>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection