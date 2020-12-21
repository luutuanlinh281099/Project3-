<div class="category-tab">
    <h2 class="title text-center">Tab danh mục</h2>
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categoryTab as $key => $Item)
            <li class="{{ $key == 0 ? 'active' : '' }}">
                <a href="#category_tab_{{ $Item->id }}" data-toggle="tab">
                    {{ $Item->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($categoryTab as $key => $Item)
        <div class="tab-pane fade {{ $key == 0 ? 'active in' : '' }}" id="category_tab_{{ $Item->id }}">
            @foreach($Item->productCategory as $product)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ config('app.base_url') . $product->feature_image_path }}" alt="" />
                            <h2>{{ number_format($product->price) }} VND</h2>
                            <p>{{ $product->name }}</p>
                            <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>