<form class="form-inline" action="{{ route('product.search') }}" method="post">
    <div class="form-group mx-sm-2 mb-2">
        {{csrf_field()}}
        <label class="sr-only"> Nhập tên sản phẩm </label>
        <input type="text" value="" class="form-control" placeholder="Nhập tên sản phẩm" name="key">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
</form>                 