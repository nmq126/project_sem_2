@extends('admin.layout.master')
@section('title', 'List Product | Admin')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="/assets/css/product/list.css">
    <link rel="stylesheet" href="/assets/css/datatables/datatables.min.css">
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title"></h2>
                <div>
                    <ul class="breadcrumb">
         
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
            <div class="widget has-shadow" >
                <div class="widget-body ">
              <form action="/admin/product/list/search" method="GET">
                  <div class="search">
                    <div class="filter">
                        <button class="reset" name="reset" type="button" ><i class="fas fa-sync-alt"></i></button>
                        <button type="submit">Lọc</button>
                    </div>
<div class="select">
    <label for="status" class="text-left mr-5">Trạng thái:
        <select class="form-control" name="status" >
            <option value="-1">Tất cả</option>
<option value="1">Còn hàng</option>
<option value="0">Hết hàng</option>

        </select></label>
        <label for="status" class="text-left mr-5">Giảm giá:
            <select class="form-control" name="discount" >
                <option value="-1">Tất cả</option>
                <option value="0">0%</option>
                <option value="10">10%</option>
                <option value="20">20%</option>
                <option value="30">30%</option>
                <option value="40">40%</option>
                <option value="50">50%</option>
                <option value="60">60%</option>
                <option value="70">70%</option>
                <option value="80">80%</option>
                <option value="90">90%</option>
            </select></label>
            <label for="status" class="text-left mr-5">Độ phổ biến:
                <select class="form-control" name="isFeatured" >
                    <option value="-1">Tất cả</option>      
                     <option value="0">Không phổ biến</option>      
                     <option value="1">Phổ biến</option>
                </select></label>
                <label for="status" class="text-left mr-5">Món:
                    <select class="form-control" name="category" >
                        <option value="-1">Tất cả</option>
 @foreach ($categorys as $category)
 <option value="{{$category->id}}">{{$category->name}}</option>
 @endforeach
                    </select></label>
</div>
<div class="input-search">
    <div class="search-item">
        <input type="text"name="name" class="search-input"  placeholder="Tìm tên sản phẩm">
        <i class="la la-search"></i>
 
</div>
<div class="search-item">
    <input type="number"name="min" class="search-input"  placeholder="Tìm theo giá bắt đầu">
    
    <i class="la la-search"></i>

</div>
<div class="search-item">
    <input type="number" name="max" class="search-input"  placeholder="Tìm theo giá kết thúc">
    <i class="la la-search"></i>

</div>
                  </div>
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
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>Danh sách các sản phẩm</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th> ID</th>
                                <th>Tên Sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Giá</span></th>
                                <th>Giảm giá</th>
                                <th>Phổ biến</th>
                                <th>Món</th>
                                <th>Nguyên liệu</th>
                                <th>Ảnh</th>
                                <th>Mô tả</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                      
                      
               @foreach ($products as $product)
               <tr>
                   <td> <div class="id-item"><input type="checkbox" class="checkitem"value={{$product->id}}>{{$product->id}}</div></td>
                   <td>{{$product->name}}</td>
        
                   @if ($product->status==1)
                   <td>Còn hàng</td>
            @else
            <td>Hết hàng</td>
            @endif
                   <td>{{$product->price}}đ</td>
                   <td>{{$product->discount}}%</td>
            
                   @if ($product->isFeatured==1)
                   <td><i class="fas fa-eye"></i></td>
            @else
            <td><i class="fas fa-eye-slash"></i></td>
            @endif
                   <td>{{$product->category->name}}</td>
                   <td>{{$product->ingredient->name}}</td>
                   <td><img src="{{$product->thumbnail}}" alt=""></td>
                   <td class="description">{{$product->description}}</td>
                   <td class="td-actions">
                    <a href="#"><i class="la la-edit edit"></i></a>
                    <a href="#" class="delete"><i class="la la-close delete"></i></a>
                </td>
            </tr>
            <div id="delete_order">
                <h2>Bạn có chắc muốn xóa sản phẩm này</h2>
        
                <a href="/admin/product/delete/{{$product->id}}"id="delete-item">Delete</a>
        
                <a id="cancel-item">Cancel</a>
            </div>
               @endforeach
                      
                            </tbody>
                        </table>
                    </div>
                    <h3 class="button-select">
                        <button>  <input type="checkbox" id="checkall"> 
                        <i id="sort-down" class="fas fa-sort-down"></i></button>
                      
                       </h3>
                       <div class="select-all">
                           <ul class="select">
                               <li class="destroy">Hủy tất cả</li>
                               <li class="stock-all"> Còn hàng</li>
                               <li class="unstock-all">Hết hàng</li>
                               <li class="popular-all">Phổ biến</li>
                               <li class="unpopular-all">Không phổ biến</li>
                           </ul>
                       </div>
                </div>
            </div>
            <!-- End Export -->
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
    <script src="/assets/js/product/product.js"></script>
    <!-- End Page Snippets -->
@endsection

