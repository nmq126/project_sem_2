<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đơn hàng</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="orderId" content="{{$order->id}}">
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
    <link rel="stylesheet" href="/assets/vendors/css/base/bootstrap.min.css">
{{--    <link rel="stylesheet" href="/assets/vendors/css/base/elisyam-1.5.min.css">--}}
    <link rel="stylesheet" href="/user/css/checkout.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body class="bg-white">
<!-- Begin Preloader -->
<div id="preloader">
    <div class="canvas">
        <img src="/user/img/loader.gif" alt="">
    </div>
</div>
<!-- End Preloader -->

<header>
    <div class="container col-12">
        <div class="logo">
            <h2>VietKitchen</h2>
        </div>
        <div class="searchBar">
            <div class="header-option">
                <span>Search</span>
            </div>
            <div class="header-option">
                Login
            </div>
        </div>
    </div>
</header>

<!-- Begin Header -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#f2f3f8">
            <div align="center" style="padding: 0 15px 0 15px;">
                <table border="0" cellpadding="0" cellspacing="0" width="600" class="wrapper">
                    <!-- Begin Logo -->
                    <tr>
                        <td class="logo">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td bgcolor="#ffffff" width="100" align="left" style="border-radius: 4px 0 0 0;">
                                        <a href="/home" target="_blank">
                                            <img alt="Logo" src="" width="180" height="120"
                                                 style="display: block; font-family: Helvetica, Arial, sans-serif; color: #666666; font-size: 16px; padding: 30px 0 30px 15px;"
                                                 border="0">
                                        </a>
                                    </td>
                                    <td bgcolor="#ffffff" width="400" align="right" class="mobile-hide"
                                        style="border-radius: 0 4px 0 0;">
                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="right"
                                                    style="padding: 30px 15px 30px 0; font-size: 15px; font-family: Noto Sans, Arial, sans-serif; color: #94a4b0; text-decoration: none;">
                                                    <span style="color: #94a4b0; text-decoration: none;"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- End Logo -->
                </table>
            </div>
        </td>
    </tr>
