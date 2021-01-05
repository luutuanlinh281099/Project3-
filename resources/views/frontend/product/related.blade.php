<div class="category-tab">
    <h2 class="title text-center">Sản phẩm liên quan</h2>
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="">
                <a href="" data-toggle="tab" id="">
                    {{ $product->category->name }}
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="">
        @foreach($categoryProduct->productCategory as $product)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" style="height:250px" />
                        <h2>{{ number_format($product->price) }} VND</h2>
                        <p>{{ $product->name }}</p>
                        <a href="{{ route('product.detail', ['id' => $product->id] )}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>