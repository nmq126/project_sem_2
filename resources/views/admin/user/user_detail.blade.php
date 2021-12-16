@extends('admin.layout.master')
@section('title', 'Chi tiết người dùng | Admin')
@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/css/paginate.css">
    <link rel="stylesheet" href="/assets/css/paginate.css">
    <link rel="stylesheet" href="/assets/css/ingrendient/ingrendient.css">
    <link rel="stylesheet" href="/assets/css/user/user_detail.css">


@endsection
@section('breadcrumb')
<div class="widget has-shadow">
    <div class="widget-body">
        <div class="back"><a href="/admin/user/list"><i class="fas fa-chevron-circle-left"></i></a></div>
<div class="content_user">
    <div class="image">
        <img src="{{$user->defaultThumbnail}}" alt="">
    </div>
<div class="infomation">
    <div class="name">
    <span class="forcus">{{$profile->name}}</span>
    <span >ID:<span class="forcus-item">{{$user->id}}</span></span>
    </div>

<div class="card-user">
    <div class="item-user">
<span >Email:</span>
<span  class="forcus-item">{{$user->email}}</span>
    </div>
    <div class="item-user">
        <span  >Điện thoại:</span>
        <span class="forcus-item">{{$user->phone}}</span>
            </div>
            <div class="item-user">
                <span >Sinh nhật:</span>
                <span class="forcus-item">{{$profile->dob}}</span>
                    </div>
</div>
</div>
<div class="search user">
   
    <i class="fas fa-search"></i>
    <input type="text" placeholder="Tìm kiếm email"  name="key" >
    <div class="result">
    </div>
 
</div>
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
                    <th class="id">Order ID</th>
                     <th class="status">Trạng thái</th>
                    <th class="checkout">Thanh toán</th>
                    <th class="name">Tên khách hàng</th>
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
                        <td> <div class="id-item"><input type="checkbox" class="checkitem"value={{$order->id}} ><a href="/admin/orders/{{$order->id}}/detail">{{$order->id}}</a></div></td>
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
                            <a href="/admin/orders/update/{{$order->id}}"><i
                                    class="la la-edit edit"></i></a>
                            <a href="#" class="delete"><i class="la la-close delete"  onclick="deleteItem({{$order->id}})"></i></a>
                        </td>
                    </tr>
         </form>
     
                    <div class="delete_order" id="delete_order_{{$order->id}}">
                        <h2>Bạn có chắc muốn xóa sản phẩm này</h2>

                        <a href="/admin/orders/delete/{{$order->id}}"id="delete-item">Delete</a>

                        <a id="cancel-item" onclick="hideItem({{$order->id}})">Cancel</a>
                    </div>
                @endforeach
                </tbody>
            </table>
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


    </div>
    </div>

@endsection
@section('page-script')

    <script src="/assets/js/user/user_detail.js"></script>
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
