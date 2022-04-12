@extends('layouts.client')


{{-- css --}}
@section('css-plugin')
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="css/content.css">
@endsection

{{-- title --}}
@section('title')
    Trang chủ
@endsection

{{-- content --}}
@section('content')
    <div class="slider">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="img/slider/chiakhoatramty.jpg" class="slider-img" alt=""></div>
                <div class="swiper-slide"><img src="img/slider/vungdatthanky.jpg" class="slider-img" alt=""></div>
            </div>
            
            <div class="swiper-button-prev btnArrow"></div>
            <div class="swiper-button-next btnArrow"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

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

    {{-- News --}}
    <div class="container news">
        <div class="header-news">
            <h3 class="heading-content active heading-news">TIN TỨC ĐIỆN ẢNH</h3>
        </div>
        <div class="list-news row">
            <div class="col-6 mb-5">
                <div class="item-new row">
                    <div class="banner-news position-relative col-5">
                        <a href=""><img src="img/news/1.jpg" class="img-banner-new"></a>
                        <div class="block-hover"></div>
                    </div>
                    <div class="title-news col-7">
                        <a href=""><h5 class="title-new">[Review] Encanto: Tình Cảm Gia Đình Chẳng Cần Đao To Búa Lớn!</h5></a>
                        <div class="rate mb-1"><i class="fas fa-star text-warning"></i> <strong>8.8</strong>/10(110)</div>
                        <div class="date-post mb-1"><i><i class="fas fa-calendar-alt"></i> 12/03/2020</i></div>
                        <p class="content-new">Chẳng đao to búa lớn, chẳng dời non lấp bể, cách bạn trở thành người hùng để cứu lấy thứ gì đó</p>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-5">
                <div class="item-new row">
                    <div class="banner-news position-relative col-5">
                        <a href=""><img src="img/news/2.jpg" class="img-banner-new"></a>
                        <div class="block-hover"></div>
                    </div>
                    <div class="title-news col-7">
                        <a href=""><h5 class="title-new">[Review] Encanto: Tình Cảm Gia Đình Chẳng Cần Đao To Búa Lớn!</h5></a>
                        <div class="rate mb-1"><i class="fas fa-star text-warning"></i> <strong>8.8</strong>/10(110)</div>
                        <div class="date-post mb-1"><i><i class="fas fa-calendar-alt"></i> 12/03/2020</i></div>
                        <p class="content-new">Chẳng đao to búa lớn, chẳng dời non lấp bể, cách bạn trở thành người hùng để cứu lấy thứ gì đó</p>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-5">
                <div class="item-new row">
                    <div class="banner-news position-relative col-5">
                        <a href=""><img src="img/news/3.jpg" class="img-banner-new"></a>
                        <div class="block-hover"></div>
                    </div>
                    <div class="title-news col-7">
                        <a href=""><h5 class="title-new">[Review] Encanto: Tình Cảm Gia Đình Chẳng Cần Đao To Búa Lớn!</h5></a>
                        <div class="rate mb-1"><i class="fas fa-star text-warning"></i> <strong>8.8</strong>/10(110)</div>
                        <div class="date-post mb-1"><i><i class="fas fa-calendar-alt"></i> 12/03/2020</i></div>
                        <p class="content-new">Chẳng đao to búa lớn, chẳng dời non lấp bể, cách bạn trở thành người hùng để cứu lấy thứ gì đó</p>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-5">
                <div class="item-new row">
                    <div class="banner-news position-relative col-5">
                        <a href=""><img src="img/news/4.jpg" class="img-banner-new"></a>
                        <div class="block-hover"></div>
                    </div>
                    <div class="title-news col-7">
                        <a href=""><h5 class="title-new">[Review] Encanto: Tình Cảm Gia Đình Chẳng Cần Đao To Búa Lớn!</h5></a>
                        <div class="rate mb-1"><i class="fas fa-star text-warning"></i> <strong>8.8</strong>/10(110)</div>
                        <div class="date-post mb-1"><i><i class="fas fa-calendar-alt"></i> 12/03/2020</i></div>
                        <p class="content-new">Chẳng đao to búa lớn, chẳng dời non lấp bể, cách bạn trở thành người hùng để cứu lấy thứ gì đó</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-news text-end">
            <a href="{{ route('news') }}" class="link-more-news">XEM THÊM <i class="fas fa-angle-right ml-2"></i></a>
        </div>
    </div>

    <div class="container event">
        <div class="header-event">
            <h3 class="heading-content active heading-event">KHUYẾN MÃI - SỰ KIỆN</h3>
        </div>
        
        <div class="list-event row">
            <div class="col-3 item-event position-relative">
                <img src="img/event/1.jpg" class="img-banner-event" alt="">
                <div class="block-hover-event"></div>
                <a class="linkViewEvent">CHI TIẾT</a>
            </div>
            <div class="col-3 item-event position-relative">
                <img src="img/event/2.png" class="img-banner-event" alt="">
                <div class="block-hover-event"></div>
                <buttoan class="linkViewEvent">CHI TIẾT</buttoan>
            </div>
            <div class="col-3 item-event position-relative">
                <img src="img/event/3.jpg" class="img-banner-event" alt="">
                <div class="block-hover-event"></div>
                <a class="linkViewEvent">CHI TIẾT</a>
            </div>
            <div class="col-3 item-event position-relative">
                <img src="img/event/4.jpg" class="img-banner-event" alt="">
                <div class="block-hover-event"></div>
                <a class="linkViewEvent">CHI TIẾT</a>
            </div>
        </div>
    </div>
    
@endsection

{{-- js --}}
@section('js-plugin')
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="js/configPlugin.js"></script>
@endsection
