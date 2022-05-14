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
<div class="container news mt-4">
    <div class="row">
        <div class="col-9">
            <div class="header-news">
                <h3 class="heading-content active heading-news">TIN TỨC ĐIỆN ẢNH</h3>
            </div>
            <div class="list-news row">
                <div class="col-12 mb-5">
                    <div class="item-new row">
                        <div class="banner-news position-relative col-5">
                            <a href=""><img src="img/news/1.jpg" class="img-banner-new"></a>
                            <div class="block-hover"></div>
                        </div>
                        <div class="title-news col-7">
                            <a href="">
                                <h5 class="title-new">[Review] Encanto: Tình Cảm Gia Đình Chẳng Cần Đao To Búa Lớn!</h5>
                            </a>
                            <div class="rate mb-1"><i class="fas fa-star text-warning"></i> <strong>8.8</strong>/10(110)
                            </div>
                            <div class="date-post mb-1"><i><i class="fas fa-calendar-alt"></i> 12/05/2022</i></div>
                            <p class="content-new">Chẳng đao to búa lớn, chẳng dời non lấp bể, cách bạn trở thành người hùng
                                để cứu lấy thứ gì đó</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="item-new row">
                        <div class="banner-news position-relative col-5">
                            <a href=""><img src="img/news/2.jpg" class="img-banner-new"></a>
                            <div class="block-hover"></div>
                        </div>
                        <div class="title-news col-7">
                            <a href="">
                                <h5 class="title-new">Những phim hành động hay nhất mang phong cách Gun-Fu</h5>
                            </a>
                            <div class="rate mb-1"><i class="fas fa-star text-warning"></i> <strong>8.7</strong>/10(110)
                            </div>
                            <div class="date-post mb-1"><i><i class="fas fa-calendar-alt"></i> 16/04/2022</i></div>
                            <p class="content-new">Danh sách các phim dưới đây hẳn sẽ chiều long người xem với mong muốn thưởng thức những màn “xả đạn” đặc sắc.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="item-new row">
                        <div class="banner-news position-relative col-5">
                            <a href=""><img src="img/news/3.jpg" class="img-banner-new"></a>
                            <div class="block-hover"></div>
                        </div>
                        <div class="title-news col-7">
                            <a href="">
                                <h5 class="title-new">Top 10 diễn viên được đồn đoán sẽ thay thế Daniel Craig vào vai James Bond</h5>
                            </a>
                            <div class="rate mb-1"><i class="fas fa-star text-warning"></i> <strong>8.9</strong>/10(110)
                            </div>
                            <div class="date-post mb-1"><i><i class="fas fa-calendar-alt"></i> 12/03/2022</i></div>
                            <p class="content-new">Cùng với việc háo hức chờ đợi xem Daniel Craig xuất hiện lần cuối cùng với vai trò James Bond trong No Time To Die, người hâm mộ cũng đang phấn khích chờ đợi xem liệu gương mặt nào sẽ kế tục công việc của anh ấy?</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="item-new row">
                        <div class="banner-news position-relative col-5">
                            <a href=""><img src="img/news/4.jpg" class="img-banner-new"></a>
                            <div class="block-hover"></div>
                        </div>
                        <div class="title-news col-7">
                            <a href="">
                                <h5 class="title-new">Ký sự điện ảnh: Đoạt giải thưởng và phim hay, phim dở</h5>
                            </a>
                            <div class="rate mb-1"><i class="fas fa-star text-warning"></i> <strong>8.8</strong>/10(110)
                            </div>
                            <div class="date-post mb-1"><i><i class="fas fa-calendar-alt"></i> 01/03/2020</i></div>
                            <p class="content-new">Giải thưởng điện ảnh – thuần phong mỹ tục – giá trị nghệ thuật được nhìn nhận thế nào?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- sidebar --}}
        @include('client.block.sidebarNews')
    </div>
    {{-- <div class="footer-news text-end">
        <a href="" class="link-more-news">XEM THÊM <i class="fas fa-angle-right ml-2"></i></a>
    </div> --}}
</div>
@endsection

{{-- js --}}
@section('js-plugin')

@endsection
