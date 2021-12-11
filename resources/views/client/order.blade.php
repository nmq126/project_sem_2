<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="orderId" content="{{$order->id}}">
    <link rel="icon" href="{{asset('user/img/favicon.ico')}}" sizes="any" type="image/svg+xml">
    <title>Đơn hàng</title>

    <!-- Favicon -->
    <link rel="icon" href="/user/img/favicon.ico" sizes="any" type="image/svg+xml">

    <link rel="stylesheet" href="Hung/css/style.css">
    <link rel="stylesheet" href="{{asset('user/css/home.css')}}">
    <link rel="stylesheet" href="user/css/main.css">


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
    <link rel="stylesheet" href="/user/css/main.css">
    <link rel="stylesheet" href="/user/css/home.css">
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
<!-- Begin Header -->
<table class="" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
    <tr>
        <td bgcolor="#f2f3f8">
            <div align="center" style="padding: 0 15px 0 15px;">
                <table border="0" cellpadding="0" cellspacing="0" width="600" class="wrapper">
                    <!-- Begin Logo -->
                    <tr>
                        <td class="logo" style="padding-top: 80px">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td bgcolor="#ffffff" style="text-align: center; padding-top: 30px">
                                        <a href="/home" style="font-size: 40px; color: #666"><img src="{{asset('user/img/logo.png')}}" width="70px" alt="">
                                            VietKitchen</a>
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
                                                @if($order->status == \App\Enums\OrderStatus::WaitForCheckout)
                                                    Chỉ còn một bước cuối cùng!! Vui lòng thanh toán đơn hàng của bạn để
                                                    hoàn tất đơn hàng bạn nhé.
                                                @elseif($order->checkout)
                                                    Bạn đã thanh toán thành công <br> Đơn hàng sẽ được giao tới bạn
                                                    trong thời gian sớm nhất, cảm ơn bạn
                                                    đã sử dụng dịch vụ của VietKitchen
                                                @else
                                                    Đơn hàng sẽ được giao tới bạn trong thời gian sớm nhất, cảm ơn bạn
                                                    đã sử dụng dịch vụ của VietKitchen
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
                                                        @if($order->status == \App\Enums\OrderStatus::WaitForCheckout)
                                                            <div id="paypal-button"></div>
                                                        @else
                                                            <td align="center"><a href="/products" target="_blank"
                                                                                  style="font-size: 18px; font-weight: bolder; color: #ffffff; text-decoration: none; background-color: #e02c2b; border-top: 15px solid #e02c2b; border-bottom: 15px solid #e02c2b; border-left: 35px solid #e02c2b; border-right: 35px solid #e02c2b; border-radius: 10px; -webkit-border-radius: 10px; -moz-border-radius: 10px; display: inline-block;"
                                                                                  class="mobile-button">Tiếp tục mua
                                                                    hàng</a></td>

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
                                                <br>
                                                @switch($order->status)
                                                    @case(\App\Enums\OrderStatus::WaitForCheckout)
                                                    <p style="color: #e02c2b">Chưa thanh toán</p>
                                                    @break
                                                    @case(\App\Enums\OrderStatus::Waiting)
                                                    <p style="color: #e02c2b">Chờ xác nhận</p>
                                                    @break
                                                    @case(\App\Enums\OrderStatus::Processing)
                                                    <p style="color: #e02c2b">Đang xử lý</p>
                                                    @break
                                                    @case(\App\Enums\OrderStatus::Delivering)
                                                    <p style="color: #e02c2b">Đang giao</p>
                                                    @break
                                                    @case(\App\Enums\OrderStatus::Done)
                                                    <p style="color:#e02c2b">Hoàn tất</p>
                                                    @break
                                                    @case(\App\Enums\OrderStatus::Cancel)
                                                    <p style="color: grey">Đã hủy</p>
                                                    @break
                                                @endswitch
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
                                                                style="padding: 10px 0 0 0; font-family: Noto Sans, Arial, sans-serif; color: #2c304d; font-size: 15px; line-height: 24px;">{{ \App\Helpers\Helper::formatVnd($orderDetail->unit_price * $orderDetail->quantity) }}
                                                                đ
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
                                                            Tạm
                                                            tính: {{ \App\Helpers\Helper::formatVnd($order->total_price) }}
                                                            đ<br>Phí vận chuyển:
                                                            MIỄN PHÍ<br><br><span
                                                                style="font-size: 25px; color: #e02c2b;">TỔNG: {{ \App\Helpers\Helper::formatVnd($order->total_price) }} đ</span>
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
                                                VietKitchen qua tổng đài <strong>19000091</strong> hoặc tại địa chỉ email <a
                                                    class="original-only"
                                                    style="color: #5d5386; text-decoration: underline;" href="mailto:vietkitchen.hn@gmail.com">vietkitchen.hn@gmail.com</a>
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
            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
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
            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td style="padding: 0 15px 0 15px;">
                        <!-- UNSUBSCRIBE COPY -->
                        <table width="600" border="0" cellspacing="0" cellpadding="0" align="center"
                               class="responsive-table">
                            <tr>
                                <td align="center" valign="middle"
                                    style="font-size: 12px; line-height: 24px; font-family: Noto Sans, Arial, sans-serif; color:#aea9c3; padding-bottom: 35px; border-radius: 0 0 4px 4px;"
                                    bgcolor="#ffffff">
                                    <span class="appleFooter"
                                          style="color:#aea9c3;">8 Tôn Thất Thuyết, Mỹ Đình, Hà Nội</span><br><a
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

<!-- scroll top button  -->
<a href="#home" class="fas fa-angle-up" id="scroll-top"></a>

<footer>

</footer>

<script src="/assets/vendors/js/base/jquery.min.js"></script>
<script src="/assets/vendors/js/base/core.min.js"></script>

<script src="/assets/vendors/js/app/app.min.js"></script>

<!-- custom js file link  -->
<script src="/user/js/main.js"></script>


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
