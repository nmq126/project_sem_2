@extends('admin.layout.master')
@section('title', 'Update Order | Admin')
@section('breadcrumb')
<div class="row">
<div class="page-header">
<div class="d-flex align-items-center">
<h2 class="page-header-title">Mã đơn hàng {{$order->id}}</h2>
<div>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href=""><i class="ti ti-home"></i></a></li>
<li class="breadcrumb-item"><a href="#">Components</a></li>
<li class="breadcrumb-item active">Forms Basic</li>
</ul>
</div>
</div>
</div>
</div>
@endsection
@section('content')
<div class="row flex-row">
<div class="col-12">
<!-- Form -->
<div class="widget has-shadow">
@if (\Session::has('msg'))
<div class="alert alert-success" role="alert">
<span>{{\Session::get('msg')}}</span>
</div>


@endif

<div class="widget-header bordered no-actions d-flex align-items-center">
<h4>Thay đổi thông tin đơn hàng</h4>


</div>

<div class="widget-body">
<form class="form-horizontal" action="/admin/orders/update/{{$order->id}}" name="product-form" method="post">
@csrf
<div class="form-group row d-flex align-items-center mb-5">
<label class="col-lg-3 form-control-label">Tên người nhận</label>
<div class="col-lg-9">
<input type="text"  class="form-control" placeholder="Nhập tên người nhận"
name="ship_name" value="{{$order->ship_name}}">
</div>
</div>
<div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label">Địa chỉ người nhận</label>
    <div class="col-lg-9">
    <input type="text"class="form-control" placeholder="Nhập địa chỉ người nhận"
    name="ship_address" value="{{$order->ship_address}}">
    </div>
    </div>
    <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-3 form-control-label">Số điện thoại người nhận</label>
        <div class="col-lg-9">
        <input type="text"  class="form-control" placeholder="Nhập số điện thoại người nhận"
        name="ship_phone" value="{{$order->ship_phone}}">
        </div>
        </div>
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label">Tổng số tiền đơn hàng</label>
            <div class="col-lg-9">
           {{$order->total_price}}đ
            </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label"> Thanh toán</label>
                <div class="col-lg-9">
                    @if($order->checkout == 1)
                        <select class="form-control " name="checkout">
                 
                            <option selected="selected" value="1">Đã thanh toán</option>
                            <option value="0">Chưa thanh toán</option>
          
                        </select>
                @endif
                @if($order->checkout == 0)
                    <select class="form-control " name="checkout">
             
                        <option value="1">Đã thanh toán</option>
                        <option selected="selected" value="0">Chưa thanh toán</option>
      
                    </select>
            @endif
                </div>
                </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">Trạng thái đơn hàng</label>
                <div class="col-lg-9">
                    @if($order->status == 1)
                    <td>
                        <select class="form-control" name="status" >
                            <option value="2">Đang xử lý</option>
                            <option selected="selected" value="1">Đợi </option>
                            <option value="3">Giao hàng</option>
                            <option value="4">Hoàn thành</option>
                            <option value="0">Chờ thanh toán</option>
                            <option  value="-2">Đã Hủy</option>
                        </select>
                @endif
                @if($order->status == 0)
                    <select class="form-control" name="status" >
                        <option value="2">Đang xử lý</option>
                        <option  value="1">Đợi </option>
                        <option value="3">Giao hàng</option>
                        <option value="4">Hoàn thành</option>
                        <option selected="selected" value="0">Chờ thanh toán</option>
                        <option  value="-2">Đã Hủy</option>
                    </select>
            @endif
                @if($order->status == 2)
                    <select class="form-control" name="status" >
                        <option selected="selected" value="2">Đang xử lý</option>
                        <option  value="1">Đợi </option>
                        <option value="3">Giao hàng</option>
                        <option value="4">Hoàn thành</option>
                        <option  value="0">Chờ thanh toán</option>
                        <option  value="-2">Đã Hủy</option>
                    </select>
                </span>
            @endif
            @if($order->status == 3)
                <select class="form-control" name="status" >
                    <option  value="2">Đang xử lý</option>
                    <option  value="1">Đợi </option>
                    <option selected="selected" value="3">Giao hàng</option>
                    <option value="4">Hoàn thành</option>
                    <option  value="0">Chờ thanh toán</option>
                    <option  value="-2">Đã Hủy</option>
                </select>
        @endif
                @if($order->status == 4)
                            <select class="form-control" name="status" >
                                <option  value="2">Đang xử lý</option>
                                <option  value="1">Đợi </option>
                                <option  value="3">Giao hàng</option>
                                <option selected="selected" value="4">Hoàn thành</option>
                                <option  value="0">Chờ thanh toán</option>
                                <option  value="-2">Đã Hủy</option>
                            </select>
                @endif
                @if($order->status == -2)
                        <select class="form-control" name="status" >         
                            <option  value="2">Đang xử lý</option>
                            <option  value="1">Đợi </option>
                            <option  value="3">Giao hàng</option>
                            <option value="4">Hoàn thành</option>
                            <option  value="0">Chờ thanh toán</option>
                            <option  selected="selected"  value="-2">Đã Hủy</option>
                        </select>
                @endif
                </div>
                </div>
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label">Mô tả</label>
            <div class="col-lg-9">
            <textarea  type="text" class="form-control" rows="7"
            placeholder="Nhập mô tả"
            name="ship_note">{{$order->ship_note}}</textarea>
            </div>
            </div>

<div class="text-right">
<button class="btn btn-gradient-01" type="submit">Thay đổi</button>
<a class="btn btn-shadow" href="/admin/orders">Lại</a> 
</div>
</form>
</div>
</div>
<!-- End Form -->
</div>
</div>
@endsection
@section('page-script')
<!-- Begin Page Vendor Js -->
<script src="/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
<script src="/assets/vendors/js/datepicker/moment.min.js"></script>
<script src="/assets/vendors/js/datepicker/daterangepicker.js"></script>
<script src="/assets/vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->
<!-- Begin Page Snippets -->
<script src="/assets/js/components/datepicker/datepicker.js"></script>
<!-- End Page Snippets -->
<script>


</script>
@endsection

