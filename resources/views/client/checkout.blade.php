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
{{--    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">--}}
    <link rel="stylesheet" href="user/css/checkout.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="bg-white">
<!-- Begin Preloader -->
<div id="preloader">
    <div class="canvas">
        <img src="user/img/loader.gif" alt="">
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
                <form method="post" action="/order" name="checkout-form" id="checkout-form">
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
                            <textarea class="form-control" name="shipNote" placeholder="Ghi chú cho cửa hàng"></textarea>
                        </div>
                    </div>
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Phương thức thanh
                            toán</label>
                        <div class="col-lg-8">
                            <div class="select">
                                <select name="shipPayment" class="custom-select form-control">
                                    <option value="" disabled selected>Chọn một phương thức thanh toán</option>
                                    <option value="0">Thanh toán khi nhận hàng</option>
                                    <option value="1">Thanh toán online qua Paypal</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr class="col-lg-12">
            <div class="order col-lg-12">
                <div class="order-title">
                    <h3>Chi tiết đơn hàng</h3>
                    <a class="add-more" href="/product  ">Chọn thêm sản phẩm</a>
                </div>
                @foreach($shoppingCart as $cartItem)
                    <div class="list-item mt-4">
                        <input class="quantity-checkout" type="number" min="1" data-id="{{ $cartItem->id }}" value={{ $cartItem->quantity }}>
                        {{--                        <div class="quantity">{{ $cartItem->quantity }}</div>--}}
                        <div class="name"> {{ $cartItem->name }}</div>
                        <div class="price item-price-{{$cartItem->id}}">
                            <?php if (isset($cartItem) && $cartItem->price != $cartItem->unitPrice): ?>
                            <del style="color: grey">{{ \App\Helpers\Helper::formatVnd($cartItem->price * $cartItem->quantity) }}</del>
                            <?php endif; ?>
                            {{ \App\Helpers\Helper::formatVnd($cartItem->unitPrice * $cartItem->quantity)  }} vnđ
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
                    <span class="sub-total">{{\App\Helpers\Helper::formatVnd($totalPrice + $totalPromo)  }} vnđ</span>
                </li>
                <li class="text">
                    <p>Khuyến mại</p>
                    <span class="promo-price">- {{ App\Helpers\Helper::formatVnd($totalPromo) }} vnđ</span>
                </li>

                <li class="text">
                    <p>Phí vận chuyển</p>
                    <span>MIỄN PHÍ</span>
                </li>
            </ul>
            <hr>
            <div class="total">
                <p>Tổng</p>
                <span class="total-price">{{ App\Helpers\Helper::formatVnd($totalPrice) }} vnđ</span>
            </div>
        </div>
    </div>
</div>

<footer>

</footer>


<script src="assets/vendors/js/base/jquery.min.js"></script>
{{--<script src="assets/vendors/js/base/core.min.js"></script>--}}

<script src="assets/vendors/js/app/app.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

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
            $('.total-price').load(' .total-price');
            $('.sub-total').load(' .sub-total');
            $('.promo-price').load(' .promo-price');
            $('.item-price-'+data.id).load(' .item-price-'+data.id);
        })
    })
    function updateCart(data) {
        $.ajax({
            url: '/cart/update?id='+ data.id + '&quantity=' +data.quantity,
            method: 'POST',
            success: function (data) {
                console.log(data)
            },
            error: function (data) {
                console.log(data)
            }
        })
    }
</script>

</body>
</html>
