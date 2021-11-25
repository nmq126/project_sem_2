<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đặt hàng</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <!-- Favicon -->

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
    <link rel="stylesheet" href="user/css/checkout.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="bg-white">
<!-- Begin Preloader -->
<div id="preloader">
    <div class="canvas">
        <div class="spinner"></div>
    </div>
</div>
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
<header>
    <div class="container">
        <div class="logo">
            <h2>VietKitchen</h2>
        </div>
        <div class="searchBar">
            <div class="header-option">
                <img src="/viet_kitchen/img/search.svg" alt="">
                <span>Search</span>
            </div>
            <div class="header-option">
                Login
            </div>
        </div>
    </div>
</header>
<div role="main" class="checkout-body">
    <div class="shipping col-md-8">
        <div class="information">
            <h3>Thông tin vận chuyển</h3>
            <div class="authentication-form">
                <form method="post" action="/checkout" name="checkout-form" id="checkout-form">
                    @csrf
                    <div class="form-group row d-flex align-items-center mb-3">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Người nhận</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="shipName" placeholder="Tên người nhận">
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-3">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Địa chỉ</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="shipAddress" placeholder="Địa chỉ người nhận">
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-3">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Số điện thoại</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="shipPhone"
                                   placeholder="Số điện thoại người nhận">
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-3">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Ghi chú</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" name="shipNote" placeholder="Ghi chú cho cửa hàng"
                                      required></textarea>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Phương thức thanh
                            toán</label>
                        <div class="col-lg-8">
                            <div class="select">
                                <select name="payment" class="custom-select form-control">
                                    <option value="" disabled selected>Chọn một phương thức thanh toán</option>
                                    <option value="0">Thanh toán khi nhận hàng</option>
                                    <option value="1">Thanh toán online qua Paypal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr class="col-lg-8">
            <div class="order col-lg-8">
                <div class="order-title">
                    <h3>Chi tiết đơn hàng</h3>
                    <a class="add-more" href="/product  ">Chọn thêm sản phẩm</a>
                </div>
                @foreach($shoppingCart as $cartItem)
                    <div class="list-item mt-4">
{{--                        <div class="quantity">{{ $cartItem->quantity }}</div>--}}
                        <div class="name"> {{ $cartItem->name }} ({{ $cartItem->quantity }})</div>
                        <div class="price">
                            <?php if (isset($cartItem) && $cartItem->price != $cartItem->unitPrice): ?>
                            <del>{{ $cartItem->price * $cartItem->quantity }}</del>
                            <?php endif; ?>
                            {{ $cartItem->unitPrice * $cartItem->quantity }} vnđ
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>

        </div>
    </div>
    <div class="cart col-md-4">
        <div class="place-order">
            <div class="place-order-button">
                <button form="checkout-form" type="submit">Đặt hàng</button>
            </div>
            <hr>
            <div class="promo-text">Miễn phí vận chuyển cho đơn hàng từ 0đ</div>
            <ul>
                <li class="text">
                    <p>Tạm tính</p>
                    <span>{{ $totalPrice + $totalPromo }} vnđ</span>
                </li>
                <li class="text">
                    <p>Khuyến mại</p>
                    <span class="promo">- {{ $totalPromo }} vnđ</span>
                </li>

                <li class="text">
                    <p>Phí vận chuyển</p>
                    <span>MIỄN PHÍ</span>
                </li>
            </ul>
            <hr>
            <div class="total">
                <p>Tổng</p>
                <span>{{ $totalPrice }} vnđ</span>
            </div>
        </div>
    </div>
</div>

<footer>

</footer>

<script src="assets/vendors/js/base/jquery.min.js"></script>
<script src="assets/vendors/js/base/core.min.js"></script>

<script src="assets/vendors/js/app/app.min.js"></script>

</body>
</html>
