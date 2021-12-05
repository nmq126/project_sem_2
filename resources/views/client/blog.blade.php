<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Ăn Uống</title>
    <!-- Favicon -->
    <link rel="icon" href="user/img/food.svg" sizes="any" type="image/svg+xml">


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
    <link rel="stylesheet" href="user/css/home.css">
    <link rel="stylesheet" href="user/css/main.css">
    {{--    <link rel="stylesheet" href="user/css/responsive.css">--}}
</head>
<body>
<header id="nav">

    <a href="/home" class="logo"><i class="fas fa-utensils"></i>VietKitchen</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        @if(Auth::check())
            <a href="/my-account">
                <i class="fas fa-user"></i>
                {{ Auth::user()->email }}
            </a>
        @else
            <a href="/login"> Đăng nhập</a>
        @endif
        <a href="/products"> Cửa Hàng </a>
        <a href="/contact-us"> Liên Hệ </a>
        <a href="/blog"> Blog </a>
        <a href="/cart">
            <i class="fas fa-shopping-cart"></i>
            <span class='badge badge-warning' id='lblCartCount'>{{$totalQuantity}}</span>
        </a>
    </nav>
</header>
<div class="breadcrumb-area gray-bg mt-70">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="/home">Trang Chủ</a></li>
                <li class="active">Blog Ăn Uống</li>
            </ul>
        </div>
    </div>
</div>

