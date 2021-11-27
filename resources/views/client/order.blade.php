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
    <link rel="stylesheet" href="/assets/vendors/css/base/elisyam-1.5.min.css">
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
        {{--        <div class="spinner"></div>--}}
    </div>
</div>
<!-- End Preloader -->

<header>
    <div class="container">
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
<h3> Order {{ $order->id }}</h3>
@if($order->checkout)
    <strong style="color: green">Đã thanh toán</strong>
@else
    <strong style="color: red">Chưa thanh toán</strong>

@endif
@php
if (isset($order))
    foreach ($order->orderDetails as $item){
        echo $item->product->name;
    }
@endphp
@if(!$order->checkout)
    <div id="paypal-button"></div>
@endif


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
            size: 'responsive',
            color: 'gold',
            shape: 'pill',
            label: 'paypal',
            tagline: 'false'
        },
        // Set up the payment:
        // 1. Add a payment callback
        payment: function(data, actions) {
            // 2. Make a request to your server
            return actions.request.post('/order/create-payment',{
                orderID: orderId
            })
                .then(function(res) {
                    // 3. Return res.id from the response
                    return res.id;
                });
        },
        // Execute the payment:
        // 1. Add an onAuthorize callback
        onAuthorize: function(data, actions) {
            // 2. Make a request to your server
            return actions.request.post('/order/execute-payment', {
                paymentID: data.paymentID,
                payerID:   data.payerID,
                orderID: orderId

            })
                .then(function(res) {
                    // 3. Show the buyer a confirmation message.
                    alert('Payment success');
                    window.location.reload(false);
                });
        }
    }, '#paypal-button');
</script>
</body>
</html>
