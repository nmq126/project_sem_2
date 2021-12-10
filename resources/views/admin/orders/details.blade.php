@php $total = 0
@endphp
@extends('admin.layout.master')
@section('title', 'Order Details | Admin')
@section('style')
<style>
    .mt-0{

    }
    .mt-0 span{
   margin-left: 5px

    }
</style>
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h1 class="page-header-title">Chi tiết đơn hàng</h1>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/orders">Orders</a></li>
                        <li class="breadcrumb-item active">Detail</li>
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
                    <div class="table-responsive">
                        <h3 class="pb-2 font-weight-bold">Đơn hàng : #{{$orders->id}}</h3>
             <div class="container">
                 <div class="content-left">
                     <p><strong>Tài khoản: </strong> {{$orders->user->email}}</p>

                     <p><strong>Tạo lúc: </strong> {{$orders->created_at->format('H:i:s d/m/Y')}}</p>
                    <p><strong>Cập nhật lúc: </strong> {{$orders->updated_at->format('H:i:s d/m/Y')}}</p>
                    <p><strong>Xóa lúc: </strong> {{ $orders->deleted_at != null ? $orders->deleted_at->format('H:i:s d/m/Y') : 'Chưa cập nhật'}}</p>
                    <div style="position: relative" class="d-flex mt-0">
                   <form action="/admin/orders/change" method="GET" name="status">
                    <input type="hidden" name="id" value="{{$orders->id}}">
                        <p><strong>Status:</strong> </p>
                        <select style="width: 200px;position: absolute;left:80px;bottom:5px;border:2px solid black" class="form-control" name="status" >
                            <option value="0" {{ $orders->status == '0' ? 'selected' : '' }} disabled>Chờ thanh toán</option>
                            <option value="1" {{ $orders->status == '1' ? 'selected' : '' }}>Chờ xác nhận </option>
                            <option value="2" {{ $orders->status == '2' ? 'selected' : '' }}>Đang xử lý</option>
                            <option value="3" {{ $orders->status == '3' ? 'selected' : '' }}>Đang giao hàng</option>
                            <option value="4" {{ $orders->status == '4' ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="-2" {{ $orders->status == '-2' ? 'selected' : '' }}>Đã Hủy</option>
                       </select>
                    </form>
                    </div>
                 </div>
                 <div class="content-right">
                    <p><strong>Người nhận: </strong> {{$orders->ship_name}}</p>
                    <p><strong>Số điện thoại: </strong> {{$orders->ship_phone}}</p>
                    <p><strong>Địa chỉ: </strong> {{$orders->ship_address}}</p>
                    <p><strong>Ghi chú: </strong> {{$orders->ship_note != null ? $orders->ship_note : 'Không có'}}</p>
                 </div>
             </div>
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr class="text-center">
                                <th>Image</th>
                                <th>Name</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders-> orderDetails as $orderDetail)
                                <tr class="text-center">
                                    <td>
                                        <img width="100px" height="100px" src="{{$orderDetail->product->thumbnail}}"
                                             alt="">
                                    </td>
                                    <td>{{$orderDetail->product->name}}</td>
                                    <td>{{\App\Helpers\Helper::formatVnd($orderDetail->unit_price)}} đ</td>
                                    <td>{{$orderDetail->quantity}}</td>
                                    <td>{{\App\Helpers\Helper::formatVnd($orderDetail->unit_price * $orderDetail->quantity)}} đ</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h3 class="font-weight-bold text-right mr-5 mt-2">
                           Tổng: {{\App\Helpers\Helper::formatVnd($totalPrice)}} đ</h3>
                    </div>
                    <div class="text-right mt-5">
                        <a href="/admin/orders"><button class="btn btn-primary">Quay lại</button></a>
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
    <!-- End Page Vendor Js -->
    <!-- Begin Page Snippets -->
    <script src="/assets/js/components/tables/tables.js"></script>
    <!-- End Page Snippets -->
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script>
        $("select[name=status]").change(function(){
            $( "form[name=status]" ).submit();
        });
        $(document).ready(function () {
            $(document).on('click', '#update', function (e) {
                e.preventDefault();
                let orderId = {{$orders->id}};
                let status;
                switch ($('#status').val()) {
                    case 'Success':
                        status = 2;
                        break;
                    case 'Waiting':
                        status = 1;
                        break
                    case 'Failed':
                        status = 0;
                        break;
                }
                let data = {
                    _token: "{{ csrf_token() }}",
                    'status': status
                }
                $.ajax({
                    type: 'PUT',
                    url: '/admin/orders/' + orderId + '/update',
                    data: data,
                    dataType: 'json',
                    success: function () {
                        $('#show-status').html('');
                        switch (status) {
                            case 0:
                                $('#show-status').html('<span style="width:100px;"><span class="badge-text badge-text-small danger">Failed</span></span>');
                                break;
                            case 1:
                                $('#show-status').html('<span style="width:100px;"><span class="badge-text badge-text-small info">Waiting</span></span>');
                                break;
                            case 2:
                                $('#show-status').html('<span style="width:100px;"><span class="badge-text badge-text-small success">Success</span></span>');
                        }
                    }
                });
            });
        })
    </script>
@endsection
