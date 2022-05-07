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
        </div>
        <div class="list-movie row">
            @foreach ($data['movieShowing'] as $item)
                <div class="col-4 item-movie position-relative">
                    <img src="img/poster/{{$item->POSTER_MOVIE}}" class="poster-movie" alt="">
                    <div class="name-movie">
                        <p>{{$item->NAME_MOVIE}}</p>
                    </div>
                    <div class="btnAction">
                        <a href="{{ route('detailsMovie', ['idMovie'=>$item->ID_MOVIE]) }}" class="btnView btnAction-item">Xem chi tiết</a>
                        <a href="{{ route('checkout', ['idMovie'=>$item->ID_MOVIE]) }}" class="btnBooking btnAction-item">Đặt vé</a>
                    </div>
                    <div class="object">
                        <p class="p-object">{{$item->SUITABLE->NOTE_SUITABLE}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container movie-main">
        <div class="header-movie">
            <button class="heading-content active showing">PHIM SẮP CHIẾU</button>
        </div>
        <div class="list-movie row">
            @foreach ($data['movieComingSoon'] as $item)
                <div class="col-4 item-movie position-relative">
                    <img src="img/poster/{{$item->POSTER_MOVIE}}" class="poster-movie" alt="">
                    <div class="name-movie">
                        <p>{{$item->NAME_MOVIE}}</p>
                    </div>
                    <div class="btnAction">
                        <a href="{{ route('detailsMovie', ['idMovie'=>$item->ID_MOVIE]) }}" class="btnView btnAction-item">Xem chi tiết</a>
                    </div>
                    <div class="object">
                        <p class="p-object">{{$item->SUITABLE->NOTE_SUITABLE}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

{{-- js --}}
@section('js-plugin')

@endsection
