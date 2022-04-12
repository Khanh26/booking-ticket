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
            <iframe width="840" height="472.5" src="https://www.youtube.com/embed/p2mqG9BHC-A" title="" frameborder="0" allow="allowfullscreen"></iframe>
        </div>

        <div class="container row details-movie mt-4">
            <div class="col-5">
                <img src="{{ asset('img/poster/vungdatthanky.jpg') }}" class="img-poster" alt="">
            </div>
            <div class="col-7">
                <div class="header-detail">
                    SINH VẬT HUYỀN BÍ: NHỮNG BÍ MẬT CỦA DUMBLEDORE
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Đạo diễn: </h6>
                    <span class="content-detail">David Yates</span>
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Diễn viên: </h6>
                    <span class="content-detail">Eddie Redmayne, Mads Mikkelsen, Ezra Miller, Katherine Waterston, Jude Law,…</span>
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Thể loại: </h6>
                    <span class="content-detail">Phiêu Lưu, Thần thoại</span>
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Đối tượng: </h6>
                    <span class="content-detail">C13 - PHIM CẤM KHÁN GIẢ DƯỚI 13 TUỔI</span>
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Thời lượng: </h6>
                    <span class="content-detail">143 phút</span>
                </div>
                <div class="item-detail">
                    <h6 class="heading-detail d-inline-block mb-0">Ngôn ngữ: </h6>
                    <span class="content-detail">Tiếng Anh - Phụ đề Tiếng Việt</span>
                </div>
                
                <div class="item-detail">
                    <a href="" class="link-book">Đặt vé</a>
                </div>
            </div>
            <div class="col col-12 mt-4">
                <h5 class="heading-detail-content">Nội dung</h5>
                <p>
                    Câu chuyện của phần phim thứ ba này xoay quanh việc Giáo sư Albus Dumbledore (Jude Law) phát hiện ra việc Phù thủy Bóng tối quyền năng Gellert Grindelwald (Mads Mikkelsen) đang âm mưu chiếm lấy quyền kiểm soát Thế giới Phù thủy. Không thể một mình ngăn chặn đoàn quân hùng mạnh của của Grindelwald, Dumbledore đặt niềm tin vào Nhà nghiên cứu sinh vật huyền bí Newt Scamander (Eddie Redmayne) cùng đồng đội thực hiện nhiệm vụ đầy hiểm nguy này. Trong tình thế ngàn cân treo sợi tóc như vậy, liệu thầy Dumbledore có thể đứng ngoài được bao lâu?
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
