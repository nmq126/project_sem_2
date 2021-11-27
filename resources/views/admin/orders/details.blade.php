@php $total = 0
@endphp
@extends('admin.layout.master')
@section('title', 'Order Details | Admin')
@section('style')
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h1 class="page-header-title">Order Detail</h1>
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
                        <h3 class="pb-2 font-weight-bold">Order ID: {{$orders->id}}</h3>
                        <p><strong>Created At:</strong> {{$orders->created_at}}</p>
                        <p><strong>Customer Name:</strong> {{$orders->ship_name}}</p>
                        <p><strong>Address:</strong> {{$orders->ship_address}}</p>
                        <div class="d-flex mt-0">
                            <p class="pr-2"><strong>Status: </strong></p>
                            <div id="show-status">
                                @if($orders->status == 1)
                                    <span style="width:100px;"><span class="badge-text badge-text-small info">Waiting</span></span>
                                @endif
                                @if($orders->status == 2)
                                    <span style="width:100px;"><span
                                            class="badge-text badge-text-small success">Success</span></span>
                                @endif
                                @if($orders->status == 0)
                                    <span style="width:100px;"><span
                                            class="badge-text badge-text-small danger">Failed</span></span>@endif
                            </div>
                            <select class="form-control-sm w-auto ml-2" id="status">
                                <option @if($orders -> status == 0)
                                        selected="selected"
                                    @endif>Failed
                                </option>
                                <option @if($orders -> status == 2)
                                        selected="selected"
                                    @endif>Success
                                </option>
                                <option @if($orders -> status == 1)
                                        selected="selected"
                                    @endif>Waiting
                                </option>
                            </select>
                            <button class="btn btn-dark btn-sm ml-2 align-items-center pb-1" style="height: 27px" id="update">Change Status</button>
                        </div>
                        <p><strong>Note:</strong> {{$orders->ship_note}}</p>
                        <h3 class="font-weight-bold mt-2 text-center">Cart: </h3>
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
                            @foreach($orders -> orderDetails as $orderDetail)
                                <tr class="text-center">
                                    <td>
                                        <img width="100px" height="100px" src="{{$orderDetail-> product -> thumbnail}}"
                                             alt="">
                                    </td>
                                    <td>{{$orderDetail-> product -> name}}</td>
                                    <td>${{$orderDetail->unit_price}}</td>
                                    <td>{{$orderDetail->quantity}}</td>
                                    <td>${{$orderDetail->unit_price * $orderDetail->quantity}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h3 class="font-weight-bold text-right mr-5 mt-2">
                            Total: ${{$totalPrice}}</h3>
                    </div>
                    <div class="text-right mt-5">
                        <a href="/admin/orders"><button class="btn btn-primary">Back</button></a>
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
