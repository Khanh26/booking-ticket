@extends('layouts.client')


{{-- css --}}
@section('css-plugin')
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
@endsection

{{-- title --}}
@section('title')
    Trang chủ
@endsection

{{-- content --}}
@section('content')
    <div class="container-fluid mb-4 p-0">
        <div class="trailer">
            <iframe width="840" height="472.5" src="https://www.youtube.com/embed/{{$data['TRAILER_MOVIE']}}" title="" frameborder="0" allow="allowfullscreen"></iframe>
        </div>
        <div class="container row details-movie mt-4">
            <div class="col-5">
                <img src="{{ asset('img/poster/'.$data['POSTER_MOVIE']) }}" class="img-poster" alt="">
            </div>
            <div class="col-7">
                <div class="header-detail text-uppercase">
                    {{$data['NAME_MOVIE']}}
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Đạo diễn: </h6>
                    <span class="content-detail">{{$data['DIRECTOR_MOVIE']}}</span>
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Diễn viên: </h6>
                    <span class="content-detail">{{$data['ACTOR_MOVIE']}}</span>
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Thể loại: </h6>
                    <span class="content-detail">@foreach ($data['genre'] as $item)
                        {{$item['NAME_GENRE']}},
                    @endforeach</span>
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Đối tượng: </h6>
                    <span class="content-detail">{{$data['suitable']['NOTE_SUITABLE']}}</span>
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Thời lượng: </h6>
                    <span class="content-detail">{{$data['TIME_MOVIE']}} phút</span>
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Ngôn ngữ: </h6>
                    <span class="content-detail text-capitalize">{{$data['language']['NAME_LANGUAGE']}}</span>
                </div>
    
                <div class="item-detail">
                    <a href="{{ route('checkout', ['idMovie'=> $data['ID_MOVIE']]) }}" class="link-book">Đặt vé</a>
                </div>
            </div>
            <div class="col col-12 mt-4">
                <h5 class="heading-detail-content">Nội dung</h5>
                <p>
                    {{$data['CONTENT_MOVIE']}}
                </p>
            </div>
        </div>
    </div>
@endsection

{{-- js --}}
@section('js-plugin')
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/configPlugin.js"></script>
@endsection
