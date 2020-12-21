@extends('backend.layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Phân Quyền', 'key' => 'Thêm mới'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('permission.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên phân quyền</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên phân quyền">
                        </div>
                        <div class="form-group">
                            <label>Chức năng</label>
                            <input type="text" class="form-control" name="display_name" placeholder="Nhập chức năng">
                        </div>
                        <div class="form-group">
                            <label>key code</label>
                            <input type="text" class="form-control" name="key_code" placeholder="Nhập key code">
                        </div>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection