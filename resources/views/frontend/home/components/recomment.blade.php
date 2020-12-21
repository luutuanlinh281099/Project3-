<div class="features_items">
    <h2 class="title text-center">Sản phẩm mới</h2>
    @foreach($productRecomments as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" />
                    <h2>{{ number_format($product->price) }} VNĐ</h2>
                    <p>{{ $product->name }}</p>
                    <a href="{{ route('product.detail', ['id' => $product->id] )}}" class="btn btn-default add-to-cart">
                        <i class="fa fa-shopping-cart">
                        </i>
                        Xem chi tiết
                    </a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>{{ number_format($product->price) }} VNĐ</h2>
                        <p>{{ $product->name }}</p>
                        <a href="{{ route('product.detail', ['id' => $product->id] )}}" class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart">
                            </i>
                            Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{ route('cart.add', ['id' => $product->id]) }}"><i class="fa fa-plus-square"></i>Thêm vào giở hàng</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>