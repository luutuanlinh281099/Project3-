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
    @include('backend.partials.content-header', ['name' => 'Đơn hàng', 'key' => 'Danh sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('order.unconfimred') }}" class="btn btn-danger float-left m-2">Đơn hàng chưa xác nhận </a>
                    <a href="{{ route('order.shipping') }}" class="btn btn-danger float-left m-2">Đơn hàng đang giao </a>
                    <a href="{{ route('order.delivered') }}" class="btn btn-danger float-left m-2">Đơn hàng đã giao </a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Ghi chú</th>
                                <th scope="col">Tình trạng</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->userOrder->name }}</td>
                                <td>{{ $order->order_total }} VMĐ</td>
                                <td>{{ $order->billOrder->phone }}</td>
                                <td>{{ $order->billOrder->address }}</td>
                                <td>{{ $order->billOrder->note}}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>
                                    <a href="{{ route('order.edit', ['id' => $order->id]) }}" class="btn btn-default">Chỉnh sửa</a>
                                    <a href="{{ route('order.detail', ['id' => $order->id]) }}" class="btn btn-success">Chi tiết</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection