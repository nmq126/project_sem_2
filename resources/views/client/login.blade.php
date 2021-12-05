<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập tài khoản</title>
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
<!-- Begin Preloader -->
<div id="preloader">
    <div class="canvas">
        <img src="user/img/loader.gif" alt="">
    </div>
</div>
</div>
<!-- End Preloader -->
<!-- Begin Container -->
<div class="container-fluid no-padding h-100">
    <div class="row flex-row h-100 bg-white">
        <!-- Begin Left Content -->
        <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
            <div class="elisyam-bg background-07">
                <div class="elisyam-overlay overlay-06"></div>
                <div class="authentication-col-content mx-auto">
                    <h1 class="gradient-text-01">
                        Đăng nhập
                    </h1>
                    <span class="description">
                                Đăng nhập tài khoản để mua được bát bún nhìn không giống như này lắm.
                            </span>
                </div>
            </div>
        </div>
        <!-- End Left Content -->
        <!-- Begin Right Content -->
        <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
            <!-- Begin Form -->
            <div class="authentication-form mx-auto">
                <div class="logo-centered">
                    <a href="">
                        <img src="" alt="logo">
                    </a>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <h3>Đăng nhập</h3>
                <form method="post" action="/login" name="login-form" id="login-form">
                    @csrf
                    <div class="group material-input">
                        <input type="text" name="email">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="email">Email</label>
                    </div>
                    <div class="group material-input">
                        <input type="password" name="password">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="email">Mật khẩu</label>
                    </div>
                </form>
                <div class="row">
                    <div class="col text-left">
                        <a href="">Quên mật khẩu</a>
                    </div>
                </div>
                <div class="sign-btn text-center">
                    <button form="login-form" type="submit" class="btn btn-lg btn-gradient-01">
                        Đăng nhập
                    </button>
                </div>
                <div class="register">
                    Bạn chưa có tài khoản?
                    <br>
                    <a class="badge badge-success" href="/register">Đăng ký</a>
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
        $("form[name=login-form]").validate({
            rules: {
                email:{
                    required: true,
                    email: true
                },
                password:{
                    required: true,
                    minlength: 8,
                    maxlength: 16
                },
            },
            messages: {
                email:{
                    required:  "Vui lòng nhập vào email",
                    email: "Email không đúng định dạng"
                },
                password:{
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu chứa ít nhất 8 ký tự",
                    maxlength: "Mật khẩu chứa nhiều nhất 16 ký tự"
                },
            }
        });
    })

</script>
</body>
</html>
