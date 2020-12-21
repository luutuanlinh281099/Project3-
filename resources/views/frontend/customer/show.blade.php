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
                    <div class="col-md-12">
                        <a href="{{ route('customer.edit', ['id' => $Item->id]) }}" class="btn btn-success float-right m-2">Đổi mật khẩu</a>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12" style="margin-top:30px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Ghi chú</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->billOrder->phone }}</td>
                                <td>{{ $order->billOrder->address }}</td>
                                <td>{{ $order->billOrder->note}}</td>
                                <td>{{ $order->order_total }} VMĐ</td>
                                <td>{{ $order->order_status }}</td>
                                <td>
                                    <a href="{{ route('customer.detail', ['id' => $order->id]) }}" class="btn btn-success">Chi tiết</a>
                                </td>
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