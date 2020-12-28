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
    @include('backend.partials.content-header', ['name' => 'Sản phẩm', 'key' => 'Tìm kiếm'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @include('backend.partials.header-product')
                <div class="col-md-12">
                    <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Thêm mới</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Thương hiệu</th>
                                <th scope="col">Lượt xem</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $productItem)
                            <tr>
                                <th scope="row">{{ $productItem->id }}</th>
                                <td>{{ $productItem->name }}</td>
                                <td>{{ number_format($productItem->price) }}</td>
                                <td>
                                    <img class="product_image_150_100" src="{{ $productItem->feature_image_path }}" alt="">
                                </td>
                                <td>{{ optional($productItem->category)->name }}</td>
                                <td>{{ optional($productItem->brand)->name }}</td>
                                <th>{{ $productItem->view }}</th>
                                <td>
                                    <a href="{{ route('product.edit', ['id' => $productItem->id]) }}" class="btn btn-default">Chỉnh sửa</a>
                                    <a href="{{ route('product.delete', ['id' => $productItem->id]) }}" class="btn btn-danger">Xóa bỏ</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection