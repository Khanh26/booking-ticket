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
                <form action="{{ route('postLogin') }}" method="POST">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Tên đăng nhập hoặc Email:</label>
                        <input type="text" class="form-control input-login" name="username" value="{{old('username')}}" id="inputEmail">
                    </div>

                    <div class="mb-4">
                        <label for="inputPassword" class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control input-login" name="password" id="inputPassword" placeholder="Mật khẩu ít nhất 8 ký tự">
                    </div>

                    <div class="mb-4 block-remember">
                        <p class="block-join">Bạn chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
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

