@extends('backend.layouts.admin')

@section('title')
<title>Trang chủ</title>
@endsection

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
@endsection

@section('header')
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('backend.partials.content-header', ['name' => 'Thống kê', 'key' => 'Trang chủ'])
    <div class="content">
        <div class="container-fluid">
            <h3>Thống kê</h3>
            <div class="col-md-12">
                <form action="{{ route('admin.search') }}" method="post" class="form-inline" role="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="sr-only" for="">Từ ngày</label>
                        <input type="date" class="form-control" name="datefrom" placeholder="Input field">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="">Đến ngày</label>
                        <input type="date" class="form-control" name="dateto" placeholder="Input field">
                    </div>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>
                <br>
            </div>
            <div class="row">
                <div class="col-lg-3 col-8">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$customer}}</h3>
                            <p style="font-size:20px">Tổng số khách hàng mới</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-8">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$product}} </h3>
                            <p style="font-size:20px">Tổng số sản phẩm mới</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-8">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$order}}</h3>
                            <p style="font-size:20px">Tổng số đơn hàng mới</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="col-lg-3 col-8">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$momney}}</h3>
                            <p style="font-size:20px">Tổng doanh thu</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card col-md-12">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Thống kê theo biểu đồ
                    </h3>
                </div><!-- /.card-header -->
                <div class="col-md-12">
                    <div class="container">
                        <canvas id="myChart"></canvas>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>
    let myChart = document.getElementById('myChart').getContext('2d');
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
        type: 'bar',
        data: {
            labels: ['8-2020', '9-2020', '10-2020', '11-2020', '12-2020', '1-2020', ],
            datasets: [{
                label: 'số lượng đơn hàng',
                data: [
                    0,
                    0,
                    0,
                    0,
                    26,
                    0,
                ],
                //backgroundColor:'green',
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 99, 132, 0.6)'
                ],
                borderWidth: 1,
                borderColor: '#777',
                hoverBorderWidth: 3,
                hoverBorderColor: '#000'
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Biểu đồ đơn hàng theo tháng',
                fontSize: 25
            },
            legend: {
                display: true,
                position: 'right',
                labels: {
                    fontColor: '#000'
                }
            },
            layout: {
                padding: {
                    left: 50,
                    right: 0,
                    bottom: 0,
                    top: 0
                }
            },
            tooltips: {
                enabled: true
            }
        }
    });
</script>
@endsection