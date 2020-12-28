@extends('backend.layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Vận chuyển', 'key' => 'Chỉnh sửa'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('ship.update',['id' => $ship->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên thương hiệu</label>
                            <input type="text" class="form-control" name="name" value="{{ $ship->name }}" placeholder="Nhập tên tỉnh thành">
                        </div>
                        <div class="form-group">
                            <label>Phí vận chuyển</label>
                            <input type="text" class="form-control" name="ship" value="{{ $ship->ship }}" placeholder="Nhập phí vận chuyển">
                        </div>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection