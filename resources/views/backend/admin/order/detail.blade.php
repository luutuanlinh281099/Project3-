@extends('backend.layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Đơn hàng', 'key' => 'Chi tiết'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h4>Mã đơn hàng : {{ $order->user_id }}</h4>
                    </div>
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
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection