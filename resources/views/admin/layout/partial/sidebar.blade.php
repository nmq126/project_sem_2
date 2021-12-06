<div class="default-sidebar">
    <!-- Begin Side Navbar -->
    <nav class="side-navbar box-scroll sidebar-scroll">
        <!-- Begin Main Navigation -->
        <ul class="list-unstyled">
            {{-- Begin product--}}
            <li class="{{request()->is('admin/product*') ? 'active' : ''}}">
                <a href="#dropdown-product"
                   aria-expanded="{{request()->is('admin/product*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i
                        class="la la-puzzle-piece"></i><span>Quản lý sản phẩm</span></a>
                <ul id="dropdown-product"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/product*') ? 'show' : ''}}">

                    <li><a class="{{ request()->is('/admin/product/create') ? 'active' : '' }}"
                        href="/admin/product/create">Thêm sản phẩm mới</a></li>
                        <li><a class="{{ request()->is('/admin/product/list') ? 'active' : '' }}"
                            href="/admin/product/list">Danh sách Sản phẩm</a></li>

                           <li><a class="{{ request()->is('admin/product/create/ingredient') ? 'active' : '' }}"
                            href="/admin/product/create/ingredient">Thêm mới nguyên liệu</a></li>
                                <li><a class="{{ request()->is('admin/product/list/ingredient') ? 'active' : '' }}"
                                    href="/admin/product/list/ingredient">Danh sách nguyên liệu</a></li>
                                    <li><a class="{{ request()->is('admin/product/create/category') ? 'active' : '' }}"
                                        href="/admin/product/create/category">Thêm Món mới</a></li>
                                        <li><a class="{{ request()->is('admin/product/list/category') ? 'active' : '' }}"
                                             href="/admin/product/list/category">Danh sách Món</a></li>

                       
                </ul>
            </li>
            <li class="{{request()->is('admin/orders*') ? 'active' : ''}}">
                <a href="#dropdown-orders"
                   aria-expanded="{{request()->is('admin/orders*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i
                        class="la la-dropbox"></i><span>Quản lý đơn hàng</span></a>
                <ul id="dropdown-orders"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/orders*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/orders') ? 'active' : '' }}"
                           href="/admin/orders">Danh sách đơn hàng</a></li>

                </ul>
            </li>
            <li class="{{request()->is('admin/blog*') ? 'active' : ''}}">
                <a href="#dropdown-blogs"
                   aria-expanded="{{request()->is('admin/blog*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i
                        class="la la-map"></i><span>Quản lý Blog</span></a>
                <ul id="dropdown-blogs"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/blog*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/blog') ? 'active' : '' }}"
                           href="/admin/blog">Danh sách blog</a></li>

                </ul>
            </li>
            <li class="{{request()->is('admin/dashboard*') ? 'active' : ''}}">
                <a href="#dropdown-dashboard"
                   aria-expanded="{{request()->is('admin/dashboard*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i class="fas fa-chart-line"></i><span>Biểu đồ</span></a>
                <ul id="dropdown-dashboard"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/dashboard*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"
                           href="/admin/dashboard">Biểu đồ</a></li>

                </ul>
            </li>
            <li class="{{request()->is('admin/user*') ? 'active' : ''}}">
                <a href="#dropdown-user"
                   aria-expanded="{{request()->is('admin/user*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i
                        class="la la-user"></i><span>Quản lý Người dùng</span></a>
                <ul id="dropdown-user"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/user*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/user') ? 'active' : '' }}"
                           href="/admin/user">Danh sách blog</a></li>

                </ul>
            </li>
            {{-- End product--}}

        </ul>
        <!-- End Main Navigation -->
    </nav>
    <!-- End Side Navbar -->
</div>
