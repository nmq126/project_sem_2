@extends('admin.layout.master')
@section('title', 'Messages Details | Admin')
@section('style')
    <style>
        .mt-0 span {
            margin-left: 5px

        }
    </style>
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h1 class="page-header-title">Chi tiết tin nhắn</h1>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/messages/list">Message</a></li>
                        <li class="breadcrumb-item active">Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-body">
                    <div class="table-responsive">
                        <h3 class="pb-2 font-weight-bold">Tin Nhắn : #{{$message->id}}</h3>
                        <div class="container">
                            <div class="content-left">
                                <p><strong>Họ Tên: </strong> {{$message->name}}</p>
                                <p><strong>Email: </strong> {{$message->email}}</p>
                                <p><strong>Ngày Gửi: </strong> {{$message->sent_at}}</p>
                                @if($message->is_read == 0)
                                    <p><strong>Trạng Thái: </strong> Chưa đọc
                                    </p>
                                @endif
                                @if($message->is_read == 1)
                                    <p><strong>Trạng Thái: </strong> Đã đọc
                                    </p>
                                @endif
                                <p><strong>Nội Dung: </strong> {{$message->content}}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="text-right mt-5">
                        <a href="/admin/messages/list">
                            <button class="btn btn-primary">Quay lại</button>
                        </a>
                    </div>
                </div>
            </div>
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
    <script src="/assets/js/components/tables/tables.js"></script>
@endsection
