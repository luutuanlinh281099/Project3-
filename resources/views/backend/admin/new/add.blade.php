@extends('backend.layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Tin tức', 'key' => 'Thêm mới'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('new.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên tin tức</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên tin tức">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="content" class="@error('contents')
                                        is-invalid @enderror form-control tinymce_editor_init" rows="8">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Lượt xem</label>
                            <input type="text" class="form-control" name="view" placeholder="Nhập lượt xem">
                        </div>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection