@extends('layouts.admin')

{{-- css --}}
@section('css-plugin')
    <link rel="stylesheet" href="/css/admin.css">
@endsection

{{-- title --}}
@section('title')
    Quản trị - RAP1HK
@endsection

{{-- content --}}
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tổng quan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="#">Trang chủ</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $data['movieShowing'] }}</h3>
                        <p>Phim đang chiếu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $data['movieComingSoon'] }}</h3>
                        <p>Phim sắp chiếu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <canvas id="charTicket" width="400" height="100"></canvas>
        </div>

        <div class="container">
            <canvas id="charTotal" width="400" height="100"></canvas>
        </div>
    </div>
@endsection

{{-- js --}}
@section('js-plugin')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/admin/home.js"></script>
@endsection
