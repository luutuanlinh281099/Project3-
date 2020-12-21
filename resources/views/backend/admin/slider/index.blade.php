@extends('backend.layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Slide', 'key' => 'Danh sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2"> Thêm mới</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Desciption</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                            <tr>
                                <th scope="row">{{ $slider->id }}</th>
                                <td>{{ $slider->name }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    <img class="image_slider_150_100" src="{{ $slider->image_path }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('slider.edit', ['id' => $slider->id]) }}" class="btn btn-default">Chỉnh sửa</a>
                                    <a href="{{ route('slider.delete', ['id' => $slider->id]) }}" class="btn btn-danger">Xóa bỏ</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection