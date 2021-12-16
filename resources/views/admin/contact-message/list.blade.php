@extends('admin.layout.master')
@section('title', 'Quản lý tin nhắn | Admin')
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/css/paginate.css">
    <link rel="stylesheet" href="/assets/css/ingrendient/ingrendient.css">
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h1 class="page-header-title">Quản lý tin nhắn</h1>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/messages/list">Quản lý tin nhắn</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-body">

                    <form action="/admin/messages/list" method="GET">
                        <div class="page-header-title mb-1 search_box">
                            <div class="search">
                                <input type="text" name="name" class="search-input" placeholder="Tìm theo tên">
                                <i class="la la-search"></i>
                            </div>
                            <div class="search">
                                <input type="text" name="email" class="search-input" placeholder="Tìm theo email">
                                <i class="la la-search"></i>
                            </div>
                            <div class="filter">
                                <a href=""><button class="reset" name="reset" type="button"><i class="fas fa-sync-alt"></i>
                                </button></a>
                                <button name="search" type="submit">Lọc</button>
                            </div>
                        </div>
                        <div class="text-sm-center">
                            <label for="start-date" class="text-left mr-sm-5">Bắt đầu:
                                <input class="form-control" name="start_date"
                                       type="datetime-local"></label>
                            <label for="status" class="text-left mr-5">Trạng Thái:
                                <select class="form-control" name="status" id="status">
                                    <option value="0">Tất Cả</option>
                                    <option value="1">Chưa Đọc</option>
                                    <option value="2">Đã Đọc</option>
                                </select></label>
                            <label for="end-date" class="mt-2 text-left">Kết thúc:
                                <input class="form-control" name="end_date"
                                       type="datetime-local"></label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="widget has-shadow">
                @if (\Session::has('msg'))
                    <div class="alert alert-success" role="alert">
                        <span>{{\Session::get('msg')}}</span>
                    </div>
                @endif
                <div class="widget-body">
                    <div class="table-responsive">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h2 class="page-header-title mb-2">Danh sách tin nhắn:</h2>
                        <table class="table mb-0 text-center">
                            <thead>
                            <tr>
                                <th>Họ Tên</th>
                                <th class="status">Email</th>
                                <th class="checkout">Ngày Gửi</th>
                                <th class="name">Trạng Thái</th>
                                <th class="action">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="OrdersList">
                            @foreach($messages as $message)
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->sent_at}}</td>
                                @if($message->is_read == 1)
                                    <td>Đã Đọc</td>
                                @endif
                                @if($message->is_read == 0)
                                    <td>Chưa Đọc</td>
                                @endif
                                <td class="td-actions">
                                    <a href="/admin/messages/{{$message->id}}/details"><i class="la la-info"></i></a>
                                    <a href="#" class="delete"><i class="la la-close delete"  onclick="deleteItem({{$message->id}})"></i></a>
                                </td>
                                <div class="delete_order" id="delete_order_{{$message->id}}">
                                    <h2>Bạn có chắc muốn xóa tin nhắn này</h2>
            
                                    <a href="/admin/messages/delete/{{$message->id}}" id="delete-item">Delete</a>
            
                                    <a id="cancel-item" onclick="hideItem({{$message->id}})">Cancel</a>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Sorting -->
        </div>
    </div>
    <div class="widget has-shadow">
        <div class="widget-body">
            <?php
            // config
            $link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
            ?>

            @if ($messages->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($messages->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="first" href="{{ $messages->url(1) }}">First</a>
                    </li>
                    @if($messages->currentPage() > 1)
                        <li>
                            <a href="{{ $messages->url($messages->currentPage() - 1) }}">&#10094</a>
                        </li>
                    @endif
                    @for ($i = 1; $i <= $messages->lastPage(); $i++)
                        <?php
                        $half_total_links = floor($link_limit / 2);
                        $from = $messages->currentPage() - $half_total_links;
                        $to = $messages->currentPage() + $half_total_links;
                        if ($messages->currentPage() < $half_total_links) {
                            $to += $half_total_links - $messages->currentPage();
                        }
                        if ($messages->lastPage() - $messages->currentPage() < $half_total_links) {
                            $from -= $half_total_links - ($messages->lastPage() - $messages->currentPage()) - 1;
                        }
                        ?>
                        @if ($from < $i && $i < $to)
                            <li class="{{ ($messages->currentPage() == $i) ? ' active' : '' }}">
                                <a href="{{ $messages->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    @if($messages->currentPage() < $messages->lastPage())
                        <li>
                            <a href="{{ $messages->url($messages->currentPage() + 1) }}">&#10095</a>
                        </li>
                    @endif
                    <li class="{{ ($messages->currentPage() == $messages->lastPage()) ? ' disabled' : '' }}">
                        <a class="last" href="{{ $messages->url($messages->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
@endsection
@section('page-script')
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
    <script src="/assets/js/message/message.js"></script>
    <!-- End Page Snippets -->
@endsection
