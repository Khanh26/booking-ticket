@extends('layouts.client')

{{-- css --}}
@section('css-plugin')
    <link rel="stylesheet" href="{{ asset("/css/content.css")}}">
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
                    <label for="">Tên tài khoản hoặc Email:</label>
                    <input type="text" name="" id="">
                    <label for="">Mật khẩu:</label>
                    <input type="text" name="" id="">
                    <button type="submit">Đăng nhập</button>
                </form>
            </div>
        </div>
        @include('client.block.sidebar')
    </div>
</div>

@endsection

{{-- js --}}
@section('js-plugin')

@endsection

