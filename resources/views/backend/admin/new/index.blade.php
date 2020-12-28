@extends('backend.layouts.admin')

@section('title')
<title>Trang Chủ</title>
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

@section('content')
<div class="content-wrapper">
    @include('backend.partials.content-header', ['name' => 'Tin tức', 'key' => 'Danh sách'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('new.create') }}" class="btn btn-success float-right m-2">Thêm mới</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên tức</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Lượt xem</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $new)
                            <tr>
                                <th scope="row">{{ $new->id }}</th>
                                <td>{{ $new->name }}</td>
                                <td>{{ $new->content }}</td>
                                <td>{{ $new->view }}</td>
                                <td>
                                    <a href="{{ route('new.edit', ['id' => $new->id]) }}" class="btn btn-default">Chỉnh sửa</a>
                                    <a href="{{ route('new.delete', ['id' => $new->id]) }}" class="btn btn-danger">Xóa bỏ</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection