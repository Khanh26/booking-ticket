<div class="header-sidebar">
    <div class="logo-admin">
        <a href="{{ route('admin') }}">
            <img class="logo-sidebar" src="{{ asset('img/logo-admin.png') }}" alt="">
        </a>
    </div>
    <div class="title-sidebar">Chức năng</div>
</div>

<div class="body-sidebar">
    <ul class="nav-menu">
        <li class="item-nav">
            <a href="{{ route('admin') }}" class="link-nav {{Route::currentRouteName() === 'admin' ? 'active' : ''}}"><i class="fas fa-tachometer-alt icon-nav"></i>Tổng quát</a>
        </li>
        <li class="item-nav">
            <a href="{{ route('pageShowMovie') }}" class="link-nav {{Route::currentRouteName() === 'pageShowMovie' ? 'active' : ''}}"><i class="fas fa-calendar-alt icon-nav"></i>Sắp lịch chiếu</a>
        </li>
        <li class="item-nav">
            <a href="{{ route('pageUpdateMovie') }}" class="link-nav {{Route::currentRouteName() === 'pageUpdateMovie' ? 'active' : ''}}"><i class="fas fa-film icon-nav"></i>Cập nhật phim</a>
        </li>
    </ul>
</div>