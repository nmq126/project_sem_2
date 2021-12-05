<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông Tin Tài Khoản</title>
    <!-- Favicon -->
    <link rel="icon" href="user/img/food.svg" sizes="any" type="image/svg+xml">

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

    <link rel="stylesheet" href="Hung/css/bootstrap.min.css">
    <link rel="stylesheet" href="Hung/css/style.css">
    <link rel="stylesheet" href="Hung/css/responsive.css">
    <link rel="stylesheet" href="{{asset('Hung/css/theme-default.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="Hung/js/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="user/css/main.css">
    <link rel="stylesheet" href="user/css/home.css">
    {{--    <link rel="stylesheet" href="user/css/responsive.css">--}}
</head>
<body>
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
                <li class="active">Thông Tin Tài Khoản</li>
            </ul>
        </div>
    </div>
</div>
@if(Auth::check())
    <div class="customer-page theme-default-margin my-account-page pt-50 pb-50">
        <div class="container">
            <h1>Tài Khoản Của Tôi
                <span class="logout-title"><a href="/my-account/logout">Đăng Xuất</a></span>
            </h1>
            <hr class="hr--small">
            <div class="grid">
                <div class="grid__item one-third medium-down--one-whole mt-md-0 mt-5">
                    <h2 class="text-center">Thông Tin Tài Khoản</h2>
                    <p><strong>Tên:</strong> {{Auth::user()->email}}</p>
                    <p><strong>Số Điện Thoại:</strong> {{Auth::user()->phone}}</p>
                </div>
                <div class="grid__item two-thirds medium-down--one-whole">
                    <h2 class="text-center">Lịch Sử Đặt Hàng</h2>
                    <form action="/my-account" method="get" class="mb-20">
                        <ul id="faq">
                            <li><a data-bs-toggle="collapse" data-parent="#faq" href="#shop-catigory-3"
                                   style="font-size: 20px">Bộ Lọc Đơn Hàng
                                    <i class="fa fa-angle-down ml-20" style="font-size: 20px"></i></a>
                                <ul id="shop-catigory-3" class="panel-collapse collapse mt-10 container-fluid">
                                    <form class="price_filter mt-10" action="/my-account" method="get">
                                        <div class="row">
                                            <div class=" col-6">
                                                <label for="keyword" style="">Từ Khóa:</label>
                                                <input type="text" name="keyword" placeholder="Tên khách hàng, Địa chỉ hoặc SĐT">
                                                <label for="from" class="mt-3">Từ Ngày:</label>
                                                <input type="date" name="from">
                                                <label for="to" class="mt-3">Đến Ngày:</label>
                                                <input type="date" name="to">
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
                                                <label for="to" class="mt-10">Trạng Thái:</label>
                                                <select name="status">
                                                    <option value="all">Tất Cả</option>
                                                    <option value="paid">Đã Thanh Toán</option>
                                                    <option value="not-paid">Chưa Thanh Toán</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="price_slider_amount text-center mt-30">
                                            <button class="mb-10" type="submit">Tìm Kiếm
                                            </button>
                                        </div>
                                    </form>
                                </ul>
                            </li>
                        </ul>
                    </form>
                    <div class="table-content table-responsive order-table">
                        <table>
                            <thead>
                            <tr>
                                <th>Tên Khách Hàng</th>
                                <th>Địa Chỉ Nhận</th>
                                <th>Số Điện Thoại</th>
                                <th>Tổng Đơn Hàng</th>
                                <th>Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->ship_name}}</td>
                                    <td>{{$order->ship_address}}</td>
                                    <td>{{$order->ship_phone}}</td>
                                    <td class="product-subtotal">{{\App\Helpers\Helper::formatVnd($order->total_price)}}
                                        VND
                                    </td>
                                    <td class="product-remove">
                                        <a href="/my-account/order/id={{$order->id}}"><i class="fa fa-info-circle fa-2x"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($orders->lastpage() > 1)
                        <div class="pagination-style pt-20">
                            <ul class="text-center">
                                <li><a class="prev-next prev" href="{{$orders->url(1)}}"><i
                                            class="fa fa-arrow-left {{($orders->currentPage() == 1) ? 'disabled': ''}}"></i>
                                        Prev</a></li>
                                @for($i = 1; $i <= $orders->lastPage(); $i++)
                                    <li><a class="{{($orders->currentPage() == $i) ? 'active': ''}}"
                                           href="{{$orders->url($i)}}">{{$i}}</a></li>
                                @endfor
                                <li>
                                    <a class="prev-next next {{($orders->currentPage() == $orders->lastPage()) ? 'disabled': ''}}"
                                       href="{{$orders->nextPageUrl()}}">Next<i class="fa fa-arrow-right"></i>
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
        <a href="/login" class="btn pb-35">Đăng Nhập</a>
    </div>
@endif
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
                                <li><a href="my-account.html">Thông tin tài khoản</a></li>
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
                <div class="col-lg-6 col-md-6 col-sm-7">
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
<script src="Hung/js/bootstrap.min.js"></script>
<script src="Hung/js/main.js"></script>
<script src="user/js/main.js"></script>
</body>
</html>