</table>
<!-- End Header -->
<!-- Begin Section -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="f2f3f8" align="center" style="padding: 0 15px 0 15px;" class="section-padding">
            <table border="0" cellpadding="0" cellspacing="0" width="600" class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <!-- Begin Content -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                        <tr>
                                            <td align="left"
                                                style="font-size: 25px; font-family: Montserrat, Arial, sans-serif; color: #2c304d; padding: 30px 15px 0 15px;"
                                                class="padding-copy">Đơn hàng của bạn đã được đặt thành công!
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="padding: 20px 15px 0 15px; font-size: 15px; line-height: 25px; font-family: Noto Sans, Arial, sans-serif; color: #aea9c3;"
                                                class="padding-copy">
                                                @if(!$order->checkout)
                                                    Chỉ còn một bước cuối cùng!! Vui lòng thanh toán đơn hàng của bạn để
                                                    hoàn tất đơn hàng bạn nhé.
                                                @else
                                                    Thanh toán thành công <br> Đơn hàng sẽ được giao tới bạn trong thời gian sớm nhất, cảm ơn bạn
                                                    đã sử dụng dịch vụ của ""
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Content -->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- Begin Button -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                           class="mobile-button-container" bgcolor="#ffffff">
                                        <tr>
                                            <td align="center" style="padding: 25px 0 0 0;" class="padding-copy">
                                                <table border="0" cellspacing="0" cellpadding="0"
                                                       class="responsive-table">
                                                    <tr>
                                                        @if(!$order->checkout)
                                                            <div id="paypal-button"></div>
                                                        @else
                                                            <td align="center"><a href="/product" target="_blank" style="font-size: 16px; font-weight: normal; color: #ffffff; text-decoration: none; background-color: #66E9AE; border-top: 15px solid #66E9AE; border-bottom: 15px solid #66E9AE; border-left: 35px solid #66E9AE; border-right: 35px solid #66E9AE; border-radius: 35px; -webkit-border-radius: 35px; -moz-border-radius: 35px; display: inline-block;" class="mobile-button">Tiếp tục mua hàng</a></td>

                                                        @endif
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Button -->
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- Begin Content -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                                        <tr>
                                            <td align="left"
                                                style="padding: 50px 15px 0 15px; font-size: 15px; line-height: 25px; font-family: Noto Sans, Arial, sans-serif; color: #aea9c3;"
                                                class="padding-copy">Order #{{ $order->id }}<br>{{ $order->created_at }}
                                                <br><br><span
                                                    style="color: #2c304d;">Giao tới:</span><br>{{ $order->ship_address }}
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Content -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- End Section -->
<!-- Begin Order Section -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#f2f3f8" align="center" style="padding: 0 15px 0 15px;" class="section-padding-bottom-image">
            <table border="0" cellpadding="0" cellspacing="0" width="600" class="responsive-table">
                <tr>
                    <td>
                        <!-- Begin Columns -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%" bgcolor="#ffffff">
                            <tr>
                                <td valign="middle" style="padding: 0;" class="mobile-wrapper">
                                    <!-- Left Column -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" align="left"
                                           class="responsive-table">
                                        <tr>
                                            <td style="padding: 20px 15px 0 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="left"
                                                            style="padding: 15px 0 0 15px; font-family: Montserrat, Arial, sans-serif; color: #2c304d; font-size: 21px;">
                                                            Sản phẩm
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Left Column -->
                                    <!-- Begin Right Column -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" align="right"
                                           class="responsive-table">
                                        <tr>
                                            <td style="padding: 20px 15px 0 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="right"
                                                            style="padding: 15px 0 0 0; font-family: Montserrat, Arial, sans-serif; color: #2c304d; font-size: 21px;">
                                                            Đơn giá
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Right Column -->
                                </td>
                            </tr>
                        </table>
                        <!-- End Columns -->
                        <!-- Begin Columns -->
                        @foreach($order->orderDetails as $orderDetail)
                            <table cellspacing="0" cellpadding="0" border="0" width="100%" bgcolor="#ffffff">
                                <tr>
                                    <td valign="middle" style="padding: 0;" class="mobile-wrapper">
                                        <!-- Left Column -->
                                        <table cellpadding="0" cellspacing="0" border="0" width="47%" align="left"
                                               class="responsive-table">
                                            <tr>
                                                <td style="padding: 10px 15px 0 0;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td align="left"
                                                                style="padding: 10px 0 0 15px; font-family: Noto Sans, Arial, sans-serif; color: #94a4b0; font-size: 15px; line-height: 24px;">
                                                                <span style="color: #2c304d;">{{ $orderDetail->product->name }} ({{ $orderDetail->quantity }})</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- End Left Column -->
                                        <!-- Begin Right Column -->
                                        <table cellpadding="0" cellspacing="0" border="0" width="47%" align="right"
                                               class="responsive-table">
                                            <tr>
                                                <td style="padding: 10px 15px 0 0;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <tr>
                                                            <td align="right"
                                                                style="padding: 10px 0 0 0; font-family: Noto Sans, Arial, sans-serif; color: #2c304d; font-size: 15px; line-height: 24px;">{{ $orderDetail->unit_price * $orderDetail->quantity }}
                                                                vnđ
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!-- End Right Column -->
                                    </td>
                                </tr>
                            </table>
                    @endforeach

                    <!-- End Columns -->
                        <!-- Begin Columns -->
                        <!-- End Columns -->
                        <!-- Begin Columns -->
                        <table cellspacing="0" cellpadding="0" border="0" width="100%" bgcolor="#ffffff">
                            <tr>
                                <td valign="middle" style="padding: 0;" class="mobile-wrapper">
                                    <!-- Begin Right Column -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="47%" align="right"
                                           class="responsive-table">
                                        <tr>
                                            <td style="padding: 20px 15px 0 0;">
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tr>
                                                        <td align="right"
                                                            style="padding: 40px 0 0 0; font-family: Noto Sans, Arial, sans-serif; color: #2c304d; font-size: 15px; line-height: 20px; border-top: 2px solid #eee;">
                                                            Tạm tính: {{ $order->total_price }} vnđ<br>Phí vận chuyển:
                                                            MIỄN PHÍ<br><br><span
                                                                style="font-size: 20px; color: #66E9AE;">Tổng: {{ $order->total_price }} vnđ</span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Right Column -->
                                </td>
                            </tr>
                        </table>
                        <!-- End Columns -->
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- End Order Section -->
<!-- Begin Help Section -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#f2f3f8" align="center" style="padding: 0 15px 0 15px;" class="section-padding-bottom-image">
            <table border="0" cellpadding="0" cellspacing="0" width="600" class="responsive-table">
                <tr>
                    <td>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                            <tr>
                                <td>
                                    <!-- Begin Content -->
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left"
                                                style="font-size: 25px; font-family: Helvetica, Arial, sans-serif; color: #2c304d; padding: 50px 15px 0 15px;"
                                                class="padding-copy">Cần hỗ trợ?
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="padding: 20px 15px 35px 15px; font-size: 15px; line-height: 25px; font-family: Helvetica, Arial, sans-serif; color: #aea9c3;"
                                                class="padding-copy">Nếu bạn cần bất kì sự hỗ trợ nào, vui lòng liên hệ
                                                "" qua tổng đài <strong>19000091</strong> hoặc tại địa chỉ email <a
                                                    class="original-only"
                                                    style="color: #5d5386; text-decoration: underline;" href="#">contact@example.com</a>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Content -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- End Help Section -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#f2f3f8" align="center">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td style="padding: 0 15px 0 15px;">
                        <!-- UNSUBSCRIBE COPY -->
                        <table width="600" border="0" cellspacing="0" cellpadding="0" align="center"
                               class="responsive-table">
                            <tr>
                                <td align="center" valign="middle"
                                    style="font-size: 12px; line-height: 24px; font-family: Noto Sans, Arial, sans-serif; color:#aea9c3; padding: 50px 0 35px 0;"
                                    bgcolor="#ffffff">
                                    <a href="#">
                                        <img src="/assets/img/email/ico-facebook.png" alt="..." width="40" height="40"
                                             style="display: inline-block;" border="0">
                                    </a>
                                    <span class="original-only"
                                          style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="#">
                                        <img src="/assets/img/email/ico-twitter.png" alt="..." width="40" height="40"
                                             style="display: inline-block;" border="0">
                                    </a>
                                    <span class="original-only"
                                          style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="#">
                                        <img src="/assets/img/email/ico-instagram.png" alt="..." width="40" height="40"
                                             style="display: inline-block;" border="0">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- End Social -->
