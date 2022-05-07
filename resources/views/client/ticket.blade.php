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
    @if (Session::has('login_name') && Session::has('login_id'))
        <input type="hidden" name="idMember" id="idMemberCheckOut" value="{{ Session::get('login_id') }}">
    @else
        <script>
            alert('Hãy đăng nhập trước đi mua vé');
            window.location = "http://127.0.0.1:8000/dang-nhap";
        </script>
    @endif
    <div class="header-search">
        <h3 class="heading-content active heading-search d-inline-block">Vé của tôi: </h3>
    </div>
    <div class="body-search">
        <div class="row justify-content-between mb-3">
            <div class="col col-3">
                <select name="" class="form-select" id="filter-ticket">
                    <option value="dayUp">Ngày mua gần > xa</option>
                    <option value="dayDown">Ngày mua xa > gần</option>
                    <option value="valueUp">Giá trị lớn > nhỏ</option>
                    <option value="valueDown">Giá trị nhỏ > gần</option>
                    <option value="value">Còn hạng</option>
                    <option value="noValue">Hết hạng</option>
                </select>
            </div>
        </div>
        <div class="row list-ticket">
            
        </div>
    </div>
</div>
@endsection

{{-- js --}}
@section('js-plugin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/js/client/ticket.js"></script>
@endsection
