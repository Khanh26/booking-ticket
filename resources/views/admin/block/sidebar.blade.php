<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
      <img src="/img/logo-admin.png" alt="AdminLTE Logo" class="brand-image float-none" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{ route('admin') }}" class="nav-link {{Route::currentRouteName() === 'admin' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tổng quan
              </p>
            </a>  
          </li>

          <li class="nav-item">
            <a href="{{ route('pageShowMovie') }}" class="nav-link {{Route::currentRouteName() === 'pageShowMovie' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Lịch chiếu phim
              </p>
            </a>            
          </li>

          <li class="nav-item">
            <a href="{{ route('pageUpdateMovie') }}" class="nav-link {{Route::currentRouteName() === 'pageUpdateMovie' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Cập nhật phim
              </p>
            </a>            
          </li>

          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý tài khoản
              </p>
            </a>            
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>