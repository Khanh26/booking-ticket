<nav class="header-info">
    <div class="block-header row">
        <div class="col-4 block-logo p-0 text-start">
            <a href="/"><img src="{{ route('home') }}/img/logo.png" width="56%"></a>
        </div>
        <div class="col-4 block-search p-0 text-center">
            <form class="formSearch" action="{{ route('search') }}">
                <div class="blockInput row">
                    <input type="text" class="col-9 inputSearch" placeholder="Tìm kiếm phim, bài viết..." list="topics" name="Search" id="inputSearch">
                    <button type="submit" class="col-3 btnSearch" class=""><i class="fas fa-search"></i></button>
                </div>
                <datalist id="topics">
                    <option value="khanh">
                    <option value="binh">
                    <option value="Tien">
                    <option value="dung">
                    <option value="bao">
                    <option value="thuy">
                </datalist>
            </form>
        </div>
        <div class="col-4 login p-0 text-end">
            <i class="fas fa-user"></i>
            <button class="btnLogin ml-3">Đăng nhập</button>
            <span>/</span>
            <button class="btnLogin">Đăng ký</button>
        </div>
    </div>
</nav>
<nav class="header-main">
    <ul class="row block-header">
        <li class="nav-item nav-item-start col"><a href="{{ route('movie') }}" class="nav-link">PHIM</a></li>
        <li class="nav-item col"><a href="{{ route('about') }}" class="nav-link">GIỚI THIỆU</a></li>
        <li class="nav-item col">
            <a href="{{ route('news') }}" class="nav-link">TIN TỨC <i class="fas fa-caret-down"></i></a>
            
            <ul class="subMenu">
                <li class="item-subMenu"><a href="{{ route('reviewMovie')}}" class="link-subMenu">REVIEW PHIM</a></li>
                <li class="item-subMenu"><a href="{{ route('cinemaCorner')}}" class="link-subMenu">GÓC ĐIỆN ẢNH</a></li>
                <li class="item-subMenu"><a href="{{ route('promotion')}}" class="link-subMenu">KHUYẾN MÃI</a></li>
            </ul>
        </li>
        <li class="nav-item col">
            <a href="" class="nav-link">RẠP/GIÁ VÉ <i class="fas fa-caret-down"></i></a>

            <ul class="subMenu">
                <li class="item-subMenu"><a href="" class="link-subMenu">RẠP PHIM</a></li>
                <li class="item-subMenu"><a href="" class="link-subMenu">GIÁ VÉ</a></li>
            </ul>
        </li>
        <li class="nav-item col"><a href="" class="nav-link">THÀNH VIÊN</a></li>
        <li class="nav-item col"><a href="" class="nav-link">LIÊN HỆ</a></li>
    </ul>
</nav>