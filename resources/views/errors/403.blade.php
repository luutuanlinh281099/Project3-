@section('css')
<link rel="stylesheet" href="{{ asset('admins/slider/index/index.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@9.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection

<body>
    <h2>Bạn không có quyền truy cập</h2>
    <div class="col-md-12">
        <a href="{{ route('admin.login') }}" > Đăng nhập</a>
    </div>
</body>