<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <li class="nav-item dropdown">
            <div class="user-panel d-flex" data-toggle="dropdown">
                <div class="info">
                    @if (Session::has('login_name_admin') && Session::has('login_id_admin'))
                        <a href="#" class="d-block">{{Session::get('login_name_admin')}}</a>
                    @else
                        <script>
                            window.location = "http://127.0.0.1:8000/admin/dang-nhap";
                        </script>
                    @endif
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> Thông tin cá nhân
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logoutAdmin') }}" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất
                </a>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->

    </ul>
</nav>
