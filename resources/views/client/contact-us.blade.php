<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liên Hệ</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('user/img/favicon.ico')}}" sizes="any" type="image/svg+xml">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Montserrat:400,500,600,700", "Noto+Sans:400,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    {{--    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">--}}

    <link rel="stylesheet" href="Hung/css/bootstrap.min.css">
    <link rel="stylesheet" href="Hung/css/style.css">
    <link rel="stylesheet" href="Hung/css/responsive.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="Hung/js/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="user/css/main.css">
    <link rel="stylesheet" href="user/css/home.css">
{{--    <link rel="stylesheet" href="user/css/responsive.css">--}}

<!-- firebase stuff -->
    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SFXE2CTQ1D"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-SFXE2CTQ1D');
    </script>
</head>
<body>

<header id="nav">

    <a href="/home" class="logo"><img src="user/img/logo.png" alt="">VietKitchen</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="/products"> Cửa Hàng</a>
        <a href="/contact-us"> Liên Hệ </a>
        <a href="/blog"> Blog </a>
        @guest
            <a href="/login"> Đăng nhập</a>
        @endguest
        <a href="/cart">
            <i class="fas fa-shopping-cart"></i>
            @if($totalQuantity !=0)
                <span class='badge badge-warning' id='lblCartCount'>{{ $totalQuantity }}</span>
            @endif
        </a>
        @auth
            <div class="notifications">
                <i class="fas fa-bell"></i>
                @if($number_noti !=0)
                    <span class='badge badge-warning' id='NotiCount'>{{ $number_noti }}</span>
                @endif
            </div>

            <div class="notification_dd">
                <ul class="notification_ul">
                    @if(!$notifications->isEmpty())
                        @foreach($notifications as $notification)
                            <li>
                                <a href="/my-account/order/id={{ $notification->order_id }}">
                                    <div class="notify_data">
                                        <div class="title">
                                            {{ $notification->title}}
                                        </div>
                                        <div class="sub_title">
                                            {{ $notification->sub_title }}
                                        </div>
                                    </div>
                                    @if($notification->read_at == null)
                                        <div class="notify_status">
                                            <i class="fas fa-circle"></i>
                                        </div>
                                    @endif
                                </a>

                            </li>
                        @endforeach
                        <li class="show_all">
                            <p>Xem tất cả</p>
                        </li>
                    @else
                        <li>
                            <div class="notify_data">
                                <div class="sub_title">
                                    Không có thông báo
                                </div>
                            </div>
                        </li>

                    @endif
                </ul>
            </div>
            <div class="user-profile">
                <div class="profile">
                    <img height="25px" src="{{ Auth::user()->DefaultThumbnail }}" alt="">
                </div>
                <div class="menu">
                    <ul>
                        <li>
                            <a href="/my-account">
                                <i class="fas fa-user"></i>
                                Người dùng
                            </a>
                        </li>
                        <li>
                            <a href="/my-account/logout">
                                <i class="fas fa-sign-out-alt"></i>
                                Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @endauth
    </nav>
</header>
<!-- header section ends -->
<div class="breadcrumb-area gray-bg mt-70">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="/home">Trang Chủ</a></li>
                <li class="active">Liên Hệ</li>
            </ul>
        </div>
    </div>
