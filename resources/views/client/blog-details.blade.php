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

<div><!-- blog-area start -->
    <div class="blog-area ptb-100">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-md-8">
                    <div class="blog-details-wrapper">
                        <div class="blog-img mb-20">
                            <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/articles/blog-5_1000x600_crop_center.jpg?v=1537012565"
                                 alt="Lorem ipsum dolor amet">
                            <div class="blog-date">
                                <span>15 <br> Sep</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h2>Lorem ipsum dolor amet</h2>
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
                            <p>There are many variations of passages of Lorem Ipsum available, <span>but the majority have suffered alteration in some form</span>
                                , by injected humou, ors randomised words which don't look even sl If you are going to
                                use a passage of Lorem Ipsum, you need to be sure there isn't are anything embarrassing
                                hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to
                                repeat predefined chunks as necessary, making this the first true generator on the
                                Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model
                                sentence structures, to generate Lorem Ipsum which looks reasonable. <span>The generated Lorem Ipsum is therefore always free from repetition,</span>
                            </p>
                            <blockquote>Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor
                                incididunt labo dolor magna aliqua. Ut enim ad minim veniam quis nostrud
                            </blockquote>
                            <div class="text-content-img">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="text-single">
                                            <p>It is a long established fact that a reader will be distracted by the
                                                readable ish content of a page when looking at its layout. The point of
                                                using Lorem Ipsum is that it has a more-or-less normal distribution of
                                                letters,</p>
                                            <p>as opposed to using 'Content here, content here', making it look like
                                                readable English. Many desktop publishing packages and web page editors
                                                now uses Lorem Ipsum as their default model text, and a search for
                                                'lorem ipsum' will uncover many web sites still in their infancy.
                                                Various versions have evolved over the years, sometimes by accident,</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="content-img"><img
                                                src="//cdn.shopify.com/s/files/1/0037/1818/5030/files/blog-dec-img1_large.jpg?v=1537004331"
                                                alt=""></div>
                                    </div>
                                </div>
                            </div>
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
                        <div id="comments" class="comment-success">
                            <div class="blog-comment-wrapper mt-55">
                                <h4 class="blog-dec-title">7 comments</h4>
                                <div class="single-comment-wrapper mt-35">
                                    <div class="blog-comment-img">
                                        <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/t/4/assets/default-user-image_small.png?v=7273182385729636987"
                                             alt="author">
                                    </div>
                                    <div class="blog-comment-content">
                                        <h4>axiwenus</h4>
                                        <span>Nov 29, 2020 at 20:01</span>
                                        <p></p>
                                        <p>http://mewkid.net/when-is-xuxlya2/ – Amoxicillin 500mg Capsules Amoxicillin
                                            500mg obt.kctk.fudink.myshopify.com.zmv.pn
                                            http://mewkid.net/when-is-xuxlya2/</p>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="single-comment-wrapper mt-35">
                                    <div class="blog-comment-img">
                                        <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/t/4/assets/default-user-image_small.png?v=7273182385729636987"
                                             alt="author">
                                    </div>
                                    <div class="blog-comment-content">
                                        <h4>fafizeqip</h4>
                                        <span>Nov 29, 2020 at 19:44</span>
                                        <p></p>
                                        <p>http://mewkid.net/when-is-xuxlya2/ – Amoxil Dose For 55 Pounds Amoxicillin No
                                            Prescription qlq.stdd.fudink.myshopify.com.anq.cp
                                            http://mewkid.net/when-is-xuxlya2/</p>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="single-comment-wrapper mt-35">
                                    <div class="blog-comment-img">
                                        <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/t/4/assets/default-user-image_small.png?v=7273182385729636987"
                                             alt="author">
                                    </div>
                                    <div class="blog-comment-content">
                                        <h4>eduyczixe</h4>
                                        <span>Nov 29, 2020 at 19:42</span>
                                        <p></p>
                                        <p>http://mewkid.net/when-is-xuxlya2/ – Amoxicillin No Prescription Amoxicillin
                                            500mg Capsules ikd.nwun.fudink.myshopify.com.wrt.dk
                                            http://mewkid.net/when-is-xuxlya2/</p>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="single-comment-wrapper mt-35">
                                    <div class="blog-comment-img">
                                        <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/t/4/assets/default-user-image_small.png?v=7273182385729636987"
                                             alt="author">
                                    </div>
                                    <div class="blog-comment-content">
                                        <h4>mexeolujemure</h4>
                                        <span>Nov 29, 2020 at 19:27</span>
                                        <p></p>
                                        <p>http://mewkid.net/when-is-xuxlya2/ – Amoxicillin Amoxicillin No Prescription
                                            vsc.nfxx.fudink.myshopify.com.ltu.nj http://mewkid.net/when-is-xuxlya2/</p>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="single-comment-wrapper mt-35">
                                    <div class="blog-comment-img">
                                        <img src="//cdn.shopify.com/s/files/1/0037/1818/5030/t/4/assets/default-user-image_small.png?v=7273182385729636987"
                                             alt="author">
                                    </div>
                                    <div class="blog-comment-content">
                                        <h4>Farhad</h4>
                                        <span>Sep 18, 2018 at 06:42</span>
                                        <p></p>
                                        <p>Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmod tempor
                                            incididunt labo dolor magna aliqua. Ut enim ad minim veniam quis nostrud.
                                            you need to be sure there isn’t are anything embarrassing hidden in the
                                            middle of text. All the Lorem Ipsum generators on the Internet tend to
                                            repeat predefined chunks as necessary, making this the first true generator
                                            on the Internet. It uses a dictionary of over 200 Latin words, combined with
                                            a handful of model sentence structures, to generate Lorem Ipsum which looks
                                            reasonable.</p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-pagination">
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
                                                <a href="/blogs/news/lorem-ipsum-dolor-amet?page=2" title="">2</a>
                                            </li>
                                            <li><a class="prev-next next"
                                                   href="/blogs/news/lorem-ipsum-dolor-amet?page=2">Next<i
                                                        class="ion-ios-arrow-right"></i> </a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <form method="post" action="/blogs/news/lorem-ipsum-dolor-amet/comments#comment_form"
                                  id="comment_form" accept-charset="UTF-8" class="comment-form"><input type="hidden"
                                                                                                       name="form_type"
                                                                                                       value="new_comment"><input
                                    type="hidden" name="utf8" value="✓">
                                <div class="blog-reply-wrapper mt-50">
                                    <h4 class="blog-dec-title">Leave a comment</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="leave-form">
                                                <input type="text" class="" name="comment[author]" id="commentAuthor"
                                                       value="" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="leave-form">
                                                <input type="text" class="" name="comment[email]" id="commentEmail"
                                                       value="" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-leave">
												<textarea class="custom-textarea" name="comment[body]" id="commentBody"
                                                          placeholder="Message"></textarea>
                                                <input type="submit" value="Post comment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
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
                        <div class="shop-widget mt-25 shop-sidebar-border pt-25">
                            <h4 class="shop-sidebar-title">Recent Post</h4>
                            <div class="sidebar-list-style mt-20">
                                <ul>
                                    <li><a href="/blogs/news/lorem-ipsum-dolor-amet">Lorem ipsum dolor amet</a></li>
                                    <li><a href="/blogs/news/spirit-of-adventure-rises">Spirit of Adventure Rises</a>
                                    </li>
                                    <li><a href="/blogs/news/familiar-with-the-countless-1">Familiar with the
                                            countless</a></li>
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
    </div>
    <!-- blog-area end -->
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
