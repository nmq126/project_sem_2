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
             <div class="container">
                 <div class="content-left">
                    <p><strong>Created At:</strong> {{$orders->created_at}}</p>
                    <p><strong>Update At:</strong> {{$orders->updated_at}}</p>
                    <p><strong>Delete At:</strong> {{$orders->deleted_at}}</p>
                    <div style="position: relative" class="d-flex mt-0">
                   <form action="/admin/orders/change" method="GET" name="status">
                    <input type="hidden" name="id" value="{{$orders->id}}">
                        <p><strong>Status:</strong> </p>
                        <select style="width: 150px;position: absolute;left:80px;bottom:5px;border:2px solid black" class="form-control" name="status" >
                            @if($orders->status == 2)
                            <option selected="selected" value="2">Đang xử lý</option>
                            @else
                            <option value="2">Đang xử lý</option>
                            @endif    
                          @if ($orders->status == 1)
                          <option selected="selected" value="1">Đợi </option>
                          @else
                          <option  value="1">Đợi </option>
                           @endif    
                           @if($orders->status == 3)
                            <option selected="selected" value="3">Giao hàng</option>
                           @else
                            <option value="3">Giao hàng</option>
                            @endif    
                            @if($orders->status == 4)
                            <option selected="selected" value="4">Hoàn thành</option>
                            @else
                            <option value="4">Hoàn thành</option>
                            @endif    
                            @if($orders->status == 0)
                            <option selected="selected" value="0">Chờ thanh toán</option>
                            @else
                            <option value="0">Chờ thanh toán</option>
                            @endif    
                            @if($orders->status == -2)
                            <option  selected="selected"  value="-2">Đã Hủy</option>
                            @else
                            <option  value="-2">Đã Hủy</option>
                            @endif      
                       </select>
                    </form>
                        {{-- @if($orders->status == 1)
                
                
                                <span>Đợi </span>
        
               
                    @endif
                    @if($orders->status == 0)
            
              
      

                            <span>Chờ thanh toán</span>
                  
   
        
                @endif
                    @if($orders->status == 2)
          
  
               
                            <span>Đang xử lý</span>
        

                    </span>
         
                @endif
                @if($orders->status == 3)

        
                        <span>Giao hàng</span>
            

            @endif
                    @if($orders->status == 4)
    
                             
                                    <span>Hoàn thành</span>
                            

     
                    @endif
                    @if($orders->status == -2)

                    
                                <span>Đã Hủy</span>
                      
                    @endif --}}

                    </div>
                 
         
                 </div>
                 <div class="content-right">
                    <p><strong>Customer Name:</strong> {{$orders->ship_name}}</p>
                    <p><strong>Phone:</strong> {{$orders->ship_phone}}</p>
                    <p><strong>Address:</strong> {{$orders->ship_address}}</p>
                    <p><strong>Note:</strong> {{$orders->ship_note}}</p>
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
                                    <td>{{$orderDetail->unit_price}}đ</td>
                                    <td>{{$orderDetail->quantity}}</td>
                                    <td>{{$orderDetail->unit_price * $orderDetail->quantity}}đ</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h3 class="font-weight-bold text-right mr-5 mt-2">
                           Tổng: {{$totalPrice}} đ</h3>
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
