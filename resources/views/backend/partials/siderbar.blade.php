<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <!-- Qauy về trang Fornt-end-->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('page.home') }}" class="d-block">Trang web</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Trang chủ
                        </p>
                    </a>
                </li>
                <!-- Menu -->
                <li class="nav-item">
                    <a href="{{ route('menu.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu
                        </p>
                    </a>
                </li>
                <!-- Danh mục -->
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục
                        </p>
                    </a>
                </li>
                <!-- Thương hiệu -->
                <li class="nav-item">
                    <a href="{{ route('brand.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Thương hiệu
                        </p>
                    </a>
                </li>
                <!-- Sản phẩm -->
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sản phẩm
                        </p>
                    </a>
                </li>
                <!-- Slide -->
                <li class="nav-item">
                    <a href="{{ route('slider.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Slide
                        </p>
                    </a>
                </li>
                <!-- Setting -->
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
                <!-- Nhân viên -->
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Nhân viên
                        </p>
                    </a>
                </li>
                <!-- Vai trò  -->
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Vai trò
                        </p>
                    </a>
                </li>
                <!-- Đơn hàng  -->
                <li class="nav-item">
                    <a href="{{ route('order.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Đơn hàng
                        </p>
                    </a>
                </li>
                <!-- Vận chuyển  -->
                <li class="nav-item">
                    <a href="{{ route('ship.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Vận chuyển
                        </p>
                    </a>
                </li>
                <!-- Tin tức  -->
                <li class="nav-item">
                    <a href="{{ route('new.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tin tức
                        </p>
                    </a>
                </li>
                <!-- quyền  -->
                <li class="nav-item">
                    <a href="{{ route('permission.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Phân Quyền
                        </p>
                    </a>
                </li>
                <li style="margin-top:100px">
                    <a href="{{ route('admin.logout') }}" class="btn btn-info btn-lg" style="color:yellow">
                        <span class="glyphicon glyphicon-log-out"></span> Đăng xuất
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>