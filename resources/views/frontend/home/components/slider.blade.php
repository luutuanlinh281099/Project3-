<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        @foreach($sliders as $key => $Item)
                        <div class="item {{$key == 0 ? 'active' : ''}}">
                            <div class="col-sm-6">
                                <h1><span>SHOP</span>-Lưu Tuấn Linh</h1>
                                <h2>{{ $Item->name }}</h2>
                                <p>{{ $Item->description }}</p>
                                <button type="button" class="btn btn-default get">Xem thêm</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{config('app.base_url').$Item->image_path}}" class="girl img-responsive" alt="" />
                                <img src="/eshopper/images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

</section>