<!-- Begin Footer -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#f2f3f8" align="center">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td style="padding: 0 15px 0 15px;">
                        <!-- UNSUBSCRIBE COPY -->
                        <table width="600" border="0" cellspacing="0" cellpadding="0" align="center"
                               class="responsive-table">
                            <tr>
                                <td align="center" valign="middle"
                                    style="font-size: 12px; line-height: 24px; font-family: Noto Sans, Arial, sans-serif; color:#aea9c3; padding-bottom: 35px; border-radius: 0 0 4px 4px;"
                                    bgcolor="#ffffff">
                                    <span class="appleFooter" style="color:#aea9c3;">8 Tôn Thất Thuyết, Mỹ Đình, Hà Nội</span><br><a
                                        class="original-only" style="color: #5d5386; text-decoration: underline;"
                                        href="/about-us">About us</a><span class="original-only"
                                                                      style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span><a
                                        class="original-only" style="color: #5d5386; text-decoration: underline;"
                                        href="/contact-us">Contact</a><span class="original-only"
                                                                  style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span><a
                                        class="original-only" style="color: #5d5386; text-decoration: underline;"
                                        href="/home">Home</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<footer>

</footer>

<script src="/assets/vendors/js/base/jquery.min.js"></script>
<script src="/assets/vendors/js/base/core.min.js"></script>

<script src="/assets/vendors/js/app/app.min.js"></script>


<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script>
    var orderId = document.querySelector('meta[name=orderId]').content;
    paypal.Button.render({
        env: 'sandbox', // Or 'production'
        // Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'medium',
            color: 'gold',
            shape: 'pill',
            label: 'paypal',
            tagline: 'false'
        },
        // Set up the payment:
        // 1. Add a payment callback
        payment: function (data, actions) {
            // 2. Make a request to your server
            return actions.request.post('/order/create-payment', {
                orderID: orderId
            })
                .then(function (res) {
                    // 3. Return res.id from the response
                    return res.id;
                });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback
        onAuthorize: function (data, actions) {
            // 2. Make a request to your server
            return actions.request.post('/order/execute-payment', {
                paymentID: data.paymentID,
                payerID: data.payerID,
                orderID: orderId

            })
                .then(function (res) {
                    // 3. Show the buyer a confirmation message.
                    alert('Payment success');
                    window.location.reload(false);
                });
        }
    }, '#paypal-button');
</script>
</body>
</html>
