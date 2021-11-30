<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đặt hàng</title>

    <!-- Favicon -->
    <link rel="icon" href="user/img/food.svg" sizes="any" type="image/svg+xml">

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
    <link rel="stylesheet" href="user/css/main.css">
    <link rel="stylesheet" href="user/css/home.css">
    <link rel="stylesheet" href="user/css/checkout.css">

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
<header id="nav">

    <a href="#" class="logo"><i class="fas fa-utensils"></i>vietkitchen</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="/cart">
            <i class="fas fa-shopping-cart"></i>
            <span class='badge badge-warning' id='lblCartCount'>{{$totalQuantity}}</span>
        </a>
        <a href="/sign_in"> Đăng nhập</a>
    </nav>

</header>
<div role="main" class="checkout-body">
    <div class="shipping col-md-8" style="padding-top: 120px">
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
                    <a style="color: black" class="add-more" href="/products  ">Chọn thêm sản phẩm</a>
                </div>
                @foreach($shoppingCart as $cartItem)
                    <div class="list-item mt-4">
                        <input class="quantity-checkout" type="number" min="1" data-id="{{ $cartItem->id }}" value={{ $cartItem->quantity }}>
                        {{--                        <div class="quantity">{{ $cartItem->quantity }}</div>--}}
                        <div class="name"> {{ $cartItem->name }}</div>
                        <div class="price item-price-{{$cartItem->id}}">
{{--                            <?php if (isset($cartItem) && $cartItem->price != $cartItem->unitPrice): ?>--}}
{{--                            <del class ="del-price-{{$cartItem->id}}" style="color: grey">{{ \App\Helpers\Helper::formatVnd($cartItem->price * $cartItem->quantity) }}</del>--}}
{{--                            <?php endif; ?>--}}
                            {{ \App\Helpers\Helper::formatVnd($cartItem->unitPrice * $cartItem->quantity)  }} vnđ
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>

        </div>
    </div>
    <div class="cart col-md-4"  style="padding-top: 120px">
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

<footer class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-6">
            <h3><strong>Project Sem 2</strong></h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book.</p>
        </div>
        <div class="col-lg-3 col-md-4 col-6 information">
            <h3><strong>INFORMATION</strong></h3>
            <a href="/about-us.php"><p>About Us</p></a>
            <a href="/contact-us.php"><p>Contact Us</p></a>
            <a href=""><p>Privacy Policy</p></a>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-md-0 mt-5 address">
            <h3><strong>GET IN TOUCH</strong></h3>
            <p>Address: 123 Main Your address goes here.</p>
            <p>Telephone Enquiry: (012) 800 456 789-987</p>
            <p>Email: Info@example.com</p>
        </div>
        <div class="col-lg-3 col-md-4 col-6 mt-lg-0 mt-5 share">
            <h3><strong>FOLLOW US</strong></h3>
            <i class="fab fa-facebook fa-2x"></i>
            <i class="fab fa-twitter fa-2x"></i>
            <i class="fab fa-youtube fa-2x"></i>
            <i class="fab fa-instagram fa-2x"></i>
        </div>
        <div class="col-12 copyright">
            <h3>Copyright © 2021 Project Sem 2</h3>
        </div>
    </div>
</footer>

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
            url: '/cart/update?id='+ data.id + '&quantity=' +data.quantity,
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
    function updatePrice(data){
        let totalQuantity = 0;
        let subTotal = 0;
        let promoPrice = 0;
        for (let key in data){
            console.log(data[key]);
            let itemDelPrice = data[key].price * data[key].quantity;
            let itemPrice = data[key].unitPrice * data[key].quantity;
            totalQuantity += data[key].quantity * 1;
            promoPrice += (data[key].price - data[key].unitPrice) * data[key].quantity;
            subTotal += itemDelPrice
            // $('.del-price-'+data[key].id).html(itemDelPrice.toLocaleString("en-US"));
            $('.item-price-'+data[key].id).html(itemPrice.toLocaleString("en-US") + ' vnđ');
        }
        let totalPrice = subTotal - promoPrice;
        $('.total-price').html(totalPrice.toLocaleString("en-US") + ' vnđ');
        $('.sub-total').html(subTotal.toLocaleString("en-US") + ' vnđ');
        $('.promo-price').html('- ' + promoPrice.toLocaleString("en-US") + ' vnđ');
        $('#lblCartCount').html(totalQuantity);
    }
</script>

</body>
</html>
