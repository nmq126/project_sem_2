<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Hung/css/main.css')}}">
    @yield('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<i class="fas fa-arrow-up" id="myBtn"></i>
<nav id="nav">
    <div class="nav-img">
        <a href="index.html"><img src="{{asset('Hung/img/fast-food-restaurant-01.png')}}" alt=""></a>
    </div>
    <div class="menu-bar">
        <a href="/cart"><img src="" class="fas fa-shopping-cart fa-2x" alt=""></a>
        <img src="" class="fas fa-bars fa-2x" alt="" id="menu-button" onclick="menu()">
    </div>
    <div class="nav-link">
        <ul id="MenuItems">
            <li><a href="">Home</a></li>
            <li><a href="/products">Shop</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Blog</a></li>
        </ul>
    </div>
</nav>
@yield('content')
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
</body>
<script src="{{asset('Hung/js/script.js')}}"></script>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
</html>
