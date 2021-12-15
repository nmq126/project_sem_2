<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Cửa Hàng | VietKitchen</title>
    <!-- Favicon -->
    <link rel="icon" href="/user/img/favicon.ico" sizes="any" type="image/svg+xml">    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/Hung/css/all.min.css">

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
    <link rel="stylesheet" href="Hung/css/bootstrap.min.css">
    <link rel="stylesheet" href="Hung/css/animate.css">
    <link rel="stylesheet" href="Hung/css/owl.carousel.min.css">
    <link rel="stylesheet" href="Hung/css/slick.css">
    <link rel="stylesheet" href="Hung/css/chosen.min.css">
    <link rel="stylesheet" href="Hung/css/ionicons.min.css">
    <link rel="stylesheet" href="Hung/css/font-awesome.min.css">
    <link rel="stylesheet" href="Hung/css/simple-line-icons.css">
    <link rel="stylesheet" href="Hung/css/jquery-ui.css">
    <link rel="stylesheet" href="Hung/css/meanmenu.min.css">
    <link rel="stylesheet" href="Hung/css/style.css">
    <link rel="stylesheet" href="Hung/css/responsive.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="Hung/js/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="user/css/main.css">
    <link rel="stylesheet" href="user/css/home.css">
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


    {{--    <link rel="stylesheet" href="user/Hung/css/responsive.css">--}}
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
                <li class="active">Cửa Hàng</li>
            </ul>
        </div>
    </div>
</div>
<div class="text-center title">
    <h1>Danh Sách Sản Phẩm</h1>
</div>
<div class="shop-page-area pt-80 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper">
                    <div class="shop-topbar-left">
                        <ul class="view-mode">
                            <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                            <li ><a href="#product-list" data-view="product-list"><i
                                        class="fa fa-list-ul"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-sorting-wrapper">
                        <form class="product-show shorting-style d-flex" name="search-form" action="/products" method="get">
                            @php
                                $checkC = [];
                                if(isset($_GET['categories']))
                                    $checkC = $_GET['categories'];
                                $checkI = [];
                                if(isset($_GET['ingredients']))
                                    $checkI = $_GET['ingredients'];
                                $sortBy = '';
                                if(isset($_GET['sort-by']))
                                    $sortBy = $_GET['sort-by'];
                            @endphp
                            <label>Sắp xếp:
                                <select name="sort-by">
                                    <option value="" disabled selected>Sắp xếp theo</option>
                                    <option value="name" {{ $sortBy == 'name' ? 'selected' : '' }}>Tên (A - Z)</option>
                                    <option value="name_desc" {{ $sortBy == 'name_desc' ? 'selected' : '' }}>Tên (Z - A)</option>
                                    <option value="price" {{ $sortBy == 'price' ? 'selected' : '' }}>Giá (Tăng dần)</option>
                                    <option value="price_desc" {{ $sortBy == 'price_desc' ? 'selected' : '' }}>Giá (Giảm dần)</option>
                                </select>
                            </label>
                            @if(isset($_GET['keyword']))
                                <input type="hidden" name="keyword" value="{{$_GET['keyword']}}">
                            @endif
                            @foreach($checkC as $C)
                                <input type="hidden" name="categories[]" value="{{$C}}">
                            @endforeach
                            @foreach($checkI as $C)
                                <input type="hidden" name="ingredients[]" value="{{$C}}">
                            @endforeach
                            @if(isset($_GET['from-price']))
                                <input type="hidden" name="from-price" value="{{$_GET['from-price']}}">
                            @endif
                            @if(isset($_GET['to-price']))
                                <input type="hidden" name="to-price" value="{{$_GET['to-price']}}">
                            @endif
{{--                            <div class="price_slider_amount mt-1">--}}
{{--                                <button type="submit"><i class="fa fa-check"></i></button>--}}
{{--                            </div>--}}
                        </form>
                    </div>
                </div>
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
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
                                                <div class="pro-action-left" style="margin-top: 6px">
                                                    <a title="Thêm Vào Giỏ" class="add-to-cart-button" style="padding-bottom: 10px"
                                                       id="add-to-cart-{{ $product->id }}"
                                                       data-name="{{ $product->name }}" data-id="{{$product->id}}"><i
                                                        class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</a>
                                                    <input type="hidden" name="quantity" value="1">
                                                </div>
                                                <div class="pro-action-right">
                                                    <a title="Thích" href="wishlist.html"><i
                                                            class="fa fa-heart"></i></a>
                                                    <a title="Chi Tiết Sản Phẩm" href="/product/{{$product->id}}/details"><i class="fa fa-external-link"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-content text-center">
                                            <h4>
                                                <a href="/product/{{$product->id}}/details" class="fw-bold"
                                                   style="font-size: 20px">{{$product->name}}</a>
                                            </h4>
                                            <div class="product-price-wrapper">
                                                <span style="font-size: 15px">{{\App\Helpers\Helper::formatVnd($product->price - ($product->price * $product->discount /100))}} đ</span>
                                                @if($product->discount > 0)
                                                    <span style="font-size: 15px" class="product-price-old">{{\App\Helpers\Helper::formatVnd($product->price)}} đ</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product-list-details">
                                            <h4>
                                                <a class="fw-bold" href="/product/{{$product->id}}/details"
                                                   style="font-size: 20px">{{$product->name}}</a>
                                            </h4>
                                            <div class="product-price-wrapper">
                                                <span style="font-size: 15px">{{\App\Helpers\Helper::formatVnd($product->price - ($product->price * $product->discount /100))}} VND</span>
                                                @if($product->discount > 0)
                                                    <span style="font-size: 15px" class="product-price-old">{{\App\Helpers\Helper::formatVnd($product->price)}} VND</span>
                                                @endif
                                            </div>
                                            <p>{{$product->description}}</p>
                                            <div class="shop-list-cart-wishlist">
                                                <a href="#" title="Wishlist"><i class="fa fa-heart"></i></a>
                                                <a title="Add To Cart" class="add-to-cart-button" id="add-to-cart-{{ $product->id }}" data-name="{{ $product->name }}" data-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a href="/product/{{$product->id}}/details"><i class="fa fa-external-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if($products->lastpage() > 1)
                        <div class="pagination-total-pages">
                            <div class="pagination-style">
                                <ul class="text-center" style="display: flex; justify-content: center; align-items: center">
                                    <li><a class="prev-next prev" href="{{$products->url(1)}}"><i
                                                class="fa fa-arrow-left {{($products->currentPage() == 1) ? 'disabled': ''}}"></i>
                                            Prev</a></li>
                                    @for($i = 1; $i <= $products->lastPage(); $i++)
                                        <li><a class="{{($products->currentPage() == $i) ? 'active': ''}}"
                                               href="{{$products->url($i)}}">{{$i}}</a></li>
                                    @endfor
                                    <li>
                                        <a class="prev-next next {{($products->currentPage() == $products->lastPage()) ? 'disabled': ''}}"
                                           href="{{$products->nextPageUrl()}}">Next<i class="fa fa-arrow-right"></i>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-3">
                <form class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Bộ Lọc</h4>
                        @if(isset($_GET['sort-by']))
                            <input type="hidden" name="sort-by" value="{{$_GET['sort-by']}}">
                        @endif
                        <div class="shop-catigory">
                            <ul id="faq">
                                <li><a data-bs-toggle="collapse" data-parent="#faq" href="#shop-catigory-4">Từ Khóa
                                        <i class="fa fa-angle-down pt-2"></i></a>
                                    <ul id="shop-catigory-4" class="panel-collapse collapse">
                                            <label for="keyword" class="mt-10 ml-15">Nhập từ khóa
                                                <input type="text" name="keyword" style="width: 100%">
                                            </label>
                                    </ul>
                                </li>
                                <li><a data-bs-toggle="collapse" data-parent="#faq" href="#shop-catigory-1">Danh Mục
                                        <i class="fa fa-angle-down pt-2"></i></a>
                                    <ul id="shop-catigory-1" class="panel-collapse collapse mt-10">
                                        @foreach($categories as $category)
                                            @php
                                                $checkC = [];
                                                if(isset($_GET['categories'])){
                                                    $checkC = $_GET['categories'];
                                                }
                                            @endphp
                                            <li class="d-flex">
                                                <input type="checkbox" name="categories[]"
                                                       value="{{$category->id}}"
                                                       @if(in_array($category->id , $checkC)) checked @endif>
                                                <span class="ms-1" style="font-size: 15px;"> {{$category->name}}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a data-bs-toggle="collapse" data-parent="#faq" href="#shop-catigory-2">Thành phần
                                        <i class="fa fa-angle-down pt-2"></i></a>
                                    <ul id="shop-catigory-2" class="panel-collapse collapse mt-10">
                                        @foreach($ingredients as $ingredient)
                                            @php
                                                $checkI = [];
                                                if(isset($_GET['ingredients'])){
                                                    $checkC = $_GET['ingredients'];
                                                }
                                            @endphp
                                            <li class="d-flex">
                                                <input type="checkbox" name="ingredients[]" value="{{$ingredient->id}}"
                                                       @if(in_array($ingredient->id , $checkI)) checked @endif>
                                                <span class="ms-1" style="font-size: 15px;">{{$ingredient->name}}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a data-bs-toggle="collapse" data-parent="#faq" href="#shop-catigory-3">Giá
                                        <i class="fa fa-angle-down pt-2 fa-2x"></i></a>
                                    <ul id="shop-catigory-3" class="panel-collapse collapse">
                                        <div class="price_filter mt-10 ml-15">
                                            <label for="from-price">Từ
                                                <input type="number" name="from-price">
                                            </label>
                                            <label for="to-price" class="mt-10">Đến
                                                <input type="number" name="to-price">
                                            </label>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="price_slider_amount text-center mt-30">
                        <button type="submit">Tìm Kiếm</button>
                    </div>
                </form>
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
<script src="{{asset('Hung/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('Hung/js/popper.js')}}"></script>
<script src="{{asset('Hung/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Hung/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('Hung/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('Hung/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('Hung/js/plugins.js')}}"></script>
<script src="{{asset('Hung/js/main.js')}}"></script>
<script src="user/js/products.js"></script>
<script src="user/js/main.js"></script>
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

<script>
    $('select[name=sort-by]').change(function () {
        $('form[name=search-form]').submit();
    })
</script>
</body>
</html>
