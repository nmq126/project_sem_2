<div class="default-sidebar">
    <!-- Begin Side Navbar -->
    <nav class="side-navbar box-scroll sidebar-scroll">

        <ul class="list-unstyled">
            <li class="{{request()->is('admin/dashboard*') ? 'active' : ''}}">
                <a href="/admin/dashboard"><i class="fas fa-chart-line">
                    </i><span>Dashboard</span>
                </a>
            </li>
            <li class="{{request()->is('admin/product*') ? 'active' : ''}}">
                <a href="#dropdown-product"
                   aria-expanded="{{request()->is('admin/product*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i class="fas fa-utensils"></i><span>Quản lý sản phẩm</span></a>
                <ul id="dropdown-product"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/product*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('/admin/product/list') ? 'active' : '' }}"
                           href="/admin/product/list">Danh sách sản phẩm</a></li>

                    <li><a class="{{ request()->is('/admin/product/create') ? 'active' : '' }}"
                           href="/admin/product/create">Tạo sản phẩm mới</a></li>
                </ul>
            </li>

            <li class="{{request()->is('admin/category*') ? 'active' : ''}}">
                <a href="#dropdown-category"
                   aria-expanded="{{request()->is('admin/category*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i class="fas fa-hamburger"></i><span>Quản lý danh mục</span></a>
                <ul id="dropdown-category"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/category*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/category/list') ? 'active' : '' }}"
                           href="/admin/category/list">Danh sách danh mục</a></li>
                    <li><a class="{{ request()->is('admin/category/create') ? 'active' : '' }}"
                           href="/admin/category/create">Tạo danh mục mới</a></li>
                </ul>
            </li>

            <li class="{{request()->is('admin/ingredient*') ? 'active' : ''}}">
                <a href="#dropdown-ingredient"
                   aria-expanded="{{request()->is('admin/ingredient*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i class="fas fa-drumstick-bite"></i><span>Quản lý nguyên liệu</span></a>
                <ul id="dropdown-ingredient"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/ingredient*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/ingredient/list') ? 'active' : '' }}"
                           href="/admin/ingredient/list">Danh sách nguyên liệu</a></li>
                    <li><a class="{{ request()->is('admin/ingredient/create') ? 'active' : '' }}"
                           href="/admin/ingredient/create">Tạo mới nguyên liệu</a></li>


                </ul>
            </li>


            <li class="{{request()->is('admin/orders*') ? 'active' : ''}}">
                <a href="/admin/orders"><i
                        class="la la-dropbox"></i><span>Quản lý đơn hàng</span>
                </a>
            </li>
            <li class="{{request()->is('admin/blog*') ? 'active' : ''}}">
                <a href="#dropdown-blogs"
                   aria-expanded="{{request()->is('admin/blog*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i
                        class="la la-map"></i><span>Quản lý Blog</span></a>
                <ul id="dropdown-blogs"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/blog*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/blog/list') ? 'active' : '' }}"
                           href="/admin/blog/list">Danh sách blog</a></li>
                             <li><a class="{{ request()->is('admin/blog/create') ? 'active' : '' }}"
                           href="/admin/blog/create">Tạo mới người dùng</a></li>

                </ul>
            </li>

            <li class="{{request()->is('admin/user*') ? 'active' : ''}}">
                <a href="/admin/user/list"><i
                        class="la la-user"></i><span>Quản lý Người dùng</span></a>
            </li>
            <li class="{{request()->is('admin/messages*') ? 'active' : ''}}">
                <a href="/admin/messages/list"><i
                        class="la la-envelope"></i><span>Quản lý tin nhắn</span></a>
            </li>
            {{-- End product--}}
        </ul>
        <!-- End Main Navigation -->
    </nav>
    <!-- End Side Navbar -->
</div>
