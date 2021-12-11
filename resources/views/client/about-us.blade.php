<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Về Chúng Tôi | VietKitchen</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('user/img/favicon.ico')}}" sizes="any" type="image/svg+xml">   <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="{{asset('Hung/css/font-awesome.min.css')}}">

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
    <link rel="stylesheet" href="user/css/home.css">
    <link rel="stylesheet" href="user/css/main.css">
{{--    <link rel="stylesheet" href="user/css/responsive.css">--}}
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
                <li class="active">Về Chúng Tôi</li>
            </ul>
        </div>
    </div>
</div>

<div id="shopify-section-about-area" class="shopify-section mt-5">
    <div class="about-us-area" id="section-about-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-5">
                    <div class="overview-img text-center">
                        <a href="">
                            <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/files/about-us.jpg?v=1536387182
                    " alt="about">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 d-flex align-items-center">
                    <div class="overview-content-2">
                        <h2>Chào mừng tới <span>VietKitchen</span>!</h2>
                        <p class="peragraph-blog">Fudink Shop is a premium HTML template designed and develoved from
                            the ground up with the sole purpose of helping you create an astonishing, the beautiful
                            and user friendly website that will boost your product’s sales.</p>
                        <p>The theme design package provides a complete Magento theme set for your online store
                            according to your desired theme. This includes all Magento themes that are required for
                            your online store's successful implementation.</p>
                        <p>The theme design package provides a complete Magento theme set for your online store
                            according to your desired theme.</p>
                        <div class="overview-btn mt-45">
                            <a class="btn-style-2" href="/products">Mua Ngay!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="shopify-section-skill-work" class="shopify-section">
    <div class="skill-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="skill-wrapper">
                        <div class="section-border section-mrg-none mb-45">
                            <div class="section-title-wrap">
                                <h3 class="section-title section-bg-white">Our skills</h3>
                            </div>
                        </div>
                        <div class="skill">
                            <div class="progress">
                                <div class="lead">Marketing</div>
                                <div class="progress-bar wow fadeInLeft" data-progress="50%" style="width: 50%;"
                                     data-wow-duration="1.5s" data-wow-delay="1.2s"><span>50%</span></div>
                            </div>
                            <div class="progress">
                                <div class="lead">Wordpress Theme</div>
                                <div class="progress-bar wow fadeInLeft" data-progress="60%" style="width: 60%;"
                                     data-wow-duration="1.5s" data-wow-delay="1.2s"><span>60%</span></div>
                            </div>
                            <div class="progress">
                                <div class="lead">Shopify Theme</div>
                                <div class="progress-bar wow fadeInLeft" data-progress="70%" style="width: 70%;"
                                     data-wow-duration="1.5s" data-wow-delay="1.2s"><span>70%</span></div>
                            </div>
                            <div class="progress">
                                <div class="lead">UI & UX DESIGN</div>
                                <div class="progress-bar wow fadeInLeft" data-progress="80%" style="width: 80%;"
                                     data-wow-duration="1.5s" data-wow-delay="1.2s"><span>80%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="our-work-wrapper">
                        <div class="section-border section-mrg-none mb-45">
                            <div class="section-title-wrap">
                                <h3 class="section-title section-bg-white">Our Work</h3>
                            </div>
                        </div>
                        <div class="work-list">
                            <div class="single-work">
                                <div class="work-number"></div>
                                <div class="work-content">
                                    <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac
                                        mi</p>
                                </div>
                            </div>
                            <div class="single-work">
                                <div class="work-number"></div>
                                <div class="work-content">
                                    <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac
                                        mi</p>
                                </div>
                            </div>
                            <div class="single-work">
                                <div class="work-number"></div>
                                <div class="work-content">
                                    <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac
                                        mi</p>
                                </div>
                            </div>
                            <div class="single-work">
                                <div class="work-number"></div>
                                <div class="work-content">
                                    <h5>LOREM IPSUM DOLOR SIT AMET</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac
                                        mi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="shopify-section-team-member" style="margin-top: 50px; margin-bottom: 50px" class="shopify-section">
    <div class="team-area" id="section-team-member">
        <div class="container">
            <div class="section-border section-mrg-none mb-45">
                <div class="section-title-wrap">
                    <h3 class="section-title section-bg-white">Our Team</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-wrapper mb-30">
                        <div class="team-img">
                            <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/files/team-1_large.jpg?v=1536300260"
                                 alt="">
                            <div class="team-action">
                                <a class="action-plus facebook" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a class="action-heart twitter" title="Wishlist" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="action-cart instagram" href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Mr.Mike Banding</h4>
                            <span>Manager</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-wrapper mb-30">
                        <div class="team-img">
                            <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/files/team-3_large.jpg?v=1536300279"
                                 alt="">
                            <div class="team-action">
                                <a class="action-plus facebook" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a class="action-heart twitter" title="Wishlist" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="action-cart instagram" href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Mr.Peter Pan</h4>
                            <span>Developer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-wrapper mb-30">
                        <div class="team-img">
                            <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/files/team-2_large.jpg?v=1536300270"
                                 alt="">
                            <div class="team-action">
                                <a class="action-plus facebook" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a class="action-heart twitter" title="Wishlist" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="action-cart instagram" href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Ms.Sophia</h4>
                            <span>Designer</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team-wrapper mb-30">
                        <div class="team-img">
                            <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/files/team-4_large.jpg?v=1536300290"
                                 alt="">
                            <div class="team-action">
                                <a class="action-plus facebook" href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a class="action-heart twitter" title="Wishlist" href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="action-cart instagram" href="#">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                        <div class="team-content text-center">
                            <h4>Marcos Alonso</h4>
                            <span>Web Designer</span>
                        </div>
                    </div>
                </div>
            </div>
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
<script src="{{asset('user/js/main.js')}}"></script>

<script src="{{asset('Hung/js/jquery-1.12.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="{{ asset('js/firebase.js') }}"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61b4685f0461020e"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/61b469c580b2296cfdd12eda/1fmkbqbbe';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
