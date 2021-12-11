<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng ký ngay</title>
    <link rel="icon" href="{{asset('user/img/favicon.ico')}}" sizes="any" type="image/svg+xml">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- Favicon -->

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
    <link rel="stylesheet" href="user/css/register-login.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="bg-white">
<div class="container-fluid no-padding h-100">
    <div class="row flex-row h-100 bg-white">
        <!-- Begin Left Content -->
        <div class="col-xl-8 col-md-6 no-padding">
            <div class="elisyam-bg background-08">
                <div class="elisyam-overlay overlay-06"></div>
                <div class="authentication-col-content mx-auto text-center">
                    <h1 class="gradient-text-01">
                        <a href="/home" class="logo" style="color: white"><img src="{{asset('user/img/logo.png')}}" width="100px" alt="">VietKitchen</a>
                    </h1>
                    <span class="description">
                                Luôn đem tới cho bạn những món ăn - đồ uống ngon nhất với giá cả ưu đãi.
                            </span>
                </div>
            </div>
        </div>
        <!-- End Left Content -->
        <!-- Begin Right Content -->
        <div class="col-xl-4 col-md-6 my-auto no-padding">
            <!-- Begin Form -->
            <div class="authentication-form mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Có lỗi xảy ra trong quá trình đăng ký:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3 class="text-center font-weight-bold">Đăng Ký</h3>
                <form method="post" action="/register" name="register-form" id="register-form">
                    @csrf
                    <div class="group material-input">
                        <input type="text" name="email">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="email">Email</label>
                    </div>
                    <div class="group material-input">
                        <input type="text" name="phone">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="phone">Số điện thoại</label>
                    </div>
                    <div class="group material-input">
                        <input type="password" name="password" id="password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="pwd">Mật khẩu</label>
                    </div>
                    <div class="group material-input">
                        <input type="password" name="confirmPassword">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="confirmPassword">Nhập lại mật khẩu</label>
                    </div>
                </form>
                <div class="row">
                    <div class="col text-center">
                        <span>Bằng việc đăng ký, bạn đã đồng ý với chúng tôi về</span>
                        <a href="">Điều khoản dịch vụ & Chính sách bảo mật</a>
                    </div>
                </div>
                <div class="sign-btn text-center">
                    <button form="register-form" type="submit" class="btn btn-lg">
                        Tạo Tài Khoản
                    </button>
                </div>
                <div class="register">
                    Bạn đã có tài khoản?
                    <br>
                    <a class="badge badge-success" href="/login">Đăng Nhập</a>
                </div>
            </div>
            <!-- End Form -->
        </div>
        <!-- End Right Content -->
    </div>
    <!-- End Row -->
</div>
<!-- End Container -->
<!-- Begin Vendor Js -->
<script src="assets/vendors/js/base/jquery.min.js"></script>
<script src="assets/vendors/js/base/core.min.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="assets/vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script>
    $(document).ready(function () {
        //validate form
        $("form[name=register-form]").validate({
            rules: {
                email:{
                    required: true,
                    email: true
                },
                phone:{
                    required: true,
                    digits: true
                },
                password:{
                    required: true,
                    minlength: 8,
                    maxlength: 16
                },
                "confirmPassword":{
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                email:{
                    required:  "Vui lòng nhập vào email",
                    email: "Email không đúng định dạng"
                },
                phone:{
                    required:  "Vui lòng nhập số điện thoại",
                    digits:  "Số điện thoại không đúng định dạng",
                },
                password:{
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu chứa ít nhất 8 ký tự",
                    maxlength: "Mật khẩu chứa nhiều nhất 16 ký tự",
                },
                confirmPassword:{
                    required: "Vui lòng xác nhận mật khẩu",
                    equalTo: "Mật khẩu xác nhận không đúng"
                },
            },

        });
    })

</script>
</body>
</html>
