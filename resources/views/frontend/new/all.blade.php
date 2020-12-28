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
                @foreach($news as $new)
                <div class="row">
                    <div class="col-md-3 col-4">
                        <p style="font-size: 20px; text-align: center">{{ $new->id }}</p>
                    </div>
                    <div class="col-md-9 col-8">
                        <a href="{{ route('new.detail', ['id' => $new->id] ) }}" class="item-title" style="font-size: 20px;">{{ $new->name }}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection