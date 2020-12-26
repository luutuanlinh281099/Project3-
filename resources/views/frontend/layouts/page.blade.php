<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="{{ asset('/eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('/eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('/eshopper/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/eshopper/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @yield('css')
</head>

<body>
    @include('frontend.partials.header')
    @yield('content')
    @include('frontend.partials.footer')

    <script src="{{ asset('/eshopper/js/jquery.js') }}"></script>
    <script src="{{ asset('/eshopper/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/eshopper/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('/eshopper/js/price-range.js') }}"></script>
    <script src="{{ asset('/eshopper/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('/eshopper/js/main.js') }}"></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    @yield('js')
</body>

</html>