<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Cart</title>
    <link rel="shortcut icon" type="image/x-icon" href="/../user/img/favicon.ico">

    <link rel="stylesheet" href="/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/user/css/Cart.css">
    <link rel="stylesheet" href="/user/css/Main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@300;600&display=swap" rel="stylesheet">
</head>
<body>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up fa-lg"></i></button>
<div id="nav" class="container-fluid">
    <div class="nav">
        <div class="logo ml-5 mt-1">
            <a href="home"><img src="/user/img/SIMPLON.png" width="93"
                                height="62" class="m-1" alt="">
            </a>
        </div>
        <nav class="pt-1">
            <ul id="MenuItems">
                <li><a href="home">Home</a></li>
                <li><a href="/products">Product</a></li>
                <li><a href="/about-us">About</a></li>
                <li><a href="/contact-us">Contact</a></li>
                <li><a href="/blog">Blog</a></li>
            </ul>
        </nav>
        @php
          $totalQuantity = 0;
        @endphp
        @foreach($shoppingCart as $item)
            @php
                if (isset($totalQuantity) && isset($item)){
                    $totalQuantity +=  $item->quantity;
                }
            @endphp
        @endforeach
        <div class="mr-4 pl-3 pt-1 icon">
            <span class="badge">{{ $totalQuantity }}</span>
            <a href="cart"><img src="" class="fa fa-shopping-cart fa-lg cart-top" alt=""></a>
            <img src="" class="fa fa-bars fa-lg" alt="" onclick="menu()">
        </div>
    </div>
</div>

<div class="container">
    <div class="col-12 mt-3 d flex d-inline-block">
        <span>
            <a href="/home">Home</a> / <a href="/cart">Cart</a>
        </span>
    </div>
</div>

<div class="container-sm cart-page">
    <div class="pb-2"><h1>Your Cart</h1></div>
    <table>
        <tr>
            <th class="pl-4">Product</th>
            <th>Quantity</th>
            <th class="pr-4">Subtotal</th>
        </tr>
        @php
            $totalPrice = 0;
        @endphp
        @foreach($shoppingCart as $item)
            @php
                if (isset($totalPrice) && isset($item)){
                    $totalPrice += $item->unitPrice * $item->quantity;
                }
            @endphp
            <tr>
                <form action="/cart/update" method="post">
                    @csrf
                    <td>
                        <div class="cart-info">
                            {{--                    <img src="{{ item }}" alt="">--}}
                            <div>
                                <p class="mb-2 font-weight-bolder">{{$item->name}}</p>
                                <small>$ {{$item->unitPrice}}</small>
                                <br>
                                <a href="/cart/remove?id={{$item->id}}"
                                   onclick="return confirm('Ban co chac muon xoa san pham khoi gio hang')">Remove</a>
                            </div>
                        </div>
                    </td>
                    <td class="pl-3">
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <input type="number" name="quantity" min="1" value="{{$item->quantity}}">
                        <button class="btn btn-outline-dark">Update</button>
                    </td>
                    <td class="font-weight-bolder pr-4">$ {{$item->unitPrice * $item->quantity}}</td>
                </form>
            </tr>
        @endforeach
    </table>

    <div class="total-price">
        <table>
            <tr>
                <td class="pl-4">Subtotal</td>
                <td class="pr-4">$ {{$totalPrice}}</td>
            </tr>
            <tr>
                <td class="pl-4">Tax</td>
                <td class="pr-4">FREE</td>
            </tr>
            <tr>
                <td class="pl-4">Total</td>
                <td class="pr-4"></td>
            </tr>
        </table>
    </div>

    <div class="text-right col-12 pr-4">
        <a href="/checkout">
            <button class="btn order-button">Order</button>
        </a>
    </div>
</div>


<div class="footer mt-5 pb-2 col-12">
    <div class="container">
        <div class="col-lg-3 col-sm-6 col-12 mt-5 float-left">
            <div class=>
                <div class="mb-3">
                    <h2 class=>NEED HELP?</h2>
                </div>
                <div>
                    <p><img src="" alt="" class="fa fa-phone"> (+84)972340417</p>
                    <p><img src="" alt="" class="fa fa-envelope"> support@simplon.com</p>
                    <p><img src="" alt="" class="fa fa-question-circle"><a href=""> FAQs</a></p>
                    <p><img src="" alt="" class="fa fa-credit-card"><a href=""> Payment Options</a></p>
                    <p><img src="" alt="" class="fa fa-truck"><a href=""> Shipping Services</a></p>
                </div>
            </div>
        </div>
        <div id="company" class="col-lg-3 col-sm-6 col-12 mt-5 float-left">
            <div class="mb-3">
                <h2>THE COMPANY</h2>
            </div>
            <p><a href="/about-us">About Us</a></p>
            <p><a href="/contact-us">Contact Us</a></p>
            <p>Code of Ethics</p>
            <p>Term of Use</p>
            <p>Privacy & Cookies</p>
            <p>Careers</p>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 mt-5 float-left">
            <div class="mb-3">
                <h2>FIND US ON</h2>
            </div>
            <p><img src="" alt="" class="fa fa-facebook"><a href="">Facebook</a></p>
            <p><img src="" alt="" class="fa fa-twitter"><a href="">Twitter</a></p>
            <p><img src="" alt="" class="fa fa-instagram"><a href="">Instagram</a></p>
            <p><img src="" alt="" class="fa fa-youtube"><a href="">Youtube</a></p>
        </div>
        <div id="partners" class="col-lg-3 col-sm-6 col-12 mt-5 text-left float-left partner">
            <div class="mb-3">
                <h2>OUR PARTNERS</h2>
            </div>
            <a href="https://www.lvmh.com/" target="_blank">
                <img src="https://res.cloudinary.com/nmq126/image/upload/v1620295211/download_w6rjtm.png"
                     alt="logo">
            </a>
            <a href="https://www.loreal.com/" target="_blank">
                <img src="https://res.cloudinary.com/nmq126/image/upload/v1620294916/brand_u9yftf.gif"
                     alt="logo">
            </a>
        </div>
        <div class="col-12 clearfix copy-right text-center">
            <div>
                <p>© 2021 FWS Team - No right reserved</p>
            </div>
        </div>
    </div>
</div>
<script src="/user/js/Main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
