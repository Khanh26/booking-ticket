@extends('layouts.client')


{{-- css --}}
@section('css-plugin')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
@endsection

{{-- title --}}
@section('title')
    Trang chủ
@endsection

{{-- content --}}
@section('content')
    @if (Session::has('login_name') && Session::has('login_id'))
        <input type="hidden" name="idMember" id="idMemberCheckOut" value="{{ Session::get('login_id') }}">
    @else
        <script>
            alert('Hãy đăng nhập trước đi mua vé');
            window.location = "http://127.0.0.1:8000/dang-nhap";
        </script>
    @endif
    <div class="container-fluid mb-4 p-0">
        <div class="container row details-movie mt-4 checkout-page">
            <div class="col-5 position-relative">
                <img src="{{ asset('img/poster/' . $data['movie']['POSTER_MOVIE']) }}" class="img-poster" alt="">

                <div class="note-char">
                    <div class="item-note-char mb-3">
                        <span class="content-note">Ghế trống: </span><button class="btn btn-char btnC">A1</button>
                    </div>
                    <div class="item-note-char mb-3">
                        <span class="content-note">Ghế đang chọn: </span><button class="btn btn-char btnC act">A1</button>
                    </div>
                    <div class="item-note-char mb-3">
                        <span class="content-note">Ghế đã đặt: </span><button class="btn btn-char" disabled>A1</button>
                    </div>
                    <div class="item-note-char total-price">
                        Tổng tiền: <span class="price-ticket">0</span> VND
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="header-detail text-uppercase">
                    Đặt vé: {{ $data['movie']['NAME_MOVIE'] }}
                </div>
                <div class="row mt-3">
                    <div class="col-2"><span>Chọn ngày:</span></div>
                    <div class="col-10 day_show">

                        <input type="hidden" name="movie" id="id_movie" value="{{ $data['movie']['ID_MOVIE'] }}">
                        @foreach ($data['day_show'] as $item)
                            <button class="btn btn-light btnC btnDay"
                                value="{{ $item['DAY_SHOWTIME'] }}">{{ date_format(date_create($item['DAY_SHOWTIME']), 'd/m') }}</button>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-2"><span>Chọn Giờ:</span></div>
                    <div class="col-10 show_time">

                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-2"><span>Chọn ghế:</span></div>
                    <div class="col-10 chair_movie">
                        <div class="screen mb-3">
                            <i class="fas fa-tv icon-screen"></i>
                        </div>
                        <div class="chairs">
                            @for ($i = 65; $i <= 76; $i++)
                                @for ($j = 1; $j <= 10; $j++)
                                    <button class='btn btn-char btnC mb-2'
                                        value="{{ chr($i) }}{{ $j }}">{{ chr($i) }}{{ $j }}</button>
                                @endfor
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-checkout mt-4">
            <div id="paypal-button"></div>
        </div>
    </div>
@endsection

{{-- js --}}
@section('js-plugin')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="/js/client/checkout.js"></script>
@endsection
