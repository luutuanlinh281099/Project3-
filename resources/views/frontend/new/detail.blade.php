@extends('frontend.layouts.page')

@section('title')
<title>Home page</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('productdetail/detail.css') }}">
@endsection

@section('js')
<link rel="stylesheet" href="{{ asset('home/home.js') }}">
@endsection

@section('content')
<section id="advertisement">
    <div class="container">
        <img src="/eshopper/images/shop/advertisement.jpg" alt="" />
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            @include('frontend.partials.sidebar')
            <div class="col-sm-9 padding-right">
                <h2 class="title text-center">Chi tiết tin tức</h2>
                @foreach($newDetails as $Item)
                <div class="row">
                    <div class="col-md-3 col-4">
                        <p style="font-size: 20px; text-align: center">{{ $Item->id }}</p>
                    </div>
                    <div class="col-md-9 col-8">
                        <h2 style="font-size: 20px"> {{$Item->name}} </h2>
                    </div>
                </div>
                <div class="row">
                    <p> {{$Item->content}} </p>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection