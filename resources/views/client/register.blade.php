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
                <form action="{{ route('postRegister') }}" method="POST">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}} <a href="{{ route('login') }}"> đăng nhập ngay</a></div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control input-login" name="name" id="inputName" value="{{old('name')}}" placeholder="Nhập họ và tên">
                        <span class="text-danger">@error('name') {{$message}}
                            
                        @enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">Tên đăng nhập:</label>
                        <input type="text" class="form-control input-login" name="username" id="inputUsername" value="{{old('username')}}" placeholder="Nhập tên đăng nhập">
                        <span class="text-danger">@error('username') {{$message}}
                            
                            @enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email:</label>
                        <input type="text" class="form-control input-login" name="email" id="inputEmail" value="{{old('email')}}" placeholder="Nhập email">
                        <span class="text-danger">@error('email') {{$message}}
                            
                            @enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control input-login" name="phone" id="inputPhone" value="{{old('phone')}}" placeholder="Nhập số điện thoại">
                        <span class="text-danger">@error('phone') {{$message}}
                            
                            @enderror</span>
                    </div>

                    <div class="mb-4">
                        <label for="inputPassword" class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control input-login" name="password" id="inputPassword" placeholder="Mật khẩu ít nhất 8 ký tự">
                        <span class="text-danger">@error('password') {{$message}}
                            
                            @enderror</span>
                    </div>

                    <div class="mb-4">
                        <label for="inputRePassword" class="form-label">Nhập lại mật khẩu:</label>
                        <input type="password" class="form-control input-login" name="prePassword" id="inputRePassword" placeholder="">
                        <span class="text-danger">@error('prePassword') {{$message}}
                            
                            @enderror</span>
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

