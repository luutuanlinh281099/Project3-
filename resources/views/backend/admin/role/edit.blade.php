@extends('backend.layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/role/add/add.css') }}">
@endsection

@section('js')
<script src="{{ asset('admins/role/add/add.js') }}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Vai trò', 'key' => 'Chỉnh sửa'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('role.update', ['id' => $role->id]) }}" method="post" enctype="multipart/form-data" style="width: 100%;">
                    <div class="col-md-12">
                        @csrf
                        <div class="form-group">
                            <label>Tên vai trò</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên vai trò" value="{{ $role->name }}">
                        </div>
                        <div class="form-group">
                            <label>Mô tả vai trò</label>
                            <textarea class="form-control" name="display_name" rows="4">{{ $role->display_name }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="card border-primary mb-3 col-md-12">
                                <div class="card-header" style="background:#00e765;">
                                    <label class="form-check-label" for="materialChecked2">
                                        <input type="checkbox" value="" class="checkbox_all">
                                    </label>
                                    Chọn tất cả
                                </div>
                            </div>
                            @foreach($permissionsParent as $permissionsParentItem)
                            <div class="card border-primary mb-3 col-md-12">
                                <div class="card-header">
                                    <label class="form-check-label" for="materialChecked">
                                    <input  type="checkbox" 
                                            name="permission_id[]" 
                                            value="{{ $permissionsParentItem->id }}" 
                                            class="checkbox_wrapper" {{$permissionsChecked->contains('id', $permissionsParentItem->id)?'checked':''}}
                                    >
                                    </label>
                                    {{ $permissionsParentItem->name }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