</div>
<div id="shopify-section-contact-form" class="shopify-section">
    <form method="post" action="/contact-us" id="contact-form" name="contact-form" accept-charset="UTF-8"
          class="contact-form">
        @csrf
        <div class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-message-wrapper">
                            <h4 class="contact-title">LIÊN HỆ</h4>
                            @if (session('success'))
                                <div class="alert alert-success text-center" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="contact-message">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input type="text" placeholder="Họ Tên" name="name"
                                                   id="name" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input type="email" placeholder="Địa Chỉ Email"
                                                   name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-form-style">
												<textarea placeholder="Nội Dung" class="custom-textarea"
                                                          name="content" id="content"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button class="submit btn-style text-center" type="submit">GỬI TIN NHẮN</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div id="shopify-section-contact-info" class="shopify-section">
    <div class="contact-area" id="section-contact-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-wrapper text-center mb-30">
                        <div class="contact-info-icon">
                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Địa Điểm</h4>
                            <p>8 Tôn Thất Thuyết</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-wrapper text-center mb-30">
                        <div class="contact-info-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Liên Hệ Với Chúng Tôi</h4>
                            <p>Mobile: 012 345 678</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-wrapper text-center mb-30">
                        <div class="contact-info-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Email</h4>
                            <p><a href="mailto: vietkitchen.hn@gmail.com"> vietkitchen.hn@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row map ml-10" style="margin-bottom: 60px">
    <div class="col-md-8 col-12 float-left mt-5">
        <div id="map"></div>
    </div>
    <div class="col-md-4 col-12 float-left address mt-5 pl-30">
        <h3>Địa Chỉ</h3>
        <div class="mt-md-4">
            <ul>
                <li>
                    <div class="store">
                        <h5>Vincom Nguyễn Chí Thanh</h5>
                        <p>Tầng 5, TTTM Vincom 54 Nguyễn Chí Thanh</p>
                    </div>
                </li>
                <li>
                    <div class="store">
                        <h5>Tràng Tiền Plaza</h5>
                        <p>Tầng 5, TTTM Tràng Tiền Plaza, 24 Hai Bà Trưng</p>
                    </div>
                </li>
                <li>
                    <div class="store">
                        <h5>Vincom Royal City</h5>
                        <p>72A Nguyễn Trãi</p>
                    </div>
                </li>
                <li>
                    <div class="store">
                        <h5>107 Quán Thánh</h5>
                    </div>
                </li>
                <li>
                    <div class="store mt-4">
                        <h5>8 Tôn Thất Thuyết</h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="footer-area black-bg-2 pt-70">
    <div class="footer-top-area pb-18">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-about mb-40">
                        <div class="footer-logo">
                            <a href="/home" class="logo"><img src="{{asset('user/img/logo.png')}}" width="70px" alt="">VietKitchen</a>
                        </div>
                        <p>Đến với chúng tôi, bạn sẽ luôn được tận hưởng những món ăn - đồ uống chất lượng nhất, ngon
                            nhất với giá cả ưu đãi, khuyến mại có một không hai.</p>
                        <div class="payment-img">
                            <a href="#">
                                <img src="Hung/img/products/payment.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-22">
                            <h4>THÔNG TIN</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="/about-us">Về Chúng Tôi</a></li>
                                <li><a href="#">Thông tin giao hàng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Điều khoản và điều kiện</a></li>
                                <li><a href="#">Dịch vụ khách hàng</a></li>
                                <li><a href="#">Chính sách hoàn trả</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 ps-md-5">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-22">
                            <h4>TÀI KHOẢN CỦA TÔI</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="/my-account">Thông tin tài khoản</a></li>
                                <li><a href="/my-account">Lịch sử đơn hàng</a></li>
                                <li><a href="wishlist.html">Ưa thích</a></li>
                                <li><a href="#">Hòm thư</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-22">
                            <h4>LIÊN LẠC VỚI CHÚNG TÔI</h4>
                        </div>
                        <div class="footer-contact">
                            <ul>
                                <li>Địa chỉ: 8A Tôn Thất Thuyết, Hà Nội</li>
                                <li>Số điện thoại: (012) 800 456 789-987</li>
                                <li>Email: <a href="#">vietkitchen.hn@gmail.com</a></li>
                            </ul>
                        </div>
                        <div class="mt-35 footer-title mb-22">
                            <h4>GIỜ MỞ CỬA</h4>
                        </div>
                        <div class="footer-time">
                            <ul>
                                <li>Mở cửa từ <span>8:00 AM</span> đến <span>22:00 PM</span> mọi ngày</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area border-top-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright text-center">
                        <p>&copy; 2021 <strong> VietKitchen </strong> được tạo nên với <i
                                class="fa fa-heart text-danger"></i> bởi <a
                                href="/about-us" target="_blank"><strong>Project Sem 2 Team</strong></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#home" class="fas fa-angle-up" id="scroll-top" onclick="onScrollUp()"></a>
<script src="user/js/contact-us.js"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAblZQML00gSAW3zLC8ilpsdtBGCfyKfo8&callback=initMap&libraries=&v=weekly"
    async
></script>
<script src="Hung/js/bootstrap.min.js"></script>
<script src="Hung/js/main.js"></script>
<script src="user/js/main.js"></script>

<script src="{{asset('Hung/js/jquery-1.12.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="{{ asset('js/firebase.js') }}"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61b4685f0461020e"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/61b469c580b2296cfdd12eda/1fmkbqbbe';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
<script>
    $(document).ready(function () {
        //validate form
        $("form[name=contact-form]").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                content: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Vui lòng nhập vào email!",
                    email: "Email không đúng định dạng"
                },
                name: {
                    required: "Vui lòng nhập tên của bạn!"
                },
                content: {
                    required: "Vui lòng nhập nội dung bạn muốn gửi!"
                }
            }
        });
    });
</script>
</body>
</html>
