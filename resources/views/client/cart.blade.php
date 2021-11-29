<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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

    <link rel="stylesheet" href="user/css/home.css">
    <link rel="stylesheet" href="user/css/main.css">
    <link rel="stylesheet" href="user/css/cart.css">
    {{--    <link rel="stylesheet" href="user/css/responsive.css">--}}
    @livewireStyles
</head>
<body>
<div id="preloader">
    <div class="canvas">
        <img src="user/img/loader.gif" alt="">
    </div>
</div>
@php
    use Illuminate\Support\Facades\Session;
        $shoppingCart = [];
        if (Session::has('shoppingCart')) {
            $shoppingCart = Session::get('shoppingCart');
        }
@endphp
@php
    $totalQuantity = 0;
@endphp
@foreach($shoppingCart as $cartItem)
    @php
        if (isset($totalQuantity) && isset($cartItem)) {
            $totalQuantity += $cartItem->quantity;
        }
    @endphp
@endforeach
<header id="nav">

    <a href="#" class="logo"><i class="fas fa-utensils"></i>vietkitchen</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="/sign_in"> Đăng Nhập </a>
        <a href="/products"> Cửa Hàng </a>
        <a href="/sign_in"> Liên Hệ </a>
        <a href="/sign_in"> Blog </a>
        <a href="/cart">
            <i class="fas fa-shopping-cart"></i>
            <span class='badge badge-warning' id='lblCartCount'>{{$totalQuantity}}</span>
        </a>
    </nav>
</header>

<div class="col-12 text-center mb-1" style="margin-top: 150px">
    <h2 class="fw-bolder fst-italic" style="font-size: 40px">Shopping Cart</h2>
</div>
<div class="product-cart">
    <div class="wrapper">
        <div class="cart-collection">
            <div class="cart-header">
                <p>Item</p>
                <p>Quantity</p>
                <p>Unit Price</p>
                <p>Total</p>
            </div>
            <div class="item">
                @php
                    $totalPrice = 0;
                @endphp
                @foreach($shoppingCart as $cartItem)
                    @php
                        if (isset($cartItem) && isset($totalPrice)) {
                            $totalPrice += $cartItem->unitPrice * $cartItem->quantity;
                        }
                    @endphp
                    <form action="">
                        <div class="cart-product">
                            <div class="cart-image">
                                <img
                                    src="{{$cartItem->thumbnail}}" width="100px" height="100px"
                                    alt="">
                            </div>
                            <div class="cart-product-info pl-5" style="padding-left: 20px">
                                <input type="hidden" name="id" value="{{$cartItem->id}}">
                                <p class="cart-product-name">{{$cartItem->name}}</p>
                                <p class="cart-price">${{$cartItem->unitPrice}}</p>
                                <div class="remove-md">
                                    <a href="/cart/remove?id={{$cartItem->id}}"
                                       onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này khỏi giỏ hàng?')"><span
                                            class="fas fa-trash"></span> Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="cart-quantity">
                            <div class="cart-quantity-controls">
                                <button>-</button>
                                <input class="text-center quantitys" data-id="{{$cartItem->id}}" name="quantity" type="number"
                                       value="{{$cartItem->quantity}}">
                                <button>+</button>
                            </div>
                        </div>
                        <div class="cart-unit-price">
                            <h5>${{$cartItem->unitPrice}}</h5>
                        </div>
                        <div class="cart-product-total" id="prices-{{$cartItem->id}}">
                            <h5>${{$cartItem->unitPrice * $cartItem->quantity}}</h5>
                        </div>
                        <div class="cart-controls">
                            <div class="remove">
                                <a href="/cart/remove?id={{$cartItem->id}}"
                                   onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này khỏi giỏ hàng?')"><span
                                        class="fas fa-trash"></span> Remove</a>
                            </div>
                            <div class="quantity-controls-sm">
                                <button>-</button>
                                <input class="text-center" name="quantity" type="number" value="{{$cartItem->quantity}}"
                                       readonly>
                                <button>+</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
        <div class="cart-total-holder">
            <div class="cart-total fw-bold">
                <p>Total:</p>
                <p>${{$totalPrice}}</p>
            </div>
            <div class="cart-action-button">
                <a href="">Continue Shopping</a>
                <a href="/checkout" class="main-button">Proceed To CheckOut</a>
            </div>
        </div>
    </div>
</div>

<section class="footer">

    <div class="share">
        <a href="#" class="btn">facebook</a>
        <a href="#" class="btn">twitter</a>
        <a href="#" class="btn">instagram</a>
        <a href="#" class="btn">pinterest</a>
        <a href="#" class="btn">linkedin</a>
    </div>

    <h1 class="credit"> created by <span> mr. web designer </span> | no rights reserved! </h1>

</section>

<!-- scroll top button  -->
<a href="#" class="fas fa-angle-up" id="scroll-top"></a>

<script src="/assets/vendors/js/base/jquery.min.js"></script>
<script src="/assets/vendors/js/base/core.min.js"></script>

<script src="/assets/vendors/js/app/app.min.js"></script>

<!-- custom js file link  -->
<script src="user/js/main.js"></script>
<script>
    $(document).ready(function () {
        $('.quantitys').change(function () {
            let data = {
                id: this.getAttribute('data-id'),
                quantity: this.value
            }
            updateCart(data);
            $('#prices-' + data.id).load(' #prices-' + data.id);
            $('#total-price').load(' #total-price');
        })
    })

    function updateCart(data) {
        $.ajax({
            url: '/cart/update?id=' + data.id + '&quantity=' + data.quantity,
            method: 'POST',
            data: data,
            success: function (res) {
                $.toast({
                    heading: 'Thành công',
                    text: 'Sản phẩm đã được thêm vào giỏ hàng',
                    position: 'top-center',
                    showHideTransition: 'slide',
                    hideAfter: 5000,
                    icon: 'success',
                    stack: 5

                })

            },
            error: function (data) {
                console.log(data)
            }
        })
    }
</script>
</body>
</html>
