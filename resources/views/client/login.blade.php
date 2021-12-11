<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('user/img/favicon.ico')}}" sizes="any" type="image/svg+xml">
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
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- firebase stuff -->
    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SFXE2CTQ1D"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-SFXE2CTQ1D');
    </script>
</head>
<body class="bg-white">
<div class="container-fluid no-padding h-100">
    <div class="row flex-row h-100 bg-white">
        <!-- Begin Left Content -->
        <div class="col-xl-8 col-md-6 no-padding">
            <div class="elisyam-bg background-07">
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
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <h3 class="text-center font-weight-bold">Đăng Nhập</h3>
                <form method="post" action="/login" name="login-form" id="login-form">
                    @csrf
                    <input type="hidden" name="device_token" id="device_token">
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
                    <div class="text-left pl-4">
                        <a href="" style="font-size: 15px">Quên mật khẩu ?</a>
                    </div>
                </div>
                <div class="sign-btn text-center">
                    <button form="login-form" type="submit" class="btn btn-lg btn-gradient-01">
                        Đăng Nhập
                    </button>
                </div>
                <div class="register" style="font-size: 15px">
                    Bạn chưa có tài khoản?
                    <br>
                    <a class="badge badge-success" href="/register">Đăng Ký</a>
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

{{--    Firebase stuff--}}
<script src="{{ asset('js/firebase.js') }}"></script>
</body>
</html>
