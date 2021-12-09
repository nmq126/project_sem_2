@extends('admin.layout.master')
@section('title', 'Add Category | Admin')
@section('breadcrumb')
<div class="row">
<div class="page-header">
<div class="d-flex align-items-center">
<h2 class="page-header-title">Thêm món ăn</h2>
<div>
<ul class="breadcrumb">



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
<h4>Thêm món</h4>


</div>

<div class="widget-body">
<form class="form-horizontal" action="/admin/category/create" name="product-form" method="post">
@csrf
<div class="form-group row d-flex align-items-center mb-5">
<label class="col-lg-3 form-control-label">Tên</label>
<div class="col-lg-9">
<input type="text" name="name" class="form-control" placeholder="Nhập tên món"
name="name">
</div>
</div>
<div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label">Ảnh</label>
    <div class="col-lg-9">
    <input type="text" name="image" class="form-control" placeholder="Nhập tên URL "
    name="name">
    </div>
    </div>

<div class="form-group row d-flex align-items-center mb-5">
<label class="col-lg-3 form-control-label">Mô tả</label>
<div class="col-lg-9">
<textarea  type="text" class="form-control" rows="7"
placeholder="Nhập mô tả"
name="description"></textarea>
</div>
</div>

<div class="text-right">
<button class="btn btn-gradient-01" type="submit">Thêm mới</button>

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

