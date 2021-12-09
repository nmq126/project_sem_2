
<body class="bg-white">
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
                                    <td bgcolor="#ffffff" width="100" align="left" style="border-radius: 4px 0 0 0;">
                                        <a href="http://127.0.0.1:8000/home" target="_blank">
                                            <img alt="Logo" src="https://res.cloudinary.com/dz0vbjbye/image/upload/v1638807022/logo/logo-removebg-preview_fvw3oj.png" width="60" height="40"
                                                 style="display: block; font-family: Helvetica, Arial, sans-serif; color: #666666; font-size: 16px; padding: 30px 0 30px 15px;"
                                                 border="0">
                                        </a>
                                    </td>
{{--                                    <td bgcolor="#ffffff" width="400" align="right" class="mobile-hide"--}}
{{--                                        style="border-radius: 0 4px 0 0;">--}}
{{--                                        <table border="0" cellpadding="0" cellspacing="0">--}}
{{--                                            <tr>--}}
{{--                                                <td align="right"--}}
{{--                                                    style="padding: 30px 15px 30px 0; font-size: 15px; font-family: Noto Sans, Arial, sans-serif; color: #94a4b0; text-decoration: none;">--}}
{{--                                                    <span style="color: #94a4b0; text-decoration: none;"></span>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        </table>--}}
{{--                                    </td>--}}
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
                                                    class="padding-copy">VietKitchen đã nhận được đơn hàng của bạn
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"
                                                style="padding: 20px 15px 0 15px; font-size: 15px; line-height: 25px; font-family: Noto Sans, Arial, sans-serif; color: #aea9c3;"
                                                class="padding-copy">
                                                @if($order->status == \App\Enums\OrderStatus::WaitForCheckout)
                                                    Vui lòng thanh toán đơn hàng của bạn để hoàn tất đơn hàng bạn nhé.
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
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-button-container" bgcolor="#ffffff">
                                        <tr>
                                            <td align="center" style="padding: 25px 0 0 0;" class="padding-copy">
                                                <table border="0" cellspacing="0" cellpadding="0" class="responsive-table">
                                                    <tr>
                                                        <td align="center"><a href="http:/127.0.0.1:8000/order/{{ $order->id }}" target="_blank" style="font-size: 16px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #ffffff; text-decoration: none; background-color: #e02c2b; border-top: 15px solid #e02c2b; border-bottom: 15px solid #e02c2b; border-left: 35px solid #e02c2b; border-right: 35px solid #e02c2b; border-radius: 35px; -webkit-border-radius: 35px; -moz-border-radius: 35px; display: inline-block;" class="mobile-button">Chi tiết đơn hàng</a></td>
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
                                                    <p style="color: red">Chưa thanh toán</p>
                                                    @break
                                                    @case(\App\Enums\OrderStatus::Waiting)
                                                    <p style="color: #85ff7f">Chờ xác nhận</p>
                                                    @break
                                                    @case(\App\Enums\OrderStatus::Processing)
                                                    <p style="color: #85ff7f">Đang xử lý</p>
                                                    @break
                                                    @case(\App\Enums\OrderStatus::Delivering)
                                                    <p style="color: #85ff7f">Đang giao</p>
                                                    @break
                                                    @case(\App\Enums\OrderStatus::Done)
                                                    <p style="color: #85ff7f">Hoàn tất</p>
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
                                                            Tạm tính: {{ \App\Helpers\Helper::formatVnd($order->total_price) }} vnđ<br>Phí vận chuyển:
                                                            MIỄN PHÍ<br><br><span
                                                                style="font-size: 20px; color: #e02c2b;">Tổng: {{ \App\Helpers\Helper::formatVnd($order->total_price) }} vnđ</span>
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
                                                VietKichen qua tổng đài <strong>19000091</strong> hoặc tại địa chỉ email <a
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
                                        <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638374021/mail-stuff/ico-facebook_rbk47y.png" alt="..." width="40" height="40"
                                             style="display: inline-block;" border="0">
                                    </a>
                                    <span class="original-only"
                                          style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="#">
                                        <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638374021/mail-stuff/ico-twitter_rkjuyn.png" alt="..." width="40" height="40"
                                             style="display: inline-block;" border="0">
                                    </a>
                                    <span class="original-only"
                                          style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <a href="#">
                                        <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638374021/mail-stuff/ico-instagram_gsb0za.png" alt="..." width="40" height="40"
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
                                    <span class="appleFooter" style="color:#aea9c3;">8 Tôn Thất Thuyết, Mỹ Đình, Hà Nội</span><br><a
                                        class="original-only" style="color: #5d5386; text-decoration: underline;"
                                        href="/about-us">About us</a><span class="original-only"
                                                                           style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span><a
                                        class="original-only" style="color: #5d5386; text-decoration: underline;"
                                        href="/contact-us">Contact</a><span class="original-only"
                                                                            style="font-family: Arial, sans-serif; font-size: 12px; color: #444444;">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span><a
                                        class="original-only" style="color: #5d5386; text-decoration: underline;"
                                        href="http://127.0.0.1:8000/home">Home</a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
