@extends('admin.layout.master')
@section('title', 'Orders List | Admin')
@section('style')
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h1 class="page-header-title">Orders List</h1>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/orders">Orders</a></li>
                        <li class="breadcrumb-item active">List</li>
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
                        <form class="mb-3" action="/admin/orders/search" method="get">
                            <h2 class="page-header-title mb-3">Filter:</h2>
                            <div class="text-sm-center">
                                <label for="status" class="text-left mr-5">Status:
                                    <select class="form-control 100" id="status" name="status">
                                        <option>All</option>
                                        <option>Success</option>
                                        <option>Waiting</option>
                                        <option>Failed</option>
                                    </select></label>
                                <label for="start-date" class="text-left mr-sm-5">Start Date:
                                    <input class="form-control w-100" id="start-date" name="start-date"
                                           type="datetime-local"></label>
                                <label for="end-date" class="mt-2 text-left">End Date:
                                    <input class="form-control w-100" id="end-date" name="end-date"
                                           type="datetime-local"></label>
                            </div>
                            <div class="text-center mt-2">
                                <button class="btn btn-info mb-3" type="submit" style="width: 200px">Search</button>
                                <a href="/admin/orders"><button class="btn btn-secondary mb-3" style="width: 200px">Refresh</button></a>
                            </div>
                        </form>
                        <h2 class="page-header-title mb-2">Orders List:</h2>
                        <table id="sorting-table" class="table mb-0 text-center">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Created At</th>
                                <th><span style="width:100px;">Status</span></th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="OrdersList">
                            @foreach($orders as $order)
                                <tr>
                                    <td><span class="text-primary">{{$order->id}}</span></td>
                                    <td>{{$order->ship_name}}</td>
                                    <td>{{$order->ship_address}}</td>
                                    <td>{{$order->ship_phone}}</td>
                                    <td>{{$order->created_at}}</td>
                                    @if($order->status == 1)
                                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">Waiting</span></span>
                                        </td>
                                    @endif
                                    @if($order->status == 2)
                                        <td><span style="width:100px;"><span
                                                    class="badge-text badge-text-small success">Success</span></span>
                                        </td>
                                    @endif
                                    @if($order->status == 0)
                                        <td><span style="width:100px;"><span class="badge-text badge-text-small danger">Failed</span></span>
                                        </td>
                                    @endif
                                    <td class="td-actions">
                                        <a href="{{url('admin/orders/'.$order->id.'/detail')}}"><i
                                                class="la la-edit edit"></i></a>
                                        <a href="#"><i class="la la-close delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h3 class="font-weight-bold text-right mr-5 mt-2">
                            Total Revenue: ${{$total}}</h3>
                    </div>
                </div>
            </div>
            <!-- End Sorting -->
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
@endsection
