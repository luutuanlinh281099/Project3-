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
                <h2 class="title text-center">Chi tiết sản phẩm</h2>
                @foreach($productDetail as $product)
                <div class="product-details">
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" />
                            <h3>Ảnh sản phẩm</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            <h3>Ảnh chi tiết</h3>
                            <div class="carousel-inner">
                                @foreach($product->images as $key => $image)
                                <div class="item {{$key == 0 ? 'active' : ''}} row">
                                    <img class="product_image_150_100" src="{{ $image->image_path }}" alt="">
                                    <img class="product_image_150_100" src="{{ $image->image_path }}" alt="">
                                </div>
                                @endforeach
                            </div>
                            <div>
                                <!-- Controls -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information">
                            <!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>Tên sản phẩm: {{ $product->name }}</h2>
                            <p>Mã sản phẩm: {{ $product->id }}</p>
                            <img src="images/product-details/rating.png" alt="" />
                            <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="get">
                                {{csrf_field()}}
                                <span>
                                    <span>Giá bán: {{ number_format($product->price) }} VNĐ</span> <br>
                                    <label >Số lượng : </label>
                                    <input name="qty" type="number" min="1" value="1" />
                                    <input name="hidden" type="hidden" min="1" value="{{ $product->id }}" />
                                    <button type="" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm vào giỏ hàng
                                    </button>
                                </span>
                            </form>
                            <p><b>Danh mục:</b> {{ $product->category->name }}</p>
                            <p><b>Thương hiệu</b> {{ $product->brand->name }}</p>
                            @foreach($product->tags as $tag)
                            <p><b>Tags</b> {{ $tag->name }}</p>
                            @endforeach
                            <p name="view" value="{{ $product->view}}"><b>Lượt xem</b> {{$product->view}}</p>
                        </div>
                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->
                @include('frontend.product.related')
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection