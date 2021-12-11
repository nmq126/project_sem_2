<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$blog->title}}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('user/img/logo.ico')}}" sizes="any" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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
    <link rel="stylesheet" href="{{asset('Hung/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/main.css')}}">

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
                <li><a href="/blog"> Blog Ăn Uống</a></li>
                <li class="active"> {{$blog->title}}</li>
            </ul>
        </div>
    </div>
</div>

<div><!-- blog-area start -->
    <div class="blog-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                        <div class="sidebar-search">
                            <form class="header-search-form" action="/blog" method="get">
                                <input id="search" type="search" name="keyword" class="input_text" value=""
                                       placeholder="Tìm Kiếm">
                                <button id="blogsearchsubmit" type="submit" class="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                            <h4 class="shop-sidebar-title">Bài Đăng Gần Đây</h4>
                            <div class="sidebar-list-style mt-20">
                                <ul>
                                    @foreach($blogs as $blog)
                                        <li><a href="/blog/{{$blog->id}}/details">{{$blog->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                            <h4 class="shop-sidebar-title">Tags</h4>
                            <div class="shop-tags mt-25">
                                <ul>
                                    <li><a href="/blogs/news/tagged/bouquet" class="">Món Ăn</a></li>
                                    <li><a href="/blogs/news/tagged/joy" class="">Đồ Uống</a></li>
                                    <li><a href="/blogs/news/tagged/event" class="">Địa Điểm</a></li>
                                    <li><a href="/blogs/news/tagged/gift" class="">Nấu Ăn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="blog-details-wrapper">
                        <div class="blog-img mb-20">
                            <img
                                src="{{$blog->image}}"
                                alt="Lorem ipsum dolor amet">
                        </div>
                        <div class="blog-content">
                            <h2>{{$blog->title}}</h2>
                            <div class="blog-date-categori">
                                <ul>
                                    <li><i class="fa fa-user"></i> {{$blog->author}}</li>
                                    <li>
                                        <i class="fa fa-calendar"></i> {{$blog->created}}
                                    </li>
                                </ul>
                            </div>
                            {!!$blog->details !!}
                        </div>
                        <div class="social-network text-center">
                            <ul class=" "
                                data-permalink="https://fudink.myshopify.com/blogs/news/lorem-ipsum-dolor-amet">
                                <li>
                                    <a class="facebook" target="_blank"
                                       href="//www.facebook.com/sharer.php?u=https://fudink.myshopify.com/blogs/news/lorem-ipsum-dolor-amet"
                                       title="Share on Facebook" tabindex="0"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="twitter" target="_blank"
                                       href="//twitter.com/share?text=Lorem%20ipsum%20dolor%20amet&amp;url=https://fudink.myshopify.com/blogs/news/lorem-ipsum-dolor-amet;source=webclient"
                                       title="Share on Twitter" tabindex="0"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a class="instagram" target="_blank"
                                       href="//pinterest.com/pin/create/button/?url=https://fudink.myshopify.com/blogs/news/lorem-ipsum-dolor-amet&amp;media=http://cdn.shopify.com/s/files/1/0037/1818/5030/articles/blog-5_1024x1024.jpg?v=1537012565&amp;description=Lorem%20ipsum%20dolor%20amet"
                                       title="Share on Pinterest" tabindex="0"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a class="dribbble" target="_blank"
                                       href="//plus.google.com/share?url=https://fudink.myshopify.com/blogs/news/lorem-ipsum-dolor-amet"
                                       title="Share on Google+" tabindex="0"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="review">
                            <div class="fb-comments" data-href="http://127.0.0.1:8000/blog/{{$blog->id}}/details"
                                 data-width="100%"
                                 data-numposts="10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-area end -->
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
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=980205812730468&autoLogAppEvents=1"
        nonce="tratXySK"></script>

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
