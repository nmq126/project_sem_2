@extends('admin.layout.master')
@section('title', 'Danh sách đơn hàng | Admin')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/css/paginate.css">
    <link rel="stylesheet" href="/assets/css/ingrendient/ingrendient.css">
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h1 class="page-header-title">Danh sách đơn hàng</h1>
                <div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/orders">Quản lý đơn hàng</a></li>
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

       <form action="/admin/orders/search" method="GET">
                        <div class="page-header-title mb-1 search_box">
                        <div class="search">
                        <input type="text"name="key" class="search-input" placeholder="Tìm theo tên " >
                        <i class="la la-search"></i>
                     </div>
                     <div class="search">
                        <input type="text"name="address" class="search-input" placeholder="Tìm theo địa chỉ "  >
                        <i class="la la-search"></i>
                     </div>
                     <div class="search">
                        <input type="text"name="phone" class="search-input"  placeholder="Tìm theo số điện thoại">
                        <i class="la la-search"></i>
                     </div>
                        <div class="filter">
                            <button  name="excel" type="button"><i class="far fa-file-excel"></i></button>
                            <button class="reset" name="reset" type="button" ><i class="fas fa-sync-alt"></i></button>
                            <button  name="search" type="submit">Lọc</button>

                        </div>
                      </div>



                            <div class="text-sm-center">
                                <label for="status" class="text-left mr-5">Sản phẩm:
                                    <select class="form-control" name="product" id="product" >
                                        <option value="0">Tất cả</option>
              @foreach ($products as $product)
              <option value="{{$product->id}}">{{$product->name}}</option>
              @endforeach

                                    </select></label>
                                <label for="status" class="text-left mr-5">Trạng thái:
                                    <select class="form-control" name="statusz" id="status" >
                                        <option value="-1">Tất cả</option>
                                        <option value="0">Chờ thanh toán</option>
                                        <option value="1">Chờ xác nhận </option>
                                        <option value="2">Đang xử lý</option>
                                        <option value="3">Đang giao hàng</option>
                                        <option value="4">Hoàn thành</option>
                                        <option  value="-2">Đã Hủy</option>
                                    </select></label>
                                    <label for="status" class="text-left mr-5">Thanh toán:
                                        <select class="form-control " name="checkoutz" id="checkout">
                                            <option value="2">Tất cả</option>
                                            <option value="1">Đã thanh toán</option>
                                            <option value="0">Chưa thanh toán</option>

                                        </select></label>
                                <label for="start-date" class="text-left mr-sm-5">Ngày bắt đầu:
                                    <input class="form-control"  name="start_date"
                                           type="datetime-local"></label>
                                           <label for="status" class="text-left mr-5">Thùng rác:
                                            <select class="form-control" name="trash" id="trash" >
                                                <option value="0">Chưa xóa</option>
                                                <option value="1">Đã xóa</option>


                                            </select></label>

                                                 <label for="end-date" class="mt-2 text-left">Ngày kết thúc:
                                    <input class="form-control"  name="end_date"
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


                        <h2 class="page-header-title mb-2">Danh sách đơn hàng:</h2>


                        <table class="table mb-0 text-center">
                            <thead>
                            <tr>
                                <th class="id">Order ID</th>
                                 <th class="status">Trạng thái</th>
                                <th class="checkout">Thanh toán</th>
                                <th class="name">Người nhận</th>
                                <th class="address">Địa chỉ</th>
                                <th class="phone">Điện thoại</th>
                                <th class="money">Thành tiền</th>
                                <th class="date">Ngày tạo đơn</th>

                                <th class="action">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="OrdersList">
                            @foreach($orders as $order)
                     <form action="/admin/orders/change " method="GET" >
                        <input type="hidden" name="id" value={{$order->id}}>
                                    <tr>
                                    <td> <div class="id-item"><input type="checkbox" class="checkitem" value={{$order->id}} ><a href="/admin/orders/{{$order->id}}/detail">{{$order->id}}</a></div></td>
                                    <td>
                                        <select class="form-control" name="status" >
                                            <option value="0" {{ $order->status == '0' ? 'selected' : '' }} disabled>Chờ thanh toán</option>
                                            <option value="1" {{ $order->status == '1' ? 'selected' : '' }}>Chờ xác nhận </option>
                                            <option value="2" {{ $order->status == '2' ? 'selected' : '' }}>Đang xử lý</option>
                                            <option value="3" {{ $order->status == '3' ? 'selected' : '' }}>Đang giao hàng</option>
                                            <option value="4" {{ $order->status == '4' ? 'selected' : '' }}>Hoàn thành</option>
                                            <option value="-2" {{ $order->status == '-2' ? 'selected' : '' }}>Đã Hủy</option>
                                       </select>
                                    </td>
                                        @if($order->checkout == 1)
                                            <td><i class="fas fa-check"></i></td>
                                        @else
                                            <td><i class="fas fa-times"></i></td>
                                        @endif
                                    <td>{{$order->ship_name}}</td>
                                    <td>{{$order->ship_address}}</td>
                                    <td>{{$order->ship_phone}}</td>
                                    <td>{{\App\Helpers\Helper::formatVnd($order->total_price)}} đ</td>

                                    <td>{{$order->created_at->format('H:i:s d/m/Y')}}</td>

                                    <td class="td-actions">
                                        <a href="/admin/orders/{{$order->id}}/detail"><i
                                                class="la la-edit edit"></i></a>
                                        <a href="#" class="delete"><i class="la la-close delete" onclick="deleteItem({{$order->id}})"></i></a>
                                    </td>
                                </tr>
                     </form>
                     <div class="delete_order" id="delete_order_{{$order->id}}">
                                    <h2>Bạn có chắc muốn xóa đơn hàng này</h2>

                                    <a href="/admin/orders/delete/{{$order->id}}" id="delete-item">Delete</a>

                                    <a id="cancel-item" onclick="hideItem({{$order->id}})">Cancel</a>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h3 class="button-select">
                     <button>  <input type="checkbox" id="checkall">
                     <i id="sort-down" class="fas fa-sort-down"></i></button>

                    </h3>
                    <div class="select-all">
                        <ul class="select">
                            <li class="destroy">Hủy tất cả</li>
                            <li class="wait-all">Chờ xử lý tất cả</li>
                            <li class="process-all">Đang xử lý tất cả</li>
                            <li class="deliver-all">Đang vận chuyển tất cả</li>
                            <li class="done-all">Hoàn thành tất cả</li>
                            <li class="delete-all">Xóa tất cả</li>
                        </ul>
                    </div>
                        <h3 class="font-weight-bold text-right mr-5 mt-2">
                           Tổng tiền đơn hàng đã hoàn thành: {{\App\Helpers\Helper::formatVnd($total)}} đ</h3>
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

            @if ($orders->lastPage() > 1)
            <ul class="pagination">
        <li class="{{ ($orders->currentPage() == 1) ? ' disabled' : '' }}">
                              <a class="first" href="{{ $orders->url(1) }}">First</a>
                          </li>
                          @if($orders->currentPage() > 1)
                              <li  >
                                  <a href="{{ $orders->url($orders->currentPage() - 1) }}">&#10094</a>
                              </li>
                          @endif
                          @for ($i = 1; $i <= $orders->lastPage(); $i++)
                              <?php
                              $half_total_links = floor($link_limit / 2);
                              $from = $orders->currentPage() - $half_total_links;
                              $to = $orders->currentPage() + $half_total_links;
                              if ($orders->currentPage() < $half_total_links) {
                                  $to += $half_total_links - $orders->currentPage();
                              }
                              if ($orders->lastPage() -$orders->currentPage() < $half_total_links) {
                                  $from -= $half_total_links - ($orders->lastPage() - $orders->currentPage()) - 1;
                              }
                              ?>
                              @if ($from < $i && $i < $to)
                                  <li class="{{ ($orders->currentPage() == $i) ? ' active' : '' }}">
                                      <a href="{{ $orders->url($i) }}">{{ $i }}</a>
                                  </li>
                              @endif
                          @endfor
                          @if($orders->currentPage() < $orders->lastPage())
                              <li >
                                  <a  href="{{ $orders->url($orders->currentPage() + 1) }}">&#10095</a>
                              </li>
                          @endif
                          <li class="{{ ($orders->currentPage() == $orders->lastPage()) ? ' disabled' : '' }}">
                              <a class="last" href="{{ $orders->url($orders->lastPage()) }}">Last</a>
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
    <!-- End Page Snippets -->
<script src="/assets/js/order/order.js"></script>
@endsection
