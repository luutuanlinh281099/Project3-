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
                @include('frontend.home.components.recomment')
                @include('frontend.home.components.feature')
                @include('frontend.home.components.tab')
            </div>
        </div>
    </div>
</section>
@endsection