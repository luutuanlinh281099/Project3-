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
    @include('backend.partials.content-header', ['name' => 'Vận Chuyển', 'key' => 'Danh sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('ship.create') }}" class="btn btn-success float-right m-2">Thêm mới</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tỉnh thành</th>
                                <th scope="col">Phí vận chuyển</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ships as $ship)
                            <tr>
                                <th scope="row">{{ $ship->id }}</th>
                                <td>{{ $ship->name }}</td>
                                <td>{{ $ship->ship }}</td>
                                <td>
                                    <a href="{{ route('ship.edit', ['id' => $ship->id]) }}" class="btn btn-default">Chỉnh sửa</a>
                                    <a href="{{ route('ship.delete', ['id' => $ship->id]) }}" class="btn btn-danger">Xóa bỏ</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $ships->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection