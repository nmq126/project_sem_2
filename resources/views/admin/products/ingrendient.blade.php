    @extends('admin.layout.master')
        @section('title', 'Add Ingrendient | Admin')
        @section('breadcrumb')
        <div class="row">
        <div class="page-header">
        <div class="d-flex align-items-center">
        <h2 class="page-header-title">Thêm mới nguyên liệu</h2>
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
        <h4>Thêm mới nguyên liệu</h4>


        </div>

        <div class="widget-body">
        <form class="form-horizontal" action="/admin/product/create/ingredient" name="product-form" method="post">
        @csrf
        <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-3 form-control-label">Name</label>
        <div class="col-lg-9">
        <input type="text" name="name" class="form-control" placeholder="Enter product name"
        name="name">
        </div>
        </div>


        <div class="form-group row d-flex align-items-center mb-5">
        <label class="col-lg-3 form-control-label">Description</label>
        <div class="col-lg-9">
        <textarea  type="text" class="form-control" rows="7"
        placeholder="Enter description"
        name="description"></textarea>
        </div>
        </div>

        <div class="text-right">
        <button class="btn btn-gradient-01" type="submit">Submit Form</button>
        <button class="btn btn-shadow" type="reset">Reset</button>
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
            CKEDITOR.replace( 'description' );

    </script>
        @endsection

