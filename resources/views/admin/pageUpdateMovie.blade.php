@extends('layouts.admin')

{{-- css --}}
@section('css-plugin')
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="/css/admin.css">
@endsection

{{-- title --}}
@section('title')
    Quản trị - RAP1HK
@endsection

{{-- content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cập nhật phim</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Tổng quan</a></li>
                            <li class="breadcrumb-item active">Cập nhật phim</li>
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
                            <div class="row block-chooses">
                                <div class="col-sm-6 col-md-4 block-search">
                                    <button class="btn btn-success mr-3"><i class="fas fa-plus"></i> Thêm mới</button>
                                    <button class="btn btn-danger mr-3" disabled><i class="fas fa-trash-alt"></i>
                                        Xoá</button>
                                    <div class="filter-movie d-inline-block">
                                        <button class="btn btn-light btnFilter"><i class="fas fa-filter"></i> Bộ lọc</button>
                                        <div class="filter">
                                            <form action="" class="filter-form">
                                                <div class="form-group">
                                                    <label for="">Thể loại:</label>
                                                    <div class="row m-0">
                                                        <div class="col col-3">
                                                            <input type="checkbox" class="checkbox-filter" name="genre">
                                                            <span>Hành động</span>
                                                        </div>
                                                        <div class="col col-3">
                                                            <input type="checkbox" class="checkbox-filter" name="genre">
                                                            <span>Hành động</span>
                                                        </div>
                                                        <div class="col col-3">
                                                            <input type="checkbox" class="checkbox-filter" name="genre">
                                                            <span>Hành động</span>
                                                        </div>
                                                        <div class="col col-3">
                                                            <input type="checkbox" class="checkbox-filter" name="genre">
                                                            <span>Hành động</span>
                                                        </div>
                                                        <div class="col col-3">
                                                            <input type="checkbox" class="checkbox-filter" name="genre">
                                                            <span>Hành động</span>
                                                        </div>
                                                        <div class="col col-3">
                                                            <input type="checkbox" class="checkbox-filter" name="genre">
                                                            <span>Hành động</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="">Đối tượng:</label>
                                                    <div class="row m-0">
                                                        <div class="col col-3">
                                                            <input type="checkbox" class="checkbox-filter" name="status">
                                                            <span>Dưới 13 Tuổi</span>
                                                        </div>
                                                        <div class="col col-3">
                                                            <input type="checkbox" class="checkbox-filter" name="status">
                                                            <span>Trên 18 Tuổi</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Trạng thái:</label>
                                                    <div class="row m-0">
                                                        <div class="col col-3">
                                                            <input type="checkbox" class="checkbox-filter" name="status">
                                                            <span>Đang hiện</span>
                                                        </div>
                                                        <div class="col col-3">
                                                            <input type="checkbox" class="checkbox-filter" name="status">
                                                            <span>Đã ẩn</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="reset" class="btn btn-danger btnResultFilter">Khôi phục</button>
                                                    <button class="btn btn-primary btnResultFilter">Lọc</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-3 block-search">
                                    <div class="input-group">
                                        <input type="search" class="form-control" id="inputSearch" placeholder="Tìm kiếm">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" id="btnSearch">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="" id=""></th>
                                        <th>Poster</th>
                                        <th>Tên phim</th>
                                        <th>Ngày công chiếu</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="data-movie">
                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>Poster</td>
                                        <td>Tên phim</td>
                                        <td>Ngày công chiếu</td>
                                        <td>Trạng thái</td>
                                        <td>
                                            <button class="btn btn-primary mr-2"><i class="far fa-eye"></i></button>
                                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>Poster</td>
                                        <td>Tên phim</td>
                                        <td>Ngày công chiếu</td>
                                        <td>Trạng thái</td>
                                        <td>
                                            <button class="btn btn-primary mr-2"><i class="far fa-eye"></i></button>
                                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>Poster</td>
                                        <td>Tên phim</td>
                                        <td>Ngày công chiếu</td>
                                        <td>Trạng thái</td>
                                        <td>
                                            <button class="btn btn-primary mr-2"><i class="far fa-eye"></i></button>
                                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>Poster</td>
                                        <td>Tên phim</td>
                                        <td>Ngày công chiếu</td>
                                        <td>Trạng thái</td>
                                        <td>
                                            <button class="btn btn-primary mr-2"><i class="far fa-eye"></i></button>
                                            <button class="btn btn-success"><i class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    
@endsection

{{-- js --}}
@section('js-plugin')
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
    <script src="/js/admin/effect.js"></script>
@endsection
