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
    @include('backend.partials.content-header', ['name' => 'Sản phẩm', 'key' => 'Chỉnh sửa'])
    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <input type="file" class="form-control-file" name="feature_image_path">
                            <div class="col-md-4 feature_image_container">
                                <div class="row">
                                    <img class="feature_image" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple class="form-control-file" name="image_path[]">
                            <div class="col-md-12 container_image_detail">
                                <div class="row">
                                    @foreach($product->productImages as $producImageItem)
                                    <div class="col-md-3">
                                        <img class="image_detail_product" src="{{ $producImageItem->image_path }}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chọn thương hiệu</label>
                            <select class="form-control select2_init" name="brand_id">
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label>Nhập tags</label>
                                <input type="text" class="bootstrap-tagsinput form-control" data-role="tagsinput" name="tags[]" placeholder="Nhập tag" 
                                @foreach($product->tags as $tagItem )
                                value="{{ $tagItem->name }}" 
                                @endforeach
                                />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Lượt xem</label>
                            <input type="text" class="form-control" name="view" placeholder="Nhập lượt xem" value="{{ $product->view }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nhập nội dung</label>
                            <textarea name="contents" class="form-control tinymce_editor_init" rows="8">{{ $product->content }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
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