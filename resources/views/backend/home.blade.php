@extends('backend.layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('header')
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('backend.partials.content-header', ['name' => 'Trang chủ', 'key' => ''])
    <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">   
                <div class="row">
                    <div class="col-md-12">
                    Thống kê
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

