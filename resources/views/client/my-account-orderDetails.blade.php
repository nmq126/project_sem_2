<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông Tin Tài Khoản | VietKitchen</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('user/img/favicon.ico')}}" sizes="any" type="image/svg+xml">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
    {{--    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">--}}

    <link rel="stylesheet" href="{{asset('Hung/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('Hung/css/theme-default.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="{{asset('Hung/js/modernizr-2.8.3.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('user/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/home.css')}}">
    {{--    <link rel="stylesheet" href="user/css/responsive.css">--}}
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
<header id="nav">

    <a href="/home" class="logo"><img src="/user/img/logo.png" alt="">VietKitchen</a>

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
                <li><a href="/my-account">Tài Khoản Của Tôi</a></li>
                <li class="active">Chi Tiết Đơn Hàng</li>
            </ul>
        </div>
    </div>
</div>
@if(Auth::check())
    <div class="customer-page theme-default-margin my-account-page pt-50 pb-50">
        <div class="container">
            <h1>Tài Khoản Của Tôi
                <span class="logout-title"><a href="/my-account">Trở lại</a></span>
            </h1>
            <hr class="hr--small">
            <div class="grid">
                <div class="grid__item one-third medium-down--one-whole mt-md-0 mt-5">
                    <h2 class="text-center" style="font-size: 25px">Thông Tin Đơn Hàng</h2>
                    <p><strong>Ngày tạo đơn hàng: </strong> {{$orders->created_at->format('H:i:s d/m/Y')}}</p>
                    <p><strong>Người nhận: </strong> {{$orders->ship_name}}</p>
                    <p><strong>Địa chỉ :</strong> {{$orders->ship_address}}</p>
                    <p><strong>Số điện thoại:</strong> {{$orders->ship_phone}}</p>
                    <p><strong>Ghi chú:</strong> {{$orders->ship_note}}</p>
                    <p><strong>Trạng Thái:</strong>
                        @switch($orders->status)
                            @case(-2)
                            Đã hủy
                            @break
                            @case(0)
                            Chờ thanh toán
                            @break
                            @case(1)
                            Chờ xử lý
                            @break
                            @case(2)
                            Đang xử lý
                            @break
                            @case(3)
                            Đang giao hàng
                            @break
                            @case(4)
                            Đã hoàn thành
                            @break
                        @endswitch
                    </p>
                    <p><strong>Thanh toán: </strong>
                        @if($orders->checkout == 0 && $orders->status == 0) Thanh toán online qua paypal
                        @endif
                        @if($orders->checkout == 1) Đã thanh toán
                        @endif
                        @if($orders->checkout == 0 && $orders->status != 0) Thanh toán khi nhận hàng
                        @endif
                    </p>
                    <div class="mt-2 me-5"><h4>Tổng số tiền: <span>{{\App\Helpers\Helper::formatVnd($orders->total_price)}} đ</span>
                        </h4>
                    </div>
                    @if($orders->status == 0)
                        <div class="text-center mt-40">
                            <a href="/order/{{ $orders->id }}">
                                <button class="btn">Đi tới trang thanh toán</button>
                            </a>
                        </div>
                    @endif
                    {{--                    <div class="text-center">--}}
                    {{--                        <a href="/my-account" class="return"><button type="button" class="btn-grey">Quay Về  </button></a>--}}
                    {{--                    </div>--}}
                </div>
                <div class="grid__item two-thirds medium-down--one-whole">
                    <h2 class="text-center" style="font-size: 25px">Chi Tiết Đơn Hàng</h2>
                    <form action="/my-account/order/id={{$orders->id}}" method="get" class="mb-20">
                        <ul id="faq">
                            <li><a data-bs-toggle="collapse" data-parent="#faq" href="#shop-catigory-3"
                                   style="font-size: 20px">Bộ Lọc Sản Phẩm
                                    <i class="fa fa-angle-down ml-20" style="font-size: 20px"></i></a>
                                <ul id="shop-catigory-3" class="panel-collapse collapse mt-10 container-fluid">
                                    <div class="price_filter mt-10">
                                        <div class="row">
                                            <div class=" col-6">
                                                <label for="name" style="">Tên Sản Phẩm:</label>
                                                <input type="text" name="name">
                                            </div>
                                            <div class=" col-6">
                                                <div class="row">
                                                    <div class="col-xl-6 col-12">
                                                        <label for="keyword" class="col-6">Giá Trị Từ:</label>
                                                        <input type="number" name="from-price">
                                                    </div>
                                                    <div class="col-xl-6 col-12 mt-xl-0 mt-3">
                                                        <label for="from">Đến:</label>
                                                        <input type="number" name="to-price"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price_slider_amount text-center mt-30">
                                            <button class="mb-10" type="submit" style="font-size: 15px">Tìm Kiếm
                                            </button>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </form>
                    <div class="table-content table-responsive order-table">
                        <table>
                            <thead>
                            <tr>
                                <th style="min-width: 130px">Ảnh</th>
                                <th>Sản Phẩm</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Số tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetails as $orderDetail)
                                <tr>
                                    <td><a href="/product/{{$orderDetail->product->id}}/details"> <img width="100px" height="100px"
                                                         src="{{$orderDetail-> product -> thumbnail}}"
                                                         alt=""></a></td>
                                    <td><a href="/product/{{$orderDetail->product->id}}/details">{{$orderDetail-> product -> name}}</a></td>
                                    <td>{{\App\Helpers\Helper::formatVnd($orderDetail->unit_price)}} đ</td>
                                    <td>{{$orderDetail->quantity}}</td>
                                    <td class="product-subtotal">
                                        {{\App\Helpers\Helper::formatVnd($orderDetail->quantity * $orderDetail->unit_price)}}
                                        đ
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($orderDetails->lastpage() > 1)
                        <div class="pagination-style pt-20">
                            <ul class="text-center" style="display: flex; justify-content: center; align-items: center">
                                <li><a class="prev-next prev" href="{{$orderDetails->previousPageUrl()}}"><i
                                            class="fa fa-arrow-left {{($orderDetails->currentPage() == 1) ? 'disabled': ''}}"></i>
                                        Prev</a></li>
                                @for($i = 1; $i <= $orderDetails->lastPage(); $i++)
                                    <li><a class="{{($orderDetails->currentPage() == $i) ? 'active': ''}}"
                                           href="{{$orderDetails->url($i)}}">{{$i}}</a></li>
                                @endfor
                                <li>
                                    <a class="prev-next next {{($orderDetails->currentPage() == $orderDetails->lastPage()) ? 'disabled': ''}}"
                                       href="{{$orderDetails->nextPageUrl()}}">Next<i class="fa fa-arrow-right"></i>
                                    </a></li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@else
    <div class="text-center mb-40">
        <h2 class="">Vui Lòng Đăng Nhập Vào Tài Khoản Của Bạn</h2>
        <a href="/login" class="btn" style="padding-bottom: 35px">Đăng Nhập</a>
    </div>
@endif
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
<a href="#home" class="fas fa-angle-up" id="scroll-top" onclick="onScrollUp()"></a>
<script src="{{asset('Hung/js/bootstrap.min.js')}}"></script>
<script src="{{asset('Hung/js/main.js')}}"></script>
<script src="{{asset('user/js/main.js')}}"></script>

<script src="{{asset('Hung/js/jquery-1.12.4.min.js')}}"></script>
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
