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
                <H1>Cảm ơn bạn đã tin tưởng chúng tôi</H1> <br>
                <H2>Vui lòng kiểm tra lại đơn hàng trong mail của bạn</H2>
            </div>
        </div>
    </div>
</section>
@endsection