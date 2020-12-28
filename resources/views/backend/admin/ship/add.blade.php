@extends('backend.layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Vận chuyển', 'key' => 'Thêm mới'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('ship.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên tỉnh thành</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên tỉnh thành">
                        </div>
                        <div class="form-group">
                            <label>Phí vận chuyển</label>
                            <input type="text" class="form-control" name="ship" placeholder="Nhập phí vận chuyển">
                        </div>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection