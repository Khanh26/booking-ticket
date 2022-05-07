@extends('layouts.admin')

{{-- css --}}
@section('css-plugin')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
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
                        <h1 class="m-0">Lịch chiếu phim</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Tổng quan</a></li>
                            <li class="breadcrumb-item active">Lịch chiếu phim</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" id="formAdd">
                                <div class="col input-form">
                                    <label for="movie">Phim(*): </label>
                                    <select class="form-control" name="movie" id="movie">
                                        @foreach ($data['movie'] as $item)
                                            <option value="{{ $item->ID_MOVIE }}">{{ $item->NAME_MOVIE }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col input-form">
                                    <label for="date">Ngày chiếu(*): </label>
                                    <input class="form-control" type="date" name="date" id="date"
                                        min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}">
                                </div>

                                <div class="col input-form">
                                    <label for="room">Phòng(*): </label>
                                    <select class="form-control" name="room" id="room">
                                        @foreach ($data['room'] as $item)
                                            <option value="{{ $item->ID_ROOM }}">{{ $item->NAME_ROOM }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col input-form">
                                    <label for="time_start">Từ(*): </label>
                                    <input class="form-control" type="time" name="time_start" id="time_start">
                                    <span class="message" id="messageTime"></span>
                                </div>

                                <div class="col input-form">
                                    <label for="time_end">Đến(*): </label>
                                    <input class="form-control" type="time" name="time_end" id="time_end" disabled>
                                </div>
                                <div class="col input-form">
                                    <label for="time_end">Giá(*): </label>
                                    <input class="form-control" type="text" name="price" id="price">
                                    <span class="message" id="messagePrice"></span>
                                </div>


                                <div class="col input-form btnAction">
                                    <button class="btn btn-success" id="btnAddShow">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="row block-chooses">
                                <div class="col col-sm-6 col-md-6">
                                    <button class="btn btn-default mr-3" id="btnReload" title="Tải lại"><i
                                            class="fas fa-redo"></i></button>
                                    <div class="d-inline-block">
                                        <button class="btn btn-default" id="btnPrevDay"><i
                                                class="fas fa-caret-left"></i></button>
                                        <div class="block-day d-inline-block btn">
                                            <span class="span-prevDay"></span>
                                            <span> - </span>
                                            <span class="span-nextDay"></span>
                                        </div>
                                        <button class="btn btn-default" id="btnNextDay"><i
                                                class="fas fa-caret-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <table id="tableShowTime" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Ngày</th>
                                        <th>Giờ</th>
                                        <th>Tên phim</th>
                                        <th>Phòng</th>
                                        <th>Giá</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="data-showTime">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    {{-- modal edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col input-form">
                        <label for="movie">Phim(*): </label>
                        <select class="form-control" name="movie" id="movie">
                            @foreach ($data['movie'] as $item)
                                <option value="{{ $item->ID_MOVIE }}">{{ $item->NAME_MOVIE }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col input-form">
                        <label for="date">Ngày chiếu(*): </label>
                        <input class="form-control" type="date" name="date" id="date" min="{{ date('Y-m-d') }}"
                            value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="col input-form">
                        <label for="room">Phòng(*): </label>
                        <select class="form-control" name="room" id="room">
                            @foreach ($data['room'] as $item)
                                <option value="{{ $item->ID_ROOM }}">{{ $item->NAME_ROOM }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col input-form">
                        <label for="time_start">Từ(*): </label>
                        <input class="form-control" type="time" name="time_start" id="time_start">
                        <span class="message" id="messageTime"></span>
                    </div>

                    <div class="col input-form">
                        <label for="time_end">Đến(*): </label>
                        <input class="form-control" type="time" name="time_end" id="time_end" disabled>
                    </div>
                    <div class="col input-form">
                        <label for="time_end">Giá(*): </label>
                        <input class="form-control" type="text" name="price" id="price">
                        <span class="message" id="messagePrice"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btnSubmitEdit">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- js --}}
@section('js-plugin')
    <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/js/admin/configAdmin.js"></script>
    <script src="/js/admin/pageShowTime.js"></script>
@endsection
