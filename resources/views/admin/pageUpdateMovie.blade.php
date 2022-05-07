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
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Tổng quan</a></li>
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
                                <div class="col-sm-6 col-md-6">
                                    <button class="btn btn-success mr-3" data-toggle="modal" data-target="#addModal"><i
                                            class="fas fa-plus"></i> Thêm mới</button>
                                    <button class="btn btn-danger mr-3 remove-all-btn" id="btnRemove" disabled
                                        data-toggle="modal" data-target="#confirmModal"><i class="fas fa-trash-alt"></i>
                                        Xoá</button>
                                    <button class="btn btn-default mr-3" id="btnReload" title="Tải lại"><i
                                            class="fas fa-redo"></i></button>
                                    <div class="filter-movie d-inline-block">
                                        <button class="btn btn-default btnFilter"><i class="fas fa-filter"></i> Bộ
                                            lọc</button>
                                        <div class="filter">
                                            <form action="" class="filter-form">
                                                <div class="row">
                                                    <div class="col col-6 block-filter-genre">
                                                        <div class="form-group">
                                                            <label for="">Thể loại:</label>
                                                            <div class="row m-0 genre-checkbox">
                                                                @foreach ($data['genres'] as $genre)
                                                                    <div class="col col-4 mt-2">
                                                                        <input type="checkbox" class="checkbox-filter"
                                                                            value="{{ $genre->ID_GENRE }}"
                                                                            name="genre_filter"
                                                                            id="genre_{{ $genre->ID_GENRE }}">
                                                                        <label class="lb-checkbox"
                                                                            for="genre_{{ $genre->ID_GENRE }}">{{ ucfirst($genre->NAME_GENRE) }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col col-6">
                                                        <div class="form-group">
                                                            <label for="">Đối tượng:</label>
                                                            <div class="row m-0">
                                                                @foreach ($data['suitable'] as $suitable)
                                                                    <div class="col col-4 mt-2">
                                                                        <input type="checkbox" class="checkbox-filter"
                                                                            value="{{ $suitable->ID_SUITABLE }}"
                                                                            name="suitable_filter"
                                                                            id="suitable_{{ $suitable->ID_SUITABLE }}">
                                                                        <label class="lb-checkbox"
                                                                            for="suitable_{{ $suitable->ID_SUITABLE }}">{{ $suitable->NOTE_SUITABLE }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="">Ngôn ngữ:</label>
                                                            <div class="row m-0">
                                                                @foreach ($data['language'] as $language)
                                                                    <div class="col col-6 mt-2">
                                                                        <input type="checkbox" class="checkbox-filter"
                                                                            value="{{ $language->ID_LANGUAGE }}"
                                                                            name="language_filter"
                                                                            id="language_{{ $language->ID_LANGUAGE }}">
                                                                        <label class="text-capitalize lb-checkbox"
                                                                            for="language_{{ $language->ID_LANGUAGE }}">{{ $language->NAME_LANGUAGE }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Trạng thái:</label>
                                                            <div class="row m-0">
                                                                <div class="col col-6 mt-2">
                                                                    <input type="checkbox" class="checkbox-filter" value='1'
                                                                        id="status_filter_1" name="status_filter">
                                                                    <label class="lb-checkbox" for="status_filter_1">Đang
                                                                        hiện</label>
                                                                </div>
                                                                <div class="col col-4 mt-2">
                                                                    <input type="checkbox" class="checkbox-filter "
                                                                        value='0' id="status_filter_2" name="status_filter">
                                                                    <label class="lb-checkbox" for="status_filter_2">Đã
                                                                        ẩn</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button type="reset" class="btn btn-danger btnResultFilter">Khôi
                                                        phục</button>
                                                    <button class="btn btn-primary btnResultFilter">Lọc</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
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
                        <div class="card-body card-movie">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="checkAll"></th>
                                        <th>Poster</th>
                                        <th>Tên phim</th>
                                        <th>Ngày công chiếu</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="data-movie">
                                    {{-- data --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>


    {{-- modal add --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="formAddMovie">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mMovie">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 position-relative text-center d-input">
                                    <img src="{{ asset('img/default.png') }}" width="100%" height="245px"
                                        id="prPosterAdd" class="d-block mb-2">
                                    <label for="formFileAdd" class="form-label label-poster">Tải ảnh lên</label>
                                    <input class="form-control formFilePoster" type="file" id="formFileAdd"
                                        onchange="readURL(this,'#prPosterAdd')" name="posterAdd" accept="image/*">
                                    <span class="message"></span>
                                </div>

                                <div class="mb-3 position-relative d-input">
                                    <label for="inputLanguage labelModal" class="form-label">Ngôn Ngữ:</label>
                                    <select class="form-control text-capitalize language" name="Language">
                                        @foreach ($data['language'] as $language)
                                            <option value="{{ $language->ID_LANGUAGE }}">
                                                {{ $language->NAME_LANGUAGE }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="message"></span>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputTrailer labelModal" class="form-label d-block">Trailer: <a
                                            href="https://www.youtube.com/c/CGVVietnam/playlists" target="_blank"
                                            class="d-inline">(lấy link)</a></label>
                                    <input type="text" class="form-control trailer d-inline w-70" id="inputTrailer"
                                        name="trailer">
                                    <span class="message"></span>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputContent labelModal" class="form-label">Nội dung:</label>
                                    <textarea rows="5" class="form-control content" name="content"></textarea>
                                    <span class="message"></span>
                                </div>
                            </div>
                            <div class="col-6">

                                <div class="mb-3 position-relative d-input">
                                    <label for="inputNameMoive labelModal" class="form-label">Tên phim:</label>
                                    <input type="text" class="form-control nameMovie" name="nameMovie">
                                    <span class="message"></span>
                                </div>

                                <div class="mb-3 position-relative d-input ">
                                    <div class="label-genre labelModal mb-2">
                                        Thể loại:
                                    </div>
                                    <div class="row check-genre ">
                                        @foreach ($data['genres'] as $genre)
                                            <div class="col col-4 mt-2">
                                                <input type="checkbox" class="checkbox-filter genre"
                                                    value="{{ $genre->ID_GENRE }}" name="genre"
                                                    id="genre_add{{ $genre->ID_GENRE }}">
                                                <label class="lb-checkbox"
                                                    for="genre_add{{ $genre->ID_GENRE }}">{{ ucfirst($genre->NAME_GENRE) }}</label>
                                            </div>
                                        @endforeach
                                        <span class="message"></span>
                                    </div>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputTime labelModal" class="form-label">Thời lượng(phút):</label>
                                    <input type="number" class="form-control time" name="time" min="1">
                                    <span class="message"></span>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputAge labelModal">Đối tượng: </label>
                                    <select class="form-control suitable" name="suitable">
                                        @foreach ($data['suitable'] as $suitable)
                                            <option value="{{ $suitable->ID_SUITABLE }}">
                                                {{ $suitable->NOTE_SUITABLE }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="message"></span>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputActor labelModal" class="form-label">Diễn viên:</label>
                                    <input type="text" class="form-control actor" name="actor">
                                    <span class="message"></span>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputDirector labelModal" class="form-label">Đạo diễn:</label>
                                    <input type="text" class="form-control director" name="director">
                                    <span class="message"></span>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputDateShow labelModal" class="form-label">Ngày công chiếu:</label>
                                    <input type="date" class="form-control dateShow" name="dateShow">
                                    <span class="message"></span>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="btnAddMovie">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
            <form id="formEditModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mMovie editModalBody">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3 position-relative text-center d-input">
                                    <img src="/img/default.png" width="100%" height="245px" id="prPosterEdit"
                                        class="d-block mb-2">
                                    <label for="formFileEdit" class="form-label label-poster">Tải ảnh lên</label>
                                    <input class="form-control formFilePoster" type="file" id="formFileEdit"
                                        onchange="readURL(this,'#prPosterEdit')" name="posterEdit" accept="image/*">
                                    {{-- <span class="message"></span> --}}
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputAge language">Ngôn Ngữ: </label>
                                    <select class="form-control text-capitalize language" name="language">
                                        @foreach ($data['language'] as $language)
                                            <option value="{{ $language->ID_LANGUAGE }}">
                                                {{ $language->NAME_LANGUAGE }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="message"></span>
                                </div>

                                <div class="mb-3 position-relative d-input">
                                    <label for="inputTrailer labelModal" class="form-label d-block">Trailer: <a
                                            href="https://www.youtube.com/c/CGVVietnam/playlists" target="_blank"
                                            class="d-inline">(lấy link)</a></label>
                                    <input type="text" class="form-control trailer d-inline w-70" name="trailer">
                                    <span class="message"></span>

                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputSynopsis labelModal" class="form-label">Nội dung:</label>
                                    <textarea rows="5" class="form-control content" name="synopsis"></textarea>
                                    <span class="message"></span>
                                </div>

                                <div class="mb-3 position-relative d-input">
                                    <label for="inputAge labelModal">Trạng thái: </label>
                                    <select class="form-control text-capitalize status" name="status">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                    <span class="message"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputNameMoive labelModal" class="form-label">Tên phim:</label>
                                    <input type="text" class="form-control nameMovie" name="nameMovie">
                                    <span class="message"></span>
                                </div>

                                <div class="mb-3 position-relative d-input ">
                                    <div class="label-genre labelModal mb-2">
                                        Thể loại:
                                    </div>
                                    <div class="row check-genre">
                                        @foreach ($data['genres'] as $genre)
                                            <div class="col col-4 mt-2">
                                                <input type="checkbox" class="checkbox-filter genre"
                                                    value="{{ $genre->ID_GENRE }}" name="genre"
                                                    id="genre_edit{{ $genre->ID_GENRE }}">
                                                <label class="lb-checkbox"
                                                    for="genre_edit{{ $genre->ID_GENRE }}">{{ ucfirst($genre->NAME_GENRE) }}</label>
                                            </div>
                                        @endforeach
                                        <span class="message"></span>
                                    </div>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputTime labelModal" class="form-label">Thời lượng(phút):</label>
                                    <input type="number" class="form-control time" name="time" min="1">
                                    <span class="message"></span>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputAge labelModal">Đối tượng: </label>
                                    <select class="form-control suitable" name="suitable">
                                        @foreach ($data['suitable'] as $suitable)
                                            <option value="{{ $suitable->ID_SUITABLE }}">
                                                {{ $suitable->NOTE_SUITABLE }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="message"></span>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputActor labelModal" class="form-label">Diễn viên:</label>
                                    <input type="text" class="form-control actor" name="actor">
                                    <span class="message"></span>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputDirector labelModal" class="form-label">Đạo diễn:</label>
                                    <input type="text" class="form-control director" name="director">
                                    <span class="message"></span>
                                </div>
                                <div class="mb-3 position-relative d-input">
                                    <label for="inputDateShow labelModal" class="form-label">Ngày công chiếu:</label>
                                    <input type="date" class="form-control dateShow" name="dateShow">
                                    <span class="message"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" id="btnSubmitEdit">Lưu thay đổi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- modal view --}}
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chi tiết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mMovie viewModalBody">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confimModalable" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confimModalable">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body confirmModalBody">
                    Bạn có chắc xoá các phim đã chọn(<span class="numberCheckbox"></span>) ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger" id="btnSubmitRemove">Xác nhận</button>
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
    <script src="/js/admin/pageUpdateMovie.js"></script>
@endsection
