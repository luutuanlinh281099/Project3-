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
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Sản phẩm </h2>
                    @foreach($products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" />
                                    <h2>{{ number_format($product->price) }} VNĐ</h2>
                                    <p>{{ $product->name }}</p>
                                    <a href="{{ route('product.detail', ['id' => $product->id] )}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{ number_format($product->price) }} VNĐ</h2>
                                        <p>{{ $product->name }}</p>
                                        <a href="{{ route('product.detail', ['id' => $product->id] )}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{ route('cart.add', ['id' => $product->id]) }}"><i class="fa fa-plus-square"></i>Thêm vào giỏ hàng</a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{$products->links()}}
                </div>
                <!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection