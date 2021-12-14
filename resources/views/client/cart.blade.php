<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Giỏ Hàng | VietKitchen</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('user/img/favicon.ico')}}" sizes="any" type="image/svg+xml">  <!-- font awesome cdn link  -->
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
@php
    use Illuminate\Support\Facades\Session;
        $shoppingCart = [];
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
@endphp

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
                <li class="active">Giỏ Hàng</li>
            </ul>
        </div>
    </div>
</div>
<div class="text-center title">
    <h1>Giỏ Hàng</h1>
</div>

<div class="cart-main-area pt-70 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng</th>
                                <th>Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($shoppingCart) > 0)
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach($shoppingCart as $cartItem)
                                    @php
                                        if (isset($cartItem) && isset($totalPrice)) {
                                            $totalPrice += $cartItem->unitPrice * $cartItem->quantity;
                                        }
                                    @endphp
                                    <input type="hidden" name="id" value="{{$cartItem->id}}">
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="/product/{{$cartItem->id}}/details"><img
                                                src="{{$cartItem->thumbnail}}" width="80px" height="80px"
                                                alt=""><span class="pl-30 fw-bold" style="color: black;text-transform: uppercase">{{$cartItem->name}}</span></a>
                                        </td>
                                        <td class="cart-price"><span class="amount">{{\App\Helpers\Helper::formatVnd($cartItem->unitPrice)}} đ</span>
                                        </td>
                                        <td class="product-quantity" style="padding-left: 27px">
                                            <div class="cart-plus-minus">
                                                <input class="text-center quantity-checkout cart-plus-minus-box"
                                                       oninput="this.value = !!this.value && Math.abs(this.value) > 0 ? Math.abs(this.value) : null"
                                                       required
                                                       data-id="{{$cartItem->id}}" name="quantity" type="number" min="1"
                                                       value="{{$cartItem->quantity}}">
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="price item-price-{{$cartItem->id}}"
                                                                           id="item-price-{{$cartItem->id}}">{{\App\Helpers\Helper::formatVnd($cartItem->unitPrice * $cartItem->quantity)}} đ</span>
                                        </td>
                                        <td>
                                            <a href="/cart/remove?id={{$cartItem->id}}" class="badge badge-success"
                                               onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này khỏi giỏ hàng?')">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" style="font-size: 2em" class="text-center">Bạn Chưa Có Sản Phẩm
                                        Trong Giỏ Hàng!
                                        <div class="cart-buy mt-10">
                                            <a href="/products"
                                               class="buy fw-bold checkout ms-3">Mua Ngay</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endif
                        </table>
                    </div>
                    @if(count($shoppingCart) > 0)
                        <div class="float-end total-price mt-5 me-5"><h4>Tổng Tiền: <span class="total">{{\App\Helpers\Helper::formatVnd($totalPrice)}} đ</span>
                            </h4></div>
                        <div class="row" style="clear: both">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper text-center">
                                    <div class="cart-shiping-update">
                                        <a href="/products" class="fw-bold">Tiếp Tục Mua Sắm</a>
                                    </div>
                                    <div class="d-flex">
                                        <div class="checkout-button">
                                            <a href="/checkout"
                                               class="fw-bold checkout ms-3">Thanh Toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
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
<script src="/assets/vendors/js/base/jquery.min.js"></script>
<script src="Hung/js/bootstrap.min.js"></script>
<script src="Hung/js/plugins.js"></script>
<script src="Hung/js/main.js"></script>
<script src="user/js/main.js"></script>
<script src="user/js/products.js"></script>
<script>
    $(document).ready(function () {
        $('.quantity-checkout').change(function () {
            let quantity;
            if (this.value != null) {
                quantity = this.value;
            } else quantity = 1;
            let data = {
                id: this.getAttribute('data-id'),
                quantity: quantity
            }
            updateCart(data);
        })
    })

    function updateCart(data) {
        $.ajax({
            url: '/cart/update?id=' + data.id + '&quantity=' + data.quantity,
            method: 'POST',
            success: function (res) {
                updatePrice(res)
                console.log(res)
            },
            error: function (res) {
                console.log(res)
            }
        })
    }

    function updatePrice(data) {
        let totalQuantity = 0;
        let subTotal = 0;
        let promoPrice = 0;
        for (let key in data) {
            console.log(data[key]);
            let itemDelPrice = data[key].price * data[key].quantity;
            let itemPrice = data[key].unitPrice * data[key].quantity;
            totalQuantity += data[key].quantity * 1;
            promoPrice += (data[key].price - data[key].unitPrice) * data[key].quantity;
            subTotal += itemDelPrice
            // $('.del-price-'+data[key].id).html(itemDelPrice.toLocaleString("en-US"));
            $('.item-price-' + data[key].id).html(itemPrice.toLocaleString("en-US") + ' đ');
        }
        let totalPrice = subTotal - promoPrice;
        $('.total').html(totalPrice.toLocaleString("en-US") + ' đ');
        $('.sub-total').html(subTotal.toLocaleString("en-US") + ' đ');
        $('.promo-price').html('- ' + promoPrice.toLocaleString("en-US") + ' đ');
        $('#lblCartCount').html(totalQuantity);
    }
</script>

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
