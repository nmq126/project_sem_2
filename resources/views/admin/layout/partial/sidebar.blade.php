<div class="default-sidebar">
    <!-- Begin Side Navbar -->
    <nav class="side-navbar box-scroll sidebar-scroll">

        <ul class="list-unstyled">

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
            <li class="{{request()->is('admin/ingredient*') ? 'active' : ''}}">
                <a href="#dropdown-ingredient"
                   aria-expanded="{{request()->is('admin/ingredient*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i class="fas fa-drumstick-bite"></i><span>Nguyên liệu</span></a>
                <ul id="dropdown-ingredient"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/ingredient*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/ingredient/create') ? 'active' : '' }}"
                           href="/admin/ingredient/create">Tạo mới nguyên liệu</a></li>
                           <li><a class="{{ request()->is('admin/ingredient/list') ? 'active' : '' }}"
                            href="/admin/ingredient/list">Danh sách nguyên liệu</a></li>

                </ul>
            </li>
            <li class="{{request()->is('admin/category*') ? 'active' : ''}}">
                <a href="#dropdown-category"
                   aria-expanded="{{request()->is('admin/category*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i class="fas fa-hamburger"></i><span>Món</span></a>
                <ul id="dropdown-category"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/category*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/category/create') ? 'active' : '' }}"
                           href="/admin/category/create">Tạo mới Món</a></li>
                           <li><a class="{{ request()->is('admin/category/list') ? 'active' : '' }}"
                            href="/admin/category/list">Danh sách Món</a></li>

                </ul>
            </li>
            <li class="{{request()->is('admin/product*') ? 'active' : ''}}">
                <a href="#dropdown-product"
                   aria-expanded="{{request()->is('admin/product*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i class="fas fa-utensils"></i><span>Quản lý sản phẩm</span></a>
                <ul id="dropdown-product"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/product*') ? 'show' : ''}}">

                    <li><a class="{{ request()->is('/admin/product/create') ? 'active' : '' }}"
                        href="/admin/product/create">Thêm sản phẩm mới</a></li>
                        <li><a class="{{ request()->is('/admin/product/list') ? 'active' : '' }}"
                            href="/admin/product/list">Danh sách Sản phẩm</a></li>

                     
                     

                       
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
                    <li><a class="{{ request()->is('admin/blog/list') ? 'active' : '' }}"
                           href="/admin/blog/list">Danh sách blog</a></li>
                             <li><a class="{{ request()->is('admin/blog/create') ? 'active' : '' }}"
                           href="/admin/blog/create">Tạo mới người dùng</a></li>

                </ul>
            </li>
  
            <li class="{{request()->is('admin/user*') ? 'active' : ''}}">
                <a href="#dropdown-user"
                   aria-expanded="{{request()->is('admin/user*') ? 'true' : 'false'}}"
                   data-toggle="collapse"><i
                        class="la la-user"></i><span>Quản lý Người dùng</span></a>
                <ul id="dropdown-user"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/user*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/user/list') ? 'active' : '' }}"
                           href="/admin/user/list">Danh sách người dùng</a></li>

                </ul>
            </li>
            {{-- End product--}}

        </ul>
        <!-- End Main Navigation -->
    </nav>
    <!-- End Side Navbar -->
</div>
