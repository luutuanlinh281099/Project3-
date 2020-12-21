@extends('backend.layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Thương hiệu', 'key' => 'Danh sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('brand.create') }}" class="btn btn-success float-right m-2">Thêm mới</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên thương hiệu</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <th scope="row">{{ $brand->id }}</th>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    <a href="{{ route('brand.edit', ['id' => $brand->id]) }}" class="btn btn-default">Chỉnh sửa</a>
                                    <a href="{{ route('brand.delete', ['id' => $brand->id]) }}" class="btn btn-danger">Xóa bỏ</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection