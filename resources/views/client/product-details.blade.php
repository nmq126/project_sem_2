<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{$product->name}} | VietKitchen</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('user/img/favicon.ico')}}" sizes="any" type="image/svg+xml">   <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
    <link rel="stylesheet" href="{{asset('Hung/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/responsive.css')}}">
    <script src="{{asset('Hung/js/modernizr-2.8.3.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('user/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/home.css')}}">


    {{--    <link rel="stylesheet" href="user/Hung/css/responsive.css">--}}
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

    <a href="/home" class="logo"><img src="/user/img/logo.png" alt="">VietKitchen</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="/products"> C???a H??ng</a>
        <a href="/contact-us"> Li??n H??? </a>
        <a href="/blog"> Blog </a>
        @guest
            <a href="/login"> ????ng nh???p</a>
        @endguest
       <a href="/cart">
            <i class="fas fa-shopping-cart"></i>
            @if($totalQuantity !=0)
            <span class='badge badge-warning' id='lblCartCount'>{{ $totalQuantity }}</span>
            @else<span class='badge badge-warning' id='lblCartCount'></span>
            @endif
        </a>
        @auth
            <div class="notifications">
                <i class="fas fa-bell"></i>
                @if($number_noti !=0)
                <span class='badge badge-warning' id='NotiCount'>{{ $number_noti }}</span>
                @else <span class='badge badge-warning' id='NotiCount'></span>
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
                            <p>Xem t???t c???</p>
                        </li>
                    @else
                        <li>
                            <div class="notify_data">
                                <div class="sub_title">
                                    Kh??ng c?? th??ng b??o
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
                                Ng?????i d??ng
                            </a>
                        </li>
                        <li>
                            <a href="/my-account/logout">
                                <i class="fas fa-sign-out-alt"></i>
                                ????ng xu???t
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
                <li><a href="/home">Trang Ch???</a></li>
                <li><a href="/products">C???a H??ng</a></li>
                <li class="active">{{$product->name}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="product-details pt-30 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img src="{{$product->thumbnail}}" width="500px" height="500px">
                    <span>-{{$product->discount}}%</span>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4 class="fw-bold">{{$product->name}}</h4>
                    <div class="rating-review">
                        <div class="pro-dec-rating">
                            <i class="fa fa-star" style="color: red"></i>
                            <i class="fa fa-star" style="color: red"></i>
                            <i class="fa fa-star" style="color: red"></i>
                            <i class="fa fa-star" style="color: red"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="pro-dec-review">
                            <ul>
                                <li>0 B??nh Lu???n</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span style="font-size: 20px">{{\App\Helpers\Helper::formatVnd($product->price - ($product->price * $product->discount /100))}} ??</span>
                        @if($product->discount > 0)
                            <span style="font-size: 20px" class="product-price-old">{{\App\Helpers\Helper::formatVnd($product->price)}} ??</span>
                        @endif
                    </div>
                    <div class="in-stock">
                        <p>T??nh Tr???ng: <span>C??n H??ng</span></p>
                    </div>
                    <p class="pb-30">{{$product->description}}</p>
                    <div class="pro-details-cart-wrap d-flex">
                        <div class="product-quantity">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" oninput="this.value = !!this.value && Math.abs(this.value) > 0 ? Math.abs(this.value) : null" type="text" name="quantity" min="1" value="1">
                            </div>
                        </div>
                        <div class="shop-list-cart-wishlist">
                            <a title="Add To Cart" class="add-to-cart-button"
                               id="add-to-cart-{{ $product->id }}"
                               data-name="{{ $product->name }}" data-id="{{$product->id}}">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            <a title="Wishlist" href="#">
                                <i class="fa fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Danh M???c:</li>
                            <li><a href="#">{{$product->category->name}}</a></li>
                        </ul>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Th??nh Ph???n Ch??nh:</li>
                            <li><a href="#"> {{$product->ingredient->name}}</a></li>
                        </ul>
                    </div>
                    <div class="pro-dec-social">
                        <ul>
                            <li><a class="tweet" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
                            <li><a class="share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
                            <li><a class="google" href="#"><i class="fa fa-google"></i> Google+</a></li>
                            <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i> Pinterest</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-100">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-bs-toggle="tab" href="#des-details1">M?? T??? S???n Ph???m</a>
                <a data-bs-toggle="tab" href="#des-details3">????nh Gi??</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p style="font-size: 15px">{!! $product->detail !!}</p>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="fb-comments" data-href="http://127.0.0.1:8000/product/{{$product->id}}/details" data-width="100%"
                         data-numposts="10"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-95">
    <div class="container">
        <div class="product-top-bar section-border mb-25">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">S???n Ph???m C??ng Lo???i</h3>
            </div>
        </div>
        <div class="related-product-active owl-carousel product-nav">
            @foreach($products as $product)
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="/product/{{$product->id}}/details">
                            <img src="{{$product->thumbnail}}" alt="" height="250px">
                        </a>
                        @if($product ->discount > 0)
                            <div class="onsale">
                                <span>-{{$product->discount}}%</span></div>
                        @endif
                        <div class="product-action">
                            <div class="pro-action-left">
                                <a title="Th??m V??o Gi???" class="add-to-cart-button"
                                   id="add-to-cart-{{ $product->id }}"
                                   data-name="{{ $product->name }}" data-id="{{$product->id}}"><i
                                        class="fa fa-shopping-cart"></i>Th??m V??o Gi???</a>
                            </div>
                            <div class="pro-action-right">
                                <a title="Th??ch" href="wishlist.html"><i
                                        class="fa fa-heart"></i></a>
                                <a href="/product/{{$product->id}}/details"><i class="fa fa-external-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h4>
                            <a class="fw-bold" href="/product/{{$product->id}}/details">{{$product->name}}</a>
                        </h4>
                        <div class="product-price-wrapper">
                            <span>{{\App\Helpers\Helper::formatVnd($product->price - ($product->price * $product->discount /100))}} ??</span>
                            @if($product->discount > 0)
                                <span class="product-price-old">{{\App\Helpers\Helper::formatVnd($product->price)}} ??</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
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
                        <p>?????n v???i ch??ng t??i, b???n s??? lu??n ???????c t???n h?????ng nh???ng m??n ??n - ????? u???ng ch???t l?????ng nh???t, ngon nh???t v???i gi?? c??? ??u ????i, khuy???n m???i c?? m???t kh??ng hai.</p>
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
                            <h4>TH??NG TIN</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="/about-us">V??? Ch??ng T??i</a></li>
                                <li><a href="#">Th??ng tin giao h??ng</a></li>
                                <li><a href="#">Ch??nh s??ch b???o m???t</a></li>
                                <li><a href="#">??i???u kho???n v?? ??i???u ki???n</a></li>
                                <li><a href="#">D???ch v??? kh??ch h??ng</a></li>
                                <li><a href="#">Ch??nh s??ch ho??n tr???</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 ps-md-5">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-22">
                            <h4>T??I KHO???N C???A T??I</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="/my-account">Th??ng tin t??i kho???n</a></li>
                                <li><a href="/my-account">L???ch s??? ????n h??ng</a></li>
                                <li><a href="wishlist.html">??a th??ch</a></li>
                                <li><a href="#">H??m th??</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-22">
                            <h4>LI??N L???C V???I CH??NG T??I</h4>
                        </div>
                        <div class="footer-contact">
                            <ul>
                                <li>?????a ch???: 8A T??n Th???t Thuy???t, H?? N???i</li>
                                <li>S??? ??i???n tho???i: (012) 800 456 789-987</li>
                                <li>Email: <a href="#">vietkitchen.hn@gmail.com</a></li>
                            </ul>
                        </div>
                        <div class="mt-35 footer-title mb-22">
                            <h4>GI??? M??? C???A</h4>
                        </div>
                        <div class="footer-time">
                            <ul>
                                <li>M??? c???a t??? <span>8:00 AM</span> ?????n <span>22:00 PM</span> m???i ng??y</li>
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
                        <p>&copy; 2021 <strong> VietKitchen </strong> ???????c t???o n??n v???i <i class="fa fa-heart text-danger"></i> b???i <a
                                href="/about-us" target="_blank"><strong>Project Sem 2 Team</strong></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#home" class="fas fa-angle-up" id="scroll-top" onclick="onScrollUp()"></a>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=980205812730468&autoLogAppEvents=1"
        nonce="tratXySK"></script>
<script src="{{asset('Hung/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('Hung/js/popper.js')}}"></script>
<script src="{{asset('Hung/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Hung/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('Hung/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('Hung/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('Hung/js/plugins.js')}}"></script>
<script src="{{asset('Hung/js/main.js')}}"></script>
<script src="{{asset('user/js/main.js')}}"></script>
<script src="{{asset('user/js/products.js')}}"></script>
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
