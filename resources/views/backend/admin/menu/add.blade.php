@extends('backend.layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

    @section('content')
    <div class="content-wrapper">
        @include('backend.partials.content-header', ['name' => 'Menu', 'key' => 'Thêm mới'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('menu.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên menus</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên menu">
                            </div>
                            <div class="form-group">
                                <label>Chọn menus cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $optionSelect !!}
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