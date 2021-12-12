@extends('admin.layout.master')
@section('title', 'Dashboard | Admin')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
    <link rel="stylesheet" href="/assets/css/ingrendient/ingrendient.css">
    <link rel="stylesheet" href="/assets/css/dashboard/dashboard.css">
     <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection
@section('breadcrumb')
<div class="widget has-shadow">

    <div class="widget-body">
<div class="parameter">
    <div  class="pramater-item">
        <div class="pramater-content">
        <div class="title">
            <i class="fas fa-users"></i>
            <span>Thành viên</span>
        </div>
        <div class="number">{{$usercount}}</div>
    </div>
</div>
<div  class="pramater-item">
    <div class="pramater-content">
    <div class="title">
        <i class="fas fa-receipt"></i>
        <span>Đơn hàng</span>
    </div>
    <div class="number">{{$count}}</div>
</div>
</div>
<div  class="pramater-item">
    <div class="pramater-content">
    <div class="title">
        <i class="fab fa-product-hunt"></i>
        <span>Sản phẩm</span>
    </div>
    <div class="number">{{$products}}</div>
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
                        <h1 class="page-header-title">Doanh  thu 3 tháng gần đây </h1>
                    </div>
                </div>
            </div>
            <div class="widget has-shadow">
                <div class="widget-body">
          

                        <div class="page-header-title mb-1 search_box">
   
                            <div class="text-sm-center">
                                <label for="start-date" class="text-left mr-sm-5">Ngày bắt đầu:
                                    <input class="form-control" id="datePicker" name="start_date"
                                           type="date"></label>
                                      
                                           
                                                 <label for="end-date" class="mt-2 text-left">Ngày kết thúc:
                                    <input class="form-control"value="<?php echo date('Y-m-d'); ?>"  name="end_date"
                                           type="date"></label>
                                     
                            </div>
                        <div class="filter">
                          
                            <button class="reset" name="reset" type="button" ><i class="fas fa-sync-alt"></i></button>
                            <button  name="search" type="button">Lọc</button>
                
                        </div>
                      </div>
           
                      <div id="area-example" style="height: 250px;"></div>
               

                 
            </div>
        </div>
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h1 class="page-header-title">Doanh thu theo các năm </h1>
                </div>
            </div>
        </div>
            <div class="widget has-shadow">

             
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      <div id="chart" style="height: 250px;"></div>

    </div>
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h1 class="page-header-title">Thống kê về các sản phẩm </h1>
            </div>
        </div>
    </div>
        <div class="widget has-shadow">

         
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="morris-donut-inverse">
                    <a >  <div id="donut-example" style="width:80%"></div></a>
                    <div class="donut">
                        <h3 class="page-header-title">Bảng xếp hạng sản phẩm </h3>

                        <table>
                            <tr>
                              <th>Tên sản phẩm</th>
                              <th>Số lượng</th>
                            </tr>
                       
                                
                            
                       @foreach ($result as $val)
                       <tr>
                        <td><a href="/admin/orders/search?product={{$val->id}}">{{$val->name}}</a></td>
                        <td>{{$val->quantity}}</td>
                      </tr>
                       @endforeach
                       <tr>
                        <td>Tổng sản phẩm</td>
                        <td>{{$totalquantity}}</td>
                      </tr>
                 
                            </table>
                    </div>

                  </div>
           
</div>

@endsection
@section('page-script')
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    
var colorDanger = "#FF1744";
Morris.Donut({
  element: 'donut-example',
  resize: true,
  colors: [
    "#878BB6",
    "#4ACAB4",
    "#FF8153",
   "#FFEA88",
    '#26C6DA',
    '#00BCD4',
    '#00ACC1',
    '#0097A7',
    '#00838F',
    '#006064'
  ],
  resize: true,
  formatter: function (value) { return (value) + '%'; },
  data: [
<?php echo $chartData ?>
  ]
});

    /*
 * Play with this code and it'll update in the panel opposite.
 *
 * Why not try some of the options above?
 */
var chartArea = new Morris.Line({
  element: 'area-example',

  xkey: 'tw',
  ykeys: ['price', 'money'],
  hideHover:'auto',

  labels: ['Thành tiền', 'lợi nhuận']
});
  var chart =  new Morris.Bar({

  element: 'chart',

  xkey: 'year',
hideHover:'auto',
  ykeys: ['price','money'],


  labels: ['thành tiền','lợi nhuận'],
});
</script>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="/assets/js/dashboard/dashboard.js"></script>
@endsection
