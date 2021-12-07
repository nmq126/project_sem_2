<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="icon" href="{{asset('user/img/food.svg')}}" sizes="any" type="image/svg+xml">
    <!-- font awesome cdn link  -->
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
    <script>
        WebFont.load({
            google: {"families": ["Montserrat:400,500,600,700", "Noto+Sans:400,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    {{--    <link rel="stylesheet" href="user/Hung/css/responsive.css">--}}
</head>
<body>
@php
    use Illuminate\Support\Facades\Session;
        $shoppingCart = [];
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
@endphp
@php
    $totalQuantity = 0;
@endphp
@foreach($shoppingCart as $cartItem)
    @php
        if (isset($totalQuantity) && isset($cartItem)) {
            $totalQuantity += $cartItem->quantity;
        }
    @endphp
@endforeach
<header id="nav">

    <a href="/home" class="logo"><i class="fas fa-utensils"></i>VietKitchen</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="/login"> Đăng Nhập </a>
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
                <li class="active">Chi Tiết Sản Phẩm - {{$product->name}}</li>
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
                                <li>32 Reviews</li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span style="font-size: 20px">{{\App\Helpers\Helper::formatVnd($product->price - ($product->price * $product->discount /100))}} VND</span>
                        @if($product->discount > 0)
                            <span style="font-size: 20px" class="product-price-old">{{\App\Helpers\Helper::formatVnd($product->price)}} VND</span>
                        @endif
                    </div>
                    <div class="in-stock">
                        <p>Tình Trạng: <span>Còn Hàng</span></p>
                    </div>
                    <p class="pb-30">{{$product->description}}</p>
                    <div class="pro-details-cart-wrap">
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
                        <div class="product-quantity">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" oninput="this.value = !!this.value && Math.abs(this.value) > 0 ? Math.abs(this.value) : null" type="text" name="quantity" min="1" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Danh Mục:</li>
                            <li><a href="#">{{$product->category->name}}</a></li>
                        </ul>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Thành Phần Chính:</li>
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
                <a class="active" data-bs-toggle="tab" href="#des-details1">Mô Tả Sản Phẩm</a>
                <a data-bs-toggle="tab" href="#des-details3">Đánh Giá</a>
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
                <h3 class="section-title section-bg-white">Sản Phẩm Cùng Loại</h3>
            </div>
        </div>
        <div class="related-product-active owl-carousel product-nav">
            @foreach($products as $product)
                <div class="product-wrapper">
                    <div class="product-img">
                        <a href="">
                            <img src="{{$product->thumbnail}}" alt="">
                        </a>
                        @if($product ->discount > 0)
                            <div class="onsale">
                                <span>-{{$product->discount}}%</span></div>
                        @endif
                        <div class="product-action">
                            <div class="pro-action-left">
                                <a title="Thêm Vào Giỏ" class="add-to-cart-button"
                                   id="add-to-cart-{{ $product->id }}"
                                   data-name="{{ $product->name }}" data-id="{{$product->id}}"><i
                                        class="fa fa-shopping-cart"></i>Thêm Vào Giỏ</a>
                            </div>
                            <div class="pro-action-right">
                                <a title="Thích" href="wishlist.html"><i
                                        class="fa fa-heart"></i></a>
                                <a href="/product/{{$product->id}}/details"><i class="fa fa-external-link"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h4>
                            <a class="fw-bold" href="/products/{{$product->id}}/details">{{$product->name}}</a>
                        </h4>
                        <div class="product-price-wrapper">
                            <span>{{\App\Helpers\Helper::formatVnd($product->price - ($product->price * $product->discount /100))}} VND</span>
                            @if($product->discount > 0)
                                <span class="product-price-old">{{\App\Helpers\Helper::formatVnd($product->price)}} VND</span>
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
</body>
</html>
