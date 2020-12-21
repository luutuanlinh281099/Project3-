@extends('backend.layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Danh Mục', 'key' => 'Thêm mới'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn danh mục cha</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection