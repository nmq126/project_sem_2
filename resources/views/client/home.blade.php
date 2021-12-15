<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ | VietKitchen</title>
    <!-- Favicon -->
    <link rel="icon" href="user/img/favicon.ico" sizes="any" type="image/svg+xml">


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

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3 style="text-transform: capitalize">Đặt món nào cũng <span>FREESHIP</span></h3>
        <p style="font-size: 2rem"> Nhiều món ngon cho bạn thoải mái lựa chọn.</p>
        <a href="/products" class="btn" style="padding-bottom: 40px">Đặt hàng ngay</a>
    </div>

    <div class="image">
        <img src="user/img/images/home-img.png" alt="">
    </div>

</section>

<!-- home section ends -->

<!-- speciality section starts  -->

<section class="speciality" id="speciality">

    <h1 class="heading pb-5"><span>Danh mục </span>món ăn</h1>

    <div class="box-container">
        @foreach($categories as $category)
            <div class="box">
                <a href="/products?categories%5B%5D={{ $category->id }}">
                    <div class="content">
                        <img height="50px" src="{{ $category->thumbnail }}" alt="">
                        <h3>{{ $category->name }}</h3>
                        <p>{{ $category->description }}</p>
                    </div>
                </a>

            </div>
        @endforeach
    </div>
</section>

<!-- speciality section ends -->

<!-- popular section starts  -->

<section class="popular" id="popular">

    <h1 class="heading pt-5 pb-5"> Món ngon <span>khuyến mãi</span></h1>

    <div class="box-container">
        @foreach($discountProducts as $product)
            <div class="box">
                <span class="price"> -{{ $product->discount }}% </span>
                <img src="{{ $product->thumbnail  }}" alt="">
                <h3>{{ $product->name }}</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <a href="/products" class="btn" style="padding-bottom: 40px">Đặt hàng</a>
            </div>
        @endforeach


    </div>

</section>

<!-- popular section ends -->

<!-- steps section starts  -->

<div class="step-container pt-5 pb-5">

    <h1 class="heading">Đặt hàng cùng <span>VietKitchen</span></h1>

    <section class="steps">

        <div class="box">
            <img src="user/img/images/step-1.jpg" alt="">
            <p>Chọn những món ăn yêu thích</p>
        </div>
        <div class="box">
            <img src="user/img/images/step-2.jpg" alt="">
            <p>Vận chuyển nhanh, miễn phí</p>
        </div>
        <div class="box">
            <img src="user/img/images/step-3.jpg" alt="">
            <p>Thanh toán tiện lợi</p>
        </div>
        <div class="box">
            <img src="user/img/images/step-4.jpg" alt="">
            <p>Thưởng thức món ngon nóng hổi</p>
        </div>

    </section>

</div>

<!-- steps section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading pt-5 pb-5"> Khách hàng nói gì về <span>VietKitchen</span></h1>

    <div class="box-container">

        <div class="box">
            <img src="user/img/images/billie.jpg" alt="">
            <h3>Chị Billie người Việt gốc cây</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione
                vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="user/img/images/anne.jpg" alt="">
            <h3>Chị An nhà khu Mỹ Đình</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione
                vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="user/img/images/gal.jpg" alt="">
            <h3>Huê hậu người Do Thái</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione
                vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- gallery section starts  -->

