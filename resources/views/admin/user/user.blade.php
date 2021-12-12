@extends('admin.layout.master')
@section('title', 'User | Admin')
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/css/paginate.css">
    <link rel="stylesheet" href="/assets/css/user/user.css">


@endsection
@section('breadcrumb')
    <div class="widget has-shadow">
        <form action="/admin/user/filter" method="GET">

            <div class="parameter">

                <div class="search">
                    <div class="logo"><i class="fas fa-user"></i></div>

                    <input name="key" type="text" placeholder="Tìm kiếm">
        </form>
    </div>

    <div class="status">
        <div class="menu"><i class="fas fa-chevron-left"></i></div>

        <div class="itemstatus1">
            <span class="titlestatus">Admin</span>
            <label class="switch">
                <input type="checkbox" type="checkbox" value="1" name="admin">
                <span class="slider"></span>
            </label>
        </div>

        <div class="itemstatus">
            <span class="titlestatus">Đang hoạt động</span>
            <label class="switch">
                <input type="checkbox" value="1" name="status">
                <span class="slider"></span>
            </label>
        </div>
        <div class="itemstatus">
            <span class="titlestatus">Bị khóa</span>
            <label class="switch">
                <input type="checkbox" value="0" name="status">
                <span class="slider"></span>
            </label>
        </div>
        <div class="itemstatus">
            <span class="titlestatus">Đã xóa</span>
            <label class="switch">
                <input type="checkbox" value="1" name="delete">
                <span class="slider"></span>
            </label>
        </div>
        <button>Submit</button>
        </form>
        <p id="text"></p>
    </div>
    </div>

    </div>
@endsection
@section('content')


    <!-- Sorting -->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">

            </div>
        </div>
    </div>
    <div class="widget has-shadow">
        <div class="widget-body">
            <table class="table mb-0 text-center">
                <thead>
                <tr>
                    <th> ID</th>

                    <th>Email</th>

                    <th>Trạng thái</th>
                    <th>Điện thoại</th>
                    <th>Chức vụ</th>


                    <th class="action">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td><span id="user_id">{{$user->id}}</span> <img src="{{$user->getDefaultThumbnailAttribute()}}"
                                                                         alt=""></td>
                        <td>{{$user->email}}</td>
                        <form action="/admin/user/update" method="GET" name="statuschange">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            @if ($user->status  == 1)
                                <input type="hidden" value="0" name="status">
                                <td id="lock"><i class="fas fa-circle"></i>Không khóa</td>
                            @else
                                <input type="hidden" value="1" name="status">
                                <td id="lock"><i class="fas fa-lock"></i> Khóa</td>
                            @endif
                        </form>
                        <td>{{$user->phone}}</td>
                        <td>
                            <form action="/admin/user/update" method="GET" name="change">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <select class="form-control" name="level">
                                    <option value="1" {{ $user->level == '1' ? 'selected' : '' }}>Admin</option>
                                    <option value="0" {{ $user->level == '0' ? 'selected' : '' }}>Người dùng</option>

                                </select>
                            </form>
                        </td>
                        <td class="td-actions">

                            <a href="#" class="delete"><i class="la la-close delete"></i></a>
                        </td>
                    </tr>
                    <div id="delete_order">
                        <h2>Bạn có chắc muốn xóa người dùng này</h2>

                        <a href="/admin/user/delete/{{$user->id}}" id="delete-item">Delete</a>

                        <a id="cancel-item">Cancel</a>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>





    </div>
    </div>

    <div class="widget has-shadow">
        <div class="widget-body">
            <?php
            // config
            $link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
            ?>

            @if ($users->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($users->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="first" href="{{ $users->url(1) }}">First</a>
                    </li>
                    @if($users->currentPage() > 1)
                        <li>
                            <a href="{{ $users->url($users->currentPage() - 1) }}">&#10094</a>
                        </li>
                    @endif
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        <?php
                        $half_total_links = floor($link_limit / 2);
                        $from = $users->currentPage() - $half_total_links;
                        $to = $users->currentPage() + $half_total_links;
                        if ($users->currentPage() < $half_total_links) {
                            $to += $half_total_links - $users->currentPage();
                        }
                        if ($users->lastPage() - $users->currentPage() < $half_total_links) {
                            $from -= $half_total_links - ($users->lastPage() - $users->currentPage()) - 1;
                        }
                        ?>
                        @if ($from < $i && $i < $to)
                            <li class="{{ ($users->currentPage() == $i) ? ' active' : '' }}">
                                <a href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($users->currentPage() < $users->lastPage())
                        <li>
                            <a href="{{ $users->url($users->currentPage() + 1) }}">&#10095</a>
                        </li>
                    @endif
                    <li class="{{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }}">
                        <a class="last" href="{{ $users->url($users->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>


@endsection
@section('page-script')

    <script src="/assets/js/user/user.js"></script>
    <!-- Begin Page Vendor Js -->
    <script src="/assets/vendors/js/datatables/datatables.min.js"></script>
    <script src="/assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
    <script src="/assets/vendors/js/datatables/jszip.min.js"></script>
    <script src="/assets/vendors/js/datatables/buttons.html5.min.js"></script>
    <script src="/assets/vendors/js/datatables/pdfmake.min.js"></script>
    <script src="/assets/vendors/js/datatables/vfs_fonts.js"></script>
    <script src="/assets/vendors/js/datatables/buttons.print.min.js"></script>
    <script src="/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
    <script src="/assets/vendors/js/app/app.min.js"></script>
    <!-- End Page Vendor Js -->
    <!-- Begin Page Snippets -->
    <script src="/assets/js/components/tables/tables.js"></script>
    <!-- End Page Snippets -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

@endsection
