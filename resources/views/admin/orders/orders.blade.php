@extends('admin.layout.master')
@section('title', 'Orders List | Admin')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/css/ingrendient/ingrendient.css">
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
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                @if (\Session::has('msg'))
                <div class="alert alert-success" role="alert">
                    <span>{{\Session::get('msg')}}</span>
                  </div>
    @endif
                <div class="widget-body">
                    <div class="table-responsive">
                      
                            <h2 class="page-header-title mb-3">Filter:</h2>
                            <div class="text-sm-center">
                                <label for="status" class="text-left mr-5">Status:
                                    <select class="form-control 100" name="status">
                                        <option value="-1">All</option>
                                        <option value="2">Success</option>
                                        <option value="1">Waiting</option>
                                        <option value="0">Failed</option>
                                    </select></label>
                                <label for="start-date" class="text-left mr-sm-5">Start Date:
                                    <input class="form-control w-100"  name="start-date"
                                           type="datetime-local"></label>
                                <label for="end-date" class="mt-2 text-left">End Date:
                                    <input class="form-control w-100"  name="end-date"
                                           type="datetime-local"></label>
                            </div>
                            <div class="text-center mt-2">
                                <button class="btn btn-info mb-3"name="search" type="button" style="width: 200px">Search</button>
                              <button class="btn btn-secondary mb-3"name="reset" type="button" style="width: 200px">Refresh</button>
                            </div>
        
                        <h2 class="page-header-title mb-2">Orders List:</h2>
                        <div class="page-header-title mb-3 search">
                        
                            <input type="text" class="search-input"  >
                            <i class="la la-search "></i>
                          </div>
                          
                        <table class="table mb-0 text-center">
                            <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Price</th>
                                <th>Check out</th>
                                <th>Created At</th>
                                <th><span style="width:200px;">Status</span></th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="OrdersList">
                            @foreach($orders as $order)
                                <tr>
                                    <td><span class="text-primary"><input type="checkbox" class="checkitem"value={{$order->id}} style="margin-right: 20px"> {{$order->id}}</span></td>
                                    <td>{{$order->ship_name}}</td>
                                    <td>{{$order->ship_address}}</td>
                                    <td>{{$order->ship_phone}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td>{{$order->checkout}}</td>
                                    <td>{{$order->created_at}}</td>
                                    @if($order->status == 1)
                                        <td><span style="width:100px;"><span class="badge-text badge-text-small info">Waiting</span></span>
                                        </td>
                                    @endif
                                    @if($order->status == 0)
                                    <td><span style="width:100px;"><span class="badge-text badge-text-small info">WaitForCheckout</span></span>
                                    </td>
                                @endif
                                    @if($order->status == 2)
                                    <td><span style="width:100px;"><span class="badge-text badge-text-small info">Processing</span></span>
                                    </td>
                                @endif
                                @if($order->status == 3)
                                <td><span style="width:100px;"><span class="badge-text badge-text-small info">Delivering</span></span>
                                </td>
                            @endif
                                    @if($order->status == 4)
                                        <td><span style="width:100px;"><span
                                                    class="badge-text badge-text-small success">Done</span></span>
                                        </td>
                                    @endif
                                    @if($order->status == -2)
                                        <td><span style="width:100px;"><span class="badge-text badge-text-small danger">Cancel</span></span>
                                        </td>
                                    @endif
                                    <td class="td-actions">
                                        <a href="{{url('admin/orders/'.$order->id.'/detail')}}"><i
                                                class="la la-edit edit"></i></a>
                                        <a href="#" class="delete"><i class="la la-close delete"></i></a>
                                    </td>
                                </tr>
                                <div id="delete_order">
                                    <h2>Are You Sure You Want To Delete This</h2>
                            
                                    <a href="/admin/orders/delete/{{$order->id}}"id="delete-item">Delete</a>
                            
                                    <a id="cancel-item">Cancel</a>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h3 class="font-weight-bold text-left mr-5 mt-1">
                       <input type="checkbox" id="checkall">   <button name="checkall"style="background:none;border:none" type="button">Theo dõi bảng</button>
                       <button name="deleteall"style="background:none;border:none;color:#b56186" type="button">Xóa bỏ</button>
                       <div id="delete_message">
                        <h2>Are You Sure You Want To <strong style="color: red">Destroy</strong> This</h2>
                
                        <a  id="delete-all">Delete</a>
                
                        <a id="cancel">Cancel</a>
                    </div>
             
                    </h3>
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
<script src="/assets/js/order/order.js"></script>
@endsection
