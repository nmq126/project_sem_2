@extends('admin.layout.master')
@section('title', 'Update Ingredient | Admin')
@section('breadcrumb')
<div class="row">
<div class="page-header">
<div class="d-flex align-items-center">
<h2 class="page-header-title">Cập nhật nguyên liệu</h2>
<div>
<ul class="breadcrumb">

<li class="breadcrumb-item"><a href="/admin/product/list/ingredient">Quay lại</a></li>

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
<h4>Thay đổi nguyên liệu</h4>


</div>

<div class="widget-body">
<form class="form-horizontal" action="/admin/ingredient/update/{{$ingrendient->id}}" name="product-form" method="post">
@csrf
<div class="form-group row d-flex align-items-center mb-5">
<label class="col-lg-3 form-control-label">Id</label>
<div class="col-lg-9">
{{$ingrendient->id}}

</div>
</div>
<div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label">Tên</label>
    <div class="col-lg-9">
    <input type="text" value="{{$ingrendient->name}}" name="name" class="form-control" placeholder="Enter product name"
    name="name">
    </div>
    </div>

<div class="form-group row d-flex align-items-center mb-5">
<label class="col-lg-3 form-control-label">Mô tả</label>
<div class="col-lg-9">
<textarea  type="text" class="form-control" rows="7"
placeholder="Enter description"
name="description">{{$ingrendient->description}}</textarea>
</div>
</div>

<div class="text-right">
<button class="btn btn-gradient-01" type="submit">Thay đổi</button>

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

@endsection

