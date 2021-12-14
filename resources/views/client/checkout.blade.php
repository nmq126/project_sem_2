<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đặt hàng</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('user/img/favicon.ico')}}" sizes="any" type="image/svg+xml">
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
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="user/css/checkout.css">
    <link rel="stylesheet" href="Hung/css/bootstrap.min.css">
    <link rel="stylesheet" href="Hung/css/style.css">
    <link rel="stylesheet" href="Hung/css/responsive.css">
    <link rel="stylesheet" href="{{asset('user/css/home.css')}}">
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
</head>
<body class="bg-white">
<!-- Begin Preloader -->
<!-- End Preloader -->
@php
    $totalPrice = 0;
    $totalPromo = 0;
@endphp
@foreach($shoppingCart as $cartItem)
    @php
        if (isset($cartItem) && isset($totalPrice) && isset($totalPromo)) {
            $totalPrice += $cartItem->unitPrice * $cartItem->quantity;
            $totalPromo += ($cartItem->price - $cartItem->unitPrice)  * $cartItem->quantity;
        }
    @endphp
@endforeach
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
                <li><a href="/cart">Giỏ Hàng</a></li>
                <li class="active">Thanh Toán</li>
            </ul>
        </div>
    </div>
</div>
@auth
    @if(count($shoppingCart) > 0)
        <div role="main" class="checkout-body d-md-flex d-block">
            <div class="shipping col-xl-8 col-md-7" style="padding-top: 50px">
                <div class="information">
                    <h3>Thông tin vận chuyển</h3>
                    <div>
                        <form method="post" action="/checkout" name="checkout-form" id="checkout-form">
                            @csrf
                            <div class="input-line">
                                <label for="shipName" class=" ">Người nhận</label>
                                <input type="text" name="shipName" value="{{Auth::user()->profile->name}}" placeholder="Tên người nhận">
                            </div>
                            <div class="input-line">
                                <label for="shipAddress" class=" ">Địa chỉ</label>
                                <input type="text" name="shipAddress" value="{{Auth::user()->profile->address}}" placeholder="Địa chỉ người nhận">
                            </div>
                            <div class="input-line">
                                <label for="shipPhone" class=" ">Số điện thoại</label>
                                <input type="text" name="shipPhone" value="{{Auth::user()->phone}}" placeholder="Số điện thoại người nhận">
                            </div>
                            <div class="input-line">
                                <label for="shipNote" class=" ">Ghi chú</label>
                                <textarea rows="3" name="shipNote" placeholder="Ghi chú cho cửa hàng"></textarea>
                            </div>
                            <div class="input-line">
                                <label for="shipPayment">Phương thức thanh toán</label>
                                <select name="shipPayment" class="">
                                    <option value="" disabled selected>Chọn một phương thức thanh toán</option>
                                    <option value="0">Thanh toán khi nhận hàng</option>
                                    <option value="1">Thanh toán online qua Paypal</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="order">
                        <div class="order-title">
                            <h3>Chi tiết đơn hàng</h3>
                        </div>
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng</th>
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
                                            <td class="product-quantity">
                                                <div class="input-quantity">
                                                    <input class="quantity-checkout"
                                                           oninput="this.value = !!this.value && Math.abs(this.value) > 0 ? Math.abs(this.value) : null"
                                                           data-id="{{$cartItem->id}}" min="1" name="quantity"
                                                           type="number"
                                                           value="{{$cartItem->quantity}}">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                        <span class="price item-price-{{$cartItem->id}}"
                                              id="item-price-{{$cartItem->id}}">{{\App\Helpers\Helper::formatVnd($cartItem->unitPrice * $cartItem->quantity)}} đ</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart col-xl-4 col-md-5" style="padding-top: 40px">
                <div class="place-order">
                    <div class="place-order-button">
                        <button form="checkout-form" type="submit">
                            <span class="submit-text">ĐẶT HÀNG</span>
                            <span class="spinner-border spinner-border-lg" style="display: none" role="status"></span>
                        </button>
                    </div>
                    <hr>
                    <div class="promo-text">Miễn phí vận chuyển cho đơn hàng từ 0đ</div>
                    <ul>
                        <li class="text">
                            <p>Tạm tính</p>
                            <span
                                class="sub-total">{{\App\Helpers\Helper::formatVnd($totalPrice + $totalPromo)}} đ</span>
                        </li>
                        <li class="text">
                            <p>Khuyến mại</p>
                            <span class="promo-price">- {{ App\Helpers\Helper::formatVnd($totalPromo)}} đ</span>
                        </li>

                        <li class="text">
                            <p>Phí vận chuyển</p>
                            <span>MIỄN PHÍ</span>
                        </li>
                    </ul>
                    <hr>
                    <div class="total">
                        <p>Tổng</p>
                        <span class="total-price">{{ App\Helpers\Helper::formatVnd($totalPrice)}} đ</span>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div style="font-size: 30px; color: black" class="text-center mb-20">Bạn Chưa Có Sản Phẩm Trong Giỏ Hàng!
            <div class="cart-buy mt-10">
                <a href="/products"
                   class="fw-bold checkout ms-3">Mua Ngay</a>
            </div>
        </div>
    @endif
@endauth
@guest
    <div class="text-center mb-40">
        <h2 style="font-size: 2em">Vui Lòng Đăng Nhập Vào Tài Khoản Của Bạn</h2>
        <a href="/login" class="btn" style="padding-bottom: 40px">Đăng Nhập</a>
    </div>
@endguest
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

<!-- scroll top button  -->
<a href="#" class="fas fa-angle-up" id="scroll-top"></a>
<script src="/assets/vendors/js/base/jquery.min.js"></script>
<script src="/assets/vendors/js/base/core.min.js"></script>
<script src="/assets/vendors/js/app/app.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="user/js/main.js"></script>

<script>
    $(document).ready(function () {
        //validate form
        $("form[name=checkout-form]").validate({
            rules: {
                shipName: "required",
                shipAddress: "required",
                shipPhone: "required",
                shipPayment: "required",
            },
            messages: {
                shipName: "Vui lòng nhập vào tên người nhận",
                shipAddress: "Vui lòng nhập địa chỉ người nhận",
                shipPhone: "Vui lòng nhập số điện thoại người nhận",
                shipPayment: "Vui lòng chọn phương thức thanh toán",
            },
            submitHandler: function (form) {
                $(".submit-text").hide();
                $(".spinner-border").show();
                form.submit();
            }
        });
    })

</script>
<script>
    $(document).ready(function () {
        $('.quantity-checkout').change(function () {
            let data = {
                id: this.getAttribute('data-id'),
                quantity: this.value
            }
            updateCart(data);
            // $('.total-price').load(' .total-price');
            // $('.sub-total').load(' .sub-total');
            // $('.promo-price').load(' .promo-price');
            // // $('.item-price-'+data.id).load(' .item-price-'+data.id);
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
        $('.total-price').html(totalPrice.toLocaleString("en-US") + ' đ');
        $('.sub-total').html(subTotal.toLocaleString("en-US") + ' đ');
        $('.promo-price').html('- ' + promoPrice.toLocaleString("en-US") + ' đ');
        $('#lblCartCount').html(totalQuantity);
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script src="{{ asset('js/firebase.js') }}"></script>

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
