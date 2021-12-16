    @extends('admin.layout.master')
        @section('title', 'List Category | Admin')
        @section('style')
        <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
        <link rel="stylesheet" href="/assets/css/ingrendient/ingrendient.css">
        @endsection
        @section('breadcrumb')
        <div class="row">
        <div class="page-header">
        <div class="d-flex align-items-center">
        <h2 class="page-header-title">Danh sách các món</h2>
        <div>
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="db-default.html"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="#">Components</a></li>
        <li class="breadcrumb-item active">Forms Basic</li>
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
        @if (\Session::has('msg'))
        <div class="alert alert-success" role="alert">
        <span>{{\Session::get('msg')}}</span>
        </div>
        @endif
        <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>Các món </h4>
        </div>

        <div class="widget-body">
        <div class="table-responsive">
        <table id="sorting-table" class="table mb-0">
        <thead>
        <tr>
    <th style="width: 150px"> ID</th>
    <th style="width: 180px"> Tên</th>
        <th>Mô tả</th>
        <th>Ảnh</th>
    <th style="width: 100px">Hành động</th>


        </tr>
        </thead>
        <tbody>
        @foreach ($ingrendient as $i)
        <tr>
        <td>{{$i->id}}</td>
        <td>{{$i->name}}</td>
        <td>{!!$i->description!!}</td>
        <td><img width="50px" height="50px" src="{{$i->thumbnail}}" alt=""></td>
        <td class="td-actions">
        <a href="/admin/category/update/{{$i->id}}"><i  class="la la-edit edit"></i></a>
        <a ><i  class="la la-close delete test_delete" onclick="message({{$i->id}})"></i></a>
        </td>
        </tr>
        <div class="delete_message" id="delete_message_{{$i->id}}">
        <h2>Bạn có chắc muốn xóa mục này</h2>

        <a href="/admin/category/delete/{{$i->id}}"  id="delete">Xóa</a>

        <a id="cancel" onclick="hide({{$i->id}})">Hủy</a>
        </div>
        @endforeach

        </tbody>
        </table>
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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function() {
      
                $("#cancel").click(function() {
                    hide();
                });
             
            });
    
            function message( id) {
                $("#delete_message_"+id).slideDown();
            }
    
            function hide(id) {
                $("#delete_message_"+id).slideUp();
            }
        </script>
        <!-- End Page Snippets -->
        @endsection

