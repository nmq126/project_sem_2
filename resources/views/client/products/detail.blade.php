<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Detail</title>
    <link rel="shortcut icon" type="image/x-icon" href="/../user/img/favicon.ico">

    <link rel="stylesheet" href="/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/user/css/Main.css">
    <link rel="stylesheet" href="/user/css/Product-detail1.css">
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
        <div class="mr-4 pl-3 pt-1 icon">
            <span class="badge">3</span>
            <a href="cart"><img src="" class="fa fa-shopping-cart fa-lg cart-top" alt=""></a>
            <img src="" class="fa fa-bars fa-lg" alt="" onclick="menu()">
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 mt-3 mb-3 pr-4">
            <span><a href="/home">Home</a> / <a href="/products">Product</a> / <a href="">Detail</a></span>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="product-wrap row col-12 pb-5">
            <div class="col-md-6 product-wrap-left text-center">
                <div class="col-12">
                    <img src="{{$product->thumbnail}}" id="show-img" width="70%" height="70%"
                         alt="{{$product->name}}">
                </div>
                <div class="col-12 d-flex">
                </div>
            </div>
            <div class="col-md-6 product-wrap-right">
                <div class="product-wrap-detail">
                    <div class="pwd-title">
                        <h2>{{$product->name}}
                        </h2>
                    </div>
                    <div class="pwd-info col-12">
                        <div class="col-lg-6 col-12">
                            <strong>Condition:</strong> Available
                        </div>
                        <div class="col-lg-6 col-12">
                            <strong>Product ID:</strong> Update
                        </div>
                    </div>
                    <div class="pwd-price">
                        <div>
                            <del class="pwd-price-compare">$ 9999</del>
                            <span class="pwd-price-main">$ {{$product->price}}</span>
                            <span class="pwd-price-discount">Save 10%</span>
                        </div>
                    </div>
                    <div class="number mt-4">
                        <span class="minus">-</span>
                        <input id="qty" type="text" value="1"/>
                        <span class="plus">+</span>
                    </div>
                    <div class="pwd-action mt-4">
                        <a href="add-to-cart?id=<%= item._id %>">
                            <button>ADD TO CART</button>
                        </a>
                        <a href="cart">
                            <button>BUY</button>
                        </a>
                    </div>
                    <div class="share mt-3">
                        <i class="fa fa-facebook fa-md" aria-hidden="true"></i>
                        <i class="fa fa-google fa-md" aria-hidden="true"></i>
                        <i class="fa fa-twitter fa-md" aria-hidden="true"></i>
                        <i class="fa fa-pinterest fa-md" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <ul class="nav nav-pills product-description col-12 mt-5" role="tablist">
                <li role="presentation" class="active col-lg-2 col-md-3"><a href="#Description" aria-controls="home"
                                                                            role="tab"
                                                                            data-toggle="tab"><h5>Description</h5></a>
                </li>
                <li role="presentation" class="col-md-3 col-lg-2"><a href="#review" aria-controls="profile" role="tab"
                                                                     data-toggle="tab"><h5>Review</h5></a></li>
            </ul>
            <div class="tab-content mt-4" style="width: 100%">
                <div role="tabpanel" class="tab-pane active" id="Description">{{$product->description}}
                </div>
                <div role="tabpanel" class="tab-pane" id="review">
                    <div class="fb-comments" data-href="http://127.0.0.1:8000/product/{{$product->id}}" data-width="100%"
                         data-numposts="10"></div>
                </div>
            </div>
        </div>
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
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=980205812730468&autoLogAppEvents=1"
        nonce="tratXySK"></script>
<script>
    var img = document.getElementsByClassName("img");
    var show = document.getElementById("show-img");

    function showimg0() {
        show.src = img[0].src
        img[0].style.border = "1px solid rgba(0,0,0, 0.3)"
        img[1].style.border = "none"
        img[2].style.border = "none"
    }

    function showimg1() {
        show.src = img[1].src;
        img[1].style.border = "1px solid rgba(0,0,0, 0.3)"
        img[0].style.border = "none"
        img[2].style.border = "none"
    }

    function showimg2() {
        show.src = img[2].src;
        img[2].style.border = "1px solid rgba(0,0,0, 0.3)"
        img[1].style.border = "none"
        img[0].style.border = "none"
    }
</script>
<script src="/user/js/Main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });
</script>
<script>
    const moment = require('moment');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
