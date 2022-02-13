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
        <h3 class="heading-content active heading-search d-inline-block">KẾT QUẢ TÌM KIẾM: </h3> <h3 class="heading-content d-inline-block">{{$resultSearch}}</h3>
    </div>
    <div class="body-search">
        
    </div>
</div>
@endsection

{{-- js --}}
@section('js-plugin')

@endsection
