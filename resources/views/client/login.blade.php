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
                <h3 class="heading-join">ĐĂNG NHẬP</h3>
            </div>
            <div class="body-join">
                <form action="">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Tên đăng nhập hoặc Email:</label>
                        <input type="text" class="form-control input-login" id="inputEmail">
                    </div>

                    <div class="mb-4">
                        <label for="inputPassword" class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control input-login" id="inputPassword" placeholder="Mật khẩu ít nhất 8 ký tự">
                    </div>

                    <div class="mb-4 block-remember">
                        <p class="block-join">Bạn chưa có tài khoản? <a href=""">Đăng ký ngay</a></p>
                    </div>
                    <button type="submit" class="btn btn-primary btnSubmitLogin">Đăng nhập</button>
                </form>
            </div>

            {{--  khuyen mai - quang cao--}}
        </div> 
        @include('client.block.sidebarJoin')
    </div>
</div>

@endsection

{{-- js --}}
@section('js-plugin')

@endsection

