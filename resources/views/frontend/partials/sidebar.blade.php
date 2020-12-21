<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Danh mục</h2>
		<div class="panel-group category-products" id="accordian">
			<!--category-productsr-->
			@foreach ($categories as $Item)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						@if ($Item->categoryChildren->count())
						<a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$Item->id}}">
							<span class="badge pull-right">
								<i class="fa fa-plus"></i>
							</span>
							{{$Item->name}}
						</a>
						@else
						<a href="#">
							<span class="badge pull-right">
							</span>
							{{$Item->name}}
						</a>
						@endif
					</h4>
				</div>
				<div id="sportswear_{{$Item->id}}" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							@foreach ($Item->categoryChildren as $Item)
							<li><a href="{{ route('category.product' ,['slug'=> $Item->slug, 'id' => $Item->id]) }}">{{$Item->name}} </a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<!--/category-products-->

		<div class="brands_products">
			<!--brands_products-->
			<h2>Thương hiệu</h2>
			@foreach($brands as $brand)
			<div class="brands-name">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="{{ route('brand.product' ,['slug'=> $brand->slug, 'id' => $brand->id]) }}"> <span class="pull-right"></span>{{$brand->name}}</a></li>
				</ul>
			</div>
			@endforeach
		</div>
		<!--/brands_products-->
	</div>
</div>