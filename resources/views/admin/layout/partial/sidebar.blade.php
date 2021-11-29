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
                        class="la la-dropbox"></i><span>Quản lý sản phẩm</span></a>
                <ul id="dropdown-product"
                    class="collapse list-unstyled pt-0 {{request()->is('admin/product*') ? 'show' : ''}}">
                    <li><a class="{{ request()->is('admin/product/create') ? 'active' : '' }}"
                           href="/admin/product/create">Tạo mới</a></li>
                    <li><a class="{{ request()->is('admin/product/list') ? 'active' : '' }}"

                           href="/admin/product/list">List</a></li>
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
            {{-- End product--}}

        </ul>
        <!-- End Main Navigation -->
    </nav>
    <!-- End Side Navbar -->
</div>
