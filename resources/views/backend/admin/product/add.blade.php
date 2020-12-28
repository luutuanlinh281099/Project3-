@extends('backend.layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Sản phẩm', 'key' => 'Thêm mới'])
    <div class="col-md-12">
    </div>
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                        </div>
                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control-file mb-2 preview_image_detail" name="image_path[]">
                            <div class="row image_detail_wrapper">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Chọn thương hiệu</label>
                            <select class="form-control select2_init @error('brand_id') is-invalid @enderror" name="brand_id">
                                <option value="">Chọn thương hiệu</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nhập tags cho sản phẩm</label>
                            <select name="tags[]" class="form-control tags_select_choose">
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Lượt xem</label>
                            <input type="text" class="form-control" name="view" placeholder="Nhập lượt xem" value="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nhập nội dung</label>
                            <textarea name="contents" class="@error('contents')
                                        is-invalid @enderror form-control tinymce_editor_init" rows="8">{{ old('contents') }}
                            </textarea>
                            @error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>
@endsection