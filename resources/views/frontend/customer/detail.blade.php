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
                @foreach($user as $Item)
                <div class="col-sm-5 float-center">
                    <h3>Tên: {{$Item->name}}</h3>
                    <h4>Email: {{$Item->email}}</h4>
                    <h4>Mã đơn hàng : {{ $orders->user_id }}</h4>
                    <div class="col-md-12">
                        <a href="{{ route('customer.edit', ['id' => $Item->id]) }}" class="btn btn-success float-right m-2">Đổi mật khẩu</a>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12" style="margin-top:30px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá </th>
                                <th scope="col">Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderDetails as $Item)
                            <tr>
                                <th scope="row">{{ $Item->product_id }}</th>
                                <th>{{ $Item->product_name }}</th>
                                <td>{{ $Item->product_price}}</td>
                                <td>{{ $Item->product_qty}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection