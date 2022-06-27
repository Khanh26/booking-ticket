<div class="sidebar col-3">
    <div class="item-sidebar">
        <div class="header-sidebar">
            <h4 class="heading-content active">Chuyên mục</h4>
        </div>
        <div class="body-sidebar">
            <ul class="nav-ul-filler">
                <li class="item-filler">
                    <a href="{{ route('news') }}"
                        class="link-filler {{ Route::currentRouteName() === 'news' ? 'active' : '' }}">Tất cả(40)</a>
                    <ul class="sub-nav-ul-filler">
                        <li class="sub-item-filler"><a href="{{ route('reviewMovie') }}"
                                class="link-filler {{ Route::currentRouteName() === 'reviewMovie' ? 'active' : '' }}"><i
                                    class="fas fa-angle-double-right mr-3"></i> Review phim(2)</a></li>
                        <li class="sub-item-filler"><a href="{{ route('cinemaCorner') }}"
                                class="link-filler {{ Route::currentRouteName() === 'cinemaCorner' ? 'active' : '' }}"><i
                                    class="fas fa-angle-double-right mr-3"></i> Góc điện ảnh(3)</a></li>
                        <li class="sub-item-filler"><a href="{{ route('promotion') }}"
                                class="link-filler {{ Route::currentRouteName() === 'promotion' ? 'active' : '' }}"><i
                                    class="fas fa-angle-double-right mr-3"></i> Khuyến mãi(4)</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
