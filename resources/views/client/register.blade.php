@extends('layouts.client')

{{-- css --}}
@section('css-plugin')
    <link rel="stylesheet" href="{{ asset("/css/content.css")}}">
    <link rel="stylesheet" href="{{ asset("/css/join.css")}}">
@endsection

{{-- title --}}
@section('title')
    Đăng nhập
@endsection

{{-- content --}}
@section('content')
{{-- News --}}
<div class="container pageLogin mt-4">
    <div class="row">
        <div class="col-9">
            <div class="header-join">
                <h3 class="heading-join">đăng ký</h3>
            </div>
            <div class="body-join">
                <form action="">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control input-login" id="inputEmail" placeholder="Nhập họ và tên">
                    </div>

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Tên đăng nhập:</label>
                        <input type="text" class="form-control input-login" id="inputEmail" placeholder="Nhập tên đăng nhập">
                    </div>

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email:</label>
                        <input type="text" class="form-control input-login" id="inputEmail" placeholder="Nhập email">
                    </div>

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control input-login" id="inputEmail" placeholder="Nhập số điện thoại">
                    </div>

                    <div class="mb-4">
                        <label for="inputPassword" class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control input-login" id="inputPassword" placeholder="Mật khẩu ít nhất 8 ký tự">
                    </div>

                    <div class="mb-4">
                        <label for="inputPassword" class="form-label">Nhập lại mật khẩu:</label>
                        <input type="password" class="form-control input-login" id="inputPassword" placeholder="">
                    </div>

                    <div class="mb-4 block-remember">
                        <p class="block-join">Bạn đã có tài khoản? <a href="{{ route('login')}}">Đăng nhập ngay</a></p>
                    </div>
                    <button type="submit" class="btn btn-primary btnSubmitLogin">Đăng ký</button>
                </form>
            </div>
        </div> 
        @include('client.block.sidebarJoin')
    </div>
</div>

@endsection

{{-- js --}}
@section('js-plugin')

@endsection

