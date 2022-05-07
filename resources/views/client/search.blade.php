@extends('layouts.client')

{{-- css --}}
@section('css-plugin')
    <link rel="stylesheet" href="{{ asset("/css/content.css")}}">
@endsection

{{-- title --}}
@section('title')
    Phim
@endsection

{{-- content --}}
@section('content')
{{-- News --}}
<div class="container search">
    <div class="header-search">
        <h3 class="heading-content active heading-search d-inline-block">KẾT QUẢ TÌM KIẾM: </h3> <h3 class="heading-content d-inline-block">{{$data['search']}}</h3>
    </div>
    <div class="body-search">
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
    </div>
</div>
@endsection

{{-- js --}}
@section('js-plugin')

@endsection
