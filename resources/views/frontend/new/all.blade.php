@extends('frontend.layouts.page')

@section('title')
<title>Home page</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
<!--/slider-->
@include('frontend.home.components.slider')
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            @include('frontend.partials.sidebar')
            <div class="col-sm-9 padding-right">
                <h2 class="title text-center">Tin tức mới nhất</h2>
                <div class="col-md-12" style="margin-top:30px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Lượt xem</th>
                                <th scope="col">Quản lí</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $new)
                            <tr>
                                <td>{{ $new->id }}</td>
                                <td>{{ $new->name }}</td>
                                <td>{{ $new->view}}</td>
                                <td>
                                    <a href="{{ route('new.detail', ['id' => $new->id]) }}" class="btn btn-success">Chi tiết</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection