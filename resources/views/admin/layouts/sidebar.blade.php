<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('admin/assets/img/cute.jpg') }}"
            width="50px" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><b>{{auth()->user()->name}}</b></p>
            <p class="app-sidebar__user-designation">Quản trị viên</p>
        </div>
    </div>
    <hr>
    <ul class="app-menu">
        <li><a class="app-menu__item haha" href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
                <span class="app-menu__label">POS Bán Hàng</span></a></li>
        <li><a class="app-menu__item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                href="{{ route('dashboard') }}"><i class='app-menu__icon bx bx-tachometer'></i><span
                    class="app-menu__label">Bảng điều khiển</span></a></li>
        <li><a class="app-menu__item {{ request()->routeIs('products.*') ? 'active' : '' }}"
                href="{{ route('products.index') }}"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span
                    class="app-menu__label">Quản lý sản phẩm</span></a>
        </li>
        <li><a class="app-menu__item {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                href="{{ route('categories.index') }}"><i class='app-menu__icon bx bx-user-voice'></i><span
                    class="app-menu__label">Quản lý danh mục</span></a>
        </li>
        <li><a class="app-menu__item {{ request()->routeIs('users.*') ? 'active' : '' }}"
                href="{{ route('users.index') }}"><i class='app-menu__icon bx bx-id-card'></i> <span
                    class="app-menu__label">Quản lý người dùng</span></a></li>
        <li><a class="app-menu__item {{ request()->routeIs('roles.*') ? 'active' : '' }}"
                href="{{ route('roles.index') }}"><i class='app-menu__icon bx bx-dollar'></i><span
                    class="app-menu__label">Quản lý quyền hạn</span></a></li>
        <li><a class="app-menu__item {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"
                href="{{ route('admin.orders.index') }}"><i class='app-menu__icon bx bx-task'></i><span
                    class="app-menu__label">Quản lý đơn hàng</span></a></li>

        <li><a class="app-menu__item {{ request()->routeIs('coupons.*') ? 'active' : '' }}"
                href="{{ route('coupons.index') }}"><i class='app-menu__icon bx bx-run'></i><span
                    class="app-menu__label">Quản lý mã giảm giá
                </span></a></li>
        <li><a class="app-menu__item" href="#"><i
                    class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class="app-menu__label">Báo cáo doanh
                    thu</span></a>
        </li>
        <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-calendar-check'></i><span
                    class="app-menu__label">Lịch công tác </span></a></li>
        <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-cog'></i><span
                    class="app-menu__label">Cài
                    đặt hệ thống</span></a></li>
    </ul>
</aside>