<div class="blog-area ptb-100">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 col-xl-9 col-md-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-blog-wrapper mb-50">
                            <div class="blog-img mb-20">
                                <a href="/blogs/news/lorem-ipsum-dolor-amet">
                                    <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/articles/blog-5_1000x600_crop_center.jpg?v=1537012565"
                                         alt="Lorem ipsum dolor amet">
                                </a>
                                <div class="blog-date">
                                    <span>15 <br> Sep</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2><a href="/blogs/news/lorem-ipsum-dolor-amet">Lorem ipsum dolor amet</a></h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li><i class="fa fa-user"></i> Fudink Admin</li>
                                        <li>
                                            <a href="/blogs/news/lorem-ipsum-dolor-amet#comments">
                                                <i class="fa fa-comment"></i>
                                                7 comments
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="rte">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form , by injected humou, ors randomised words
                                        which don't look even sl If you are going to...</p>
                                </div>
                            </div>
                            <div class="blog-btn mt-30">
                                <a href="/blogs/news/lorem-ipsum-dolor-amet">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-blog-wrapper mb-50">
                            <div class="blog-img mb-20">
                                <a href="/blogs/news/spirit-of-adventure-rises">
                                    <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/articles/blog-4_1000x600_crop_center.jpg?v=1537012518"
                                         alt="Spirit of Adventure Rises">
                                </a>
                                <div class="blog-date">
                                    <span>15 <br> Sep</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2><a href="/blogs/news/spirit-of-adventure-rises">Spirit of Adventure Rises</a></h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li><i class="fa fa-user"></i> Fudink Admin</li>
                                        <li>
                                            <a href="/blogs/news/spirit-of-adventure-rises#comments">
                                                <i class="fa fa-comment"></i>
                                                0 comments
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="rte">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form , by injected humou, ors randomised words
                                        which don't look even sl If you are going to...</p>
                                </div>
                            </div>
                            <div class="blog-btn mt-30">
                                <a href="/blogs/news/spirit-of-adventure-rises">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-blog-wrapper mb-50">
                            <div class="blog-img mb-20">
                                <a href="/blogs/news/familiar-with-the-countless-1">
                                    <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/articles/blog-3_1000x600_crop_center.jpg?v=1537012474"
                                         alt="Familiar with the countless">
                                </a>
                                <div class="blog-date">
                                    <span>15 <br> Sep</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2><a href="/blogs/news/familiar-with-the-countless-1">Familiar with the countless</a>
                                </h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li><i class="fa fa-user"></i> HasTech Shopify Team</li>
                                        <li>
                                            <a href="/blogs/news/familiar-with-the-countless-1#comments">
                                                <i class="fa fa-comment"></i>
                                                0 comments
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="rte">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form , by injected humou, ors randomised words
                                        which don't look even sl If you are going to...</p>
                                </div>
                            </div>
                            <div class="blog-btn mt-30">
                                <a href="/blogs/news/familiar-with-the-countless-1">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-blog-wrapper mb-50">
                            <div class="blog-img mb-20">
                                <a href="/blogs/news/little-world-among-the-stalks">
                                    <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/articles/blog-2_1000x600_crop_center.jpg?v=1537012435"
                                         alt="Little world among the stalks">
                                </a>
                                <div class="blog-date">
                                    <span>15 <br> Sep</span>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2><a href="/blogs/news/little-world-among-the-stalks">Little world among the
                                        stalks</a></h2>
                                <div class="blog-date-categori">
                                    <ul>
                                        <li><i class="fa fa-user"></i> Fudink Admin</li>
                                        <li>
                                            <a href="/blogs/news/little-world-among-the-stalks#comments">
                                                <i class="fa fa-comment"></i>
                                                0 comments
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="rte">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form , by injected humou, ors randomised words
                                        which don't look even sl If you are going to...</p>
                                </div>
                            </div>
                            <div class="blog-btn mt-30">
                                <a href="/blogs/news/little-world-among-the-stalks">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination-total-pages">
                    <div class="pagination-style theme-default-pagination">
                        <nav class="pagination">
                            <ul class="">
                                <li class="disabled prev">
                                    <a>
                                        <span>Prev</span>
                                    </a>
                                </li>
                                <li><a class="active" href="">1</a></li>
                                <li>
                                    <a href="/blogs/news?page=2" title="">2</a>
                                </li>
                                <li><a class="prev-next next" href="/blogs/news?page=2">Next<i
                                            class="ion-ios-arrow-right"></i> </a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="total-pages">
                        <p>Showing 1 - 4 of 6 results </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-4">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="sidebar-search">
                        <form class="header-search-form" action="/search" method="get" role="search">
                            <input id="search" type="search" name="q" class="input_text" value=""
                                   placeholder="Search...">
                            <button id="blogsearchsubmit" type="submit" class="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                    <h4 class="shop-sidebar-title">Recent Post</h4>
                    <div class="sidebar-list-style mt-20">
                        <ul>
                            <li><a href="/blogs/news/lorem-ipsum-dolor-amet">Lorem ipsum dolor amet</a></li>
                            <li><a href="/blogs/news/spirit-of-adventure-rises">Spirit of Adventure Rises</a></li>
                            <li><a href="/blogs/news/familiar-with-the-countless-1">Familiar with the countless</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                    <h4 class="shop-sidebar-title">Tags</h4>
                    <div class="shop-tags mt-25">
                        <ul>
                            <li><a href="/blogs/news/tagged/bouquet" class="">Bouquet</a></li>
                            <li><a href="/blogs/news/tagged/event" class="">Event</a></li>
                            <li><a href="/blogs/news/tagged/gift" class="">Gift</a></li>
                            <li><a href="/blogs/news/tagged/joy" class="">joy</a></li>
                            <li><a href="/blogs/news/tagged/love" class="">love</a></li>
                        </ul>
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
                            <a href="/home" class="logo"><i class="fas fa-utensils"></i> VietKitchen</a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
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
                                <li><a href="my-account.html">Thông tin tài khoản</a></li>
                                <li><a href="#">Lịch sử đơn hàng</a></li>
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
                                <li>Địa chỉ: Hà Nội</li>
                                <li>Số điện thoại: (012) 800 456 789-987</li>
                                <li>Email: <a href="#">Info@example.com</a></li>
                            </ul>
                        </div>
                        <div class="mt-35 footer-title mb-22">
                            <h4>GIỜ MỞ CỬA</h4>
                        </div>
                        <div class="footer-time">
                            <ul>
                                <li>Mở cửa từ <span>8:00 AM</span> đến <span>18:00 PM</span></li>
                                <li>Saturday - Sunday: <span>Đóng cửa</span></li>
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
                        <p>&copy; 2021 <strong> Billy </strong> Made with <i class="fa fa-heart text-danger"></i> by <a
                                href="https://hasthemes.com/" target="_blank"><strong>HasThemes</strong></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#home" class="fas fa-angle-up" id="scroll-top" onclick="onScrollUp()"></a>
<script src="{{asset('user/js/main.js')}}"></script>
</body>
</html>
