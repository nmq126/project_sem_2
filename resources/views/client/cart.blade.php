<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Giỏ Hàng</title>
    <link rel="icon" href="user/img/food.svg" sizes="any" type="image/svg+xml">
    <!-- font awesome cdn link  -->
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
                <li class="active">Giỏ Hàng</li>
            </ul>
        </div>
    </div>
</div>
<div class="text-center title">
    <h1><span>Giỏ</span> Hàng</h1>
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
                                <th>Ảnh</th>
                                <th>Tên Sản Phẩm</th>
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
                                            <img
                                                src="{{$cartItem->thumbnail}}" width="100px" height="100px"
                                                alt="">
                                        </td>
                                        <td class="cart-product-name"><span>{{$cartItem->name}}</span></td>
                                        <td class="cart-price"><span class="amount">{{\App\Helpers\Helper::formatVnd($cartItem->unitPrice)}} VND</span>
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
                                                                           id="item-price-{{$cartItem->id}}">{{\App\Helpers\Helper::formatVnd($cartItem->unitPrice * $cartItem->quantity)}} VND</span>
                                        </td>
                                        <td class="product-remove">
                                            <a href="/cart/remove?id={{$cartItem->id}}"
                                               onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này khỏi giỏ hàng?')"><span
                                                    class="fas fa-trash"></span></a>
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
                        <div class="float-end total-price mt-5 me-5"><h4>Tổng Giỏ Hàng: <span class="total">{{\App\Helpers\Helper::formatVnd($totalPrice)}} VND</span>
                            </h4></div>
                        <div class="row" style="clear: both">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper text-center">
                                    <div class="cart-shiping-update">
                                        <a href="/products" class="fw-bold">Tiếp Tục Mua Sắm</a>
                                    </div>
                                    <div class="cart-clear">
                                        <a href="/cart/remove?id=all"
                                           onclick="return confirm('Bạn có chắc muốn xoá tất cả sản phẩm khỏi giỏ hàng?')"
                                           class="fw-bold">Xóa Giỏ Hàng</a>
                                        <a href="/checkout"
                                           class="fw-bold checkout ms-3">Thanh Toán</a>
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
                                <li><a href="about-us.html">Về Chúng Tôi</a></li>
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
                                <li><a href="my/account">Thông tin tài khoản</a></li>
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
            $('.item-price-' + data[key].id).html(itemPrice.toLocaleString("en-US") + ' VND');
        }
        let totalPrice = subTotal - promoPrice;
        $('.total').html(totalPrice.toLocaleString("en-US") + ' VND');
        $('.sub-total').html(subTotal.toLocaleString("en-US") + ' VND');
        $('.promo-price').html('- ' + promoPrice.toLocaleString("en-US") + ' VND');
        $('#lblCartCount').html(totalQuantity);
    }
</script>
</body>
</html>
