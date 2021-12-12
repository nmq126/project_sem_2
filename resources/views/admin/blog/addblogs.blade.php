@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="/assets/css/product/product.css">
        @endsection
@section('title', 'Thêm Blog | Admin')
@section('breadcrumb')
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Thêm Blog </h2>
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
                    <h4>Thêm mới sản phẩm</h4>
                </div>
                <div class="widget-body">
                    <form class="form-horizontal" action="/admin/blog/create" name="product-form" method="post">
                        @csrf
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Tiêu đề</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Nhập tiêu đề"
                                       name="title">
                    
                            </div>
                        </div>         <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Tên tác giả</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="tên tác giả"
                                       name="author">
                              
                            </div>
                        </div>

            

                    

                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Mô tả</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Mô tả ngắn về sản phẩm"
                                       name="description">
                                       @error('description')
                                       <div class="text-danger">* {{ $message }}</div>
                                       @enderror
                            </div>
                        </div>

               
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label  id="thumbnail_upload_widget" class="col-lg-3 form-control-label">Ảnh <i class="fas fa-plus-circle"></i></label>
         
                            <div class="col-lg-9">
                                <div id="preview-img">
                 
                                </div>
                                <input type="hidden" class="form-control"
                                       placeholder="Enter avatar"
                                       name="thumbnail">
                     
                            </div>
                        </div>

                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">Chi tiết</label>
                            <div class="col-lg-9">
                                <textarea type="text" class="form-control" id="editor" rows="25" placeholder="Chi tiết sản phẩm"
                                       name="detail">
                                </textarea>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">Tạo mới</button>
                       
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
        function deleteByToken(cloud_name, token) {
            $.ajax({
                url: "https://api.cloudinary.com/v1_1/" + cloud_name + "/delete_by_token",
                method: 'POST',
                data: {
                    token: token
                },
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                } //default là xmlhttprequest
            }).done(function (data) {
                console.log("dc ban");
            }).fail(function (data) {
                console.log("ko dc ban");
            })
        }
    </script>

    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script type="text/javascript">
        var i = 0;
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: 'nmq126',
                uploadPreset: 'jkyvknsj'
            },
            function (error, result) {
                if (!error && result && result.event === "success") {
                    console.log('Done! Here is the image info: ', result.info.secure_url);
                    document.forms['product-form']['thumbnail'].value += result.info.secure_url + ',';
                    var imgTag = document.getElementById('preview-img');
                    imgTag.innerHTML +=
                        `<span class = "img-upload" style="position: relative">
                            <button id="button_${i}" class="cls_btn" data-token="${result.info.delete_token}" data-url="${result.info.secure_url}" type="button" style="position: absolute; right: 0px"><span>x</span></button>
                            <img style="width: 150px" src="${result.info.secure_url}" alt="" class="img-thumbnail mr-2">
                         </span>`;
                    var doButtonPress = function (id, delete_token, secure_url) {
                        deleteByToken('nmq126', delete_token);//xoa anh tren cloudinary
                        $("#" + id).parent().remove();//xoa div
                        //sua lai value thumbnail
                        var array_thumbnail = document.forms['product-form']['thumbnail'].value.split(',');
                        array_thumbnail.pop();
                        var new_array_thumbnail = array_thumbnail.filter(item => item != secure_url);
                        if (new_array_thumbnail.length > 0) {
                            document.forms['product-form']['thumbnail'].value = new_array_thumbnail.join(',') + ',';
                        } else {
                            document.forms['product-form']['thumbnail'].value = "";
                        }
                    }
                    $('.cls_btn').click(function () {
                        doButtonPress(this.id, this.getAttribute('data-token'), this.getAttribute('data-url'));
                    });
                    i += 1;
                }
            }
        )
        document.getElementById("thumbnail_upload_widget").addEventListener("click", function () {
            myWidget.open();
        }, false);
    </script>
{{--    <!-- Begin ckeditor -->--}}
    <script src="https://cdn.ckeditor.com/4.17.1/standard-all/ckeditor.js"></script>
{{--    <!-- End ckeditor -->--}}
    <script>
        CKEDITOR.replace('editor', {
            removeButtons: 'PasteFromWord'
        });
        // ClassicEditor
        //     .create( document.querySelector( '#editor' ) )
        //     .catch( error => {
        //         console.error( error );
        //     } );
    </script>
@endsection