<section style="padding: 0 1rem" class="gallery" id="gallery">


    <h1 class="heading pt-5 pb-5"><span> Gallery </span></h1>
    <div class="containerG">
        <div class="boxG a">
            <img
                src="https://res.cloudinary.com/dz0vbjbye/image/upload/v1638758438/home_page_gallery/lucas-hoang-Yb2Sb9bdgPk-unsplash_1_1_fg2ddy.jpg"
                alt="">
        </div>
        <div class="boxG b">
            <img
                src="https://res.cloudinary.com/dz0vbjbye/image/upload/v1638758594/home_page_gallery/ben-lei-ubBWnvrsARk-unsplash_e5xqkd.jpg"
                alt="">
        </div>
        <div class="boxG c">
            <img
                src="https://res.cloudinary.com/dz0vbjbye/image/upload/v1638758595/home_page_gallery/nikolay-smeh-gPpbFaEkl00-unsplash_rcduz6.jpg"
                alt="">
        </div>
        <div class="boxG d">
            <img
                src="https://res.cloudinary.com/dz0vbjbye/image/upload/v1638758594/home_page_gallery/hong-anh-duong-EK_-_nAm-CYM-unsplash_ahpaos.jpg"
                alt="">
        </div>
        <div class="boxG e">
            <img
                src="https://res.cloudinary.com/dz0vbjbye/image/upload/v1638758595/home_page_gallery/sonny-mauricio-yhc4pSbl01A-unsplash_g2fmhg.jpg"
                alt="">
        </div>
        <div class="boxG f">
            <img
                src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638168847/gallery/lynda-hinton-q_eyFSd2W3M-unsplash_xrypqq.jpg"
                alt="">
        </div>
        <div class="boxG g">
            <img
                src="https://res.cloudinary.com/dz0vbjbye/image/upload/v1638758595/home_page_gallery/rosalind-chang-P_wPicZYoPI-unsplash_etthar.jpg"
                alt="">

        </div>
        <div class="boxG h">
            <img
                src="https://res.cloudinary.com/dz0vbjbye/image/upload/v1638758594/home_page_gallery/markus-winkler-dq03aws4SmY-unsplash_dcgyps.jpg"
                alt="">

        </div>
        <div class="boxG i">
            <img
                src="https://res.cloudinary.com/dz0vbjbye/image/upload/v1638758594/home_page_gallery/haseeb-jamil-J9lD6FS6_cs-unsplash_rlggsj.jpg"
                alt="">

        </div>
        <div class="boxG j">
            <img
                src="https://res.cloudinary.com/dz0vbjbye/image/upload/v1638758594/home_page_gallery/andraz-lazic-iy_MT2ifklc-unsplash_ssuntp.jpg"
                alt="">

        </div>
    </div>
</section>

<!-- gallery section ends -->


<!-- order section starts  -->

<section class="blog mt-30">
    <h1 class="heading mb-20"><span>Blog</span> Ăn Uống </h1>
    <div class="col-12">
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-wrapper mb-50">
                        <div class="blog-img mb-20">
                            <a href="blog/{{$blog->id}}/details">
                                <img src="{{$blog->image}}"
                                     alt="Lorem ipsum dolor amet">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h2><a href="blog/{{$blog->id}}/details">{{$blog->title}}</a></h2>
                            <div class="blog-date-categori">
                                <ul>
                                    <li><i class="fa fa-user"></i> {{$blog->author}}</li>
                                    <li>
                                        <i class="fa fa-calendar"></i> {{$blog->created}}
                                    </li>
                                </ul>
                            </div>
                            <div class="rte">
                                <p>{{$blog->description}}</p>
                            </div>
                        </div>
                        <div class="blog-btn mt-30">
                            <a href="/blog/{{$blog->id}}/details">Đọc Thêm</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- order section ends -->

<!-- footer section  -->

<div class="footer-area black-bg-2 pt-70">
    <div class="footer-top-area pb-18">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-about mb-40">
                        <div class="footer-logo">
                            <a href="/home" class="logo"><img src="{{asset('user/img/logo.png')}}" width="70px" alt="">VietKitchen</a>
                        </div>
                        <p>Đến với chúng tôi, bạn sẽ luôn được tận hưởng những món ăn - đồ uống chất lượng nhất, ngon nhất với giá cả ưu đãi, khuyến mại có một không hai.</p>
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
                        <p>&copy; 2021 <strong> VietKitchen </strong> được tạo nên với <i class="fa fa-heart text-danger"></i> bởi <a
                                href="/about-us" target="_blank"><strong>Project Sem 2 Team</strong></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#home" class="fas fa-angle-up" id="scroll-top" onclick="onScrollUp()"></a>

<script src="/assets/vendors/js/base/jquery.min.js"></script>
<script src="/assets/vendors/js/base/core.min.js"></script>
<script src="/assets/vendors/js/app/app.min.js"></script>
<!-- custom js file link  -->
<script src="user/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="{{ asset('js/firebase.js') }}"></script>
<script>
    navigator.serviceWorker.addEventListener('message', function (event) {
        $('#NotiCount').html(payload.data.number_of_noti);
        $.toast({
            heading: payload.data.heading,
            text: payload.data.text,
            position: 'top-center',
            showHideTransition: 'slide',
            hideAfter: false,
            icon: 'success',
            stack: 5
        })
    });
</script>
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
