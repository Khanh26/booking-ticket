@extends('layouts.client')


{{-- css --}}
@section('css-plugin')
    <link rel="stylesheet" href="css/content.css">
@endsection

{{-- title --}}
@section('title')
    Phim
@endsection

{{-- content --}}
@section('content')
<div class="movie">
    <div class="container movie-main">
        <div class="header-movie">
            <button class="heading-content active showing">PHIM ĐANG CHIẾU</button>
            <button class="heading-content pending">PHIM SẮP CHIẾU</button>
        </div>
        <div class="list-movie row">
            <div class="col-4 item-movie position-relative">
                <img src="img/poster/chiakhoatramty.jpg" class="poster-movie" alt="">
                <div class="name-movie">
                    <p>Chìa khóa trăm tỷ</p>
                </div>
                <div class="btnAction">
                    <button class="btnView btnAction-item" >Xem chi tiết</button>
                    <button class="btnBooking btnAction-item">Đặt vé</button>
                </div>
                <div class="object">
                    <p class="p-object">12+</p>
                </div>
            </div>
            <div class="col-4 item-movie position-relative">
                <img src="img/poster/dautruongamnhac.jpg" class="poster-movie" alt="">
                <div class="name-movie">
                    <p>Đấu trường âm nhạc</p>
                </div>
                <div class="btnAction">
                    <button class="btnView btnAction-item" >Xem chi tiết</button>
                    <button class="btnBooking btnAction-item">Đặt vé</button>
                </div>
                <div class="object">
                    <p class="p-object">12+</p>
                </div>
            </div>
            <div class="col-4 item-movie position-relative" >
                <img src="img/poster/paw.jpg" class="poster-movie" alt="">
                <div class="name-movie">
                    <p>Paw</p>
                </div>
                <div class="btnAction">
                    <button class="btnView btnAction-item" >Xem chi tiết</button>
                    <button class="btnBooking btnAction-item">Đặt vé</button>
                </div>
                <div class="object">
                    <p class="p-object">12+</p>
                </div>
            </div>
            <div class="col-4 item-movie position-relative" >
                <img src="img/poster/phim1990.jpg" class="poster-movie" alt="">
                <div class="name-movie">
                    <p>1990</p>
                </div>
                <div class="btnAction">
                    <button class="btnView btnAction-item" >Xem chi tiết</button>
                    <button class="btnBooking btnAction-item">Đặt vé</button>
                </div>
                <div class="object">
                    <p class="p-object">12+</p>
                </div>
            </div>
            <div class="col-4 item-movie position-relative" >
                <img src="img/poster/vungdatthanky.jpg" class="poster-movie" alt="">
                <div class="name-movie">
                    <p>Vung đất thần kỳ</p>
                </div>
                <div class="btnAction">
                    <button class="btnView btnAction-item" >Xem chi tiết</button>
                    <button class="btnBooking btnAction-item">Đặt vé</button>
                </div>
                <div class="object">
                    <p class="p-object">22+</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- js --}}
@section('js-plugin')

@endsection
