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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link rel="stylesheet" href="user/css/home.css">
    <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
    <link rel="stylesheet" href="user/css/responsive.css">
</head>
<body>
<header id="myHeader">
    <div class="container">
        <div class="logo">
            <h2>VietKitchen</h2>
        </div>
        <div class="searchBar">
            <div class="header-option">
                <img src="/viet_kitchen/img/search.svg" alt="">
                <span>Search</span>
            </div>
            <div class="header-option">
                Login
            </div>
        </div>
    </div>

</header>
<div class="banner">
    <div class="elisyam-overlay overlay-06"></div>
</div>
<section class="popular">
    <div class="listings" id="first_list">
        <div class="container">
            <div class="header">
                <div class="header-title">
                    <h3>Popular</h3>
                    <span>Products that they buy a lot &#127831;</span>
                </div>
            </div>
            <div class="row">
                <div class="card-container col-lg-3 col-sm-6 ">
                    <div class="card-item">
                        <img src="https://images.unsplash.com/photo-1585032226651-759b368d7246?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=992&q=80"
                             alt="">
                        <h4>Noodles</h4>
                        <div class="price">30k</div>
                        <button>Add to cart</button>
                    </div>
                </div>
                <div class="card-container col-lg-3 col-sm-6 ">
                    <div class="card-item">
                        <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80"
                             alt="">
                        <h4>Fried chicken</h4>
                        <div class="price">30k</div>
                        <button>Add to cart</button>
                    </div>
                </div>
                <div class="card-container col-lg-3 col-sm-6 ">
                    <div class="card-item">

                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                             alt="">
                        <h4>Salad</h4>
                        <div class="price">35k</div>
                        <button>Add to cart</button>
                    </div>
                </div>
                <div class="card-container col-lg-3 col-sm-6 ">
                    <div class="card-item">

                        <img src="https://images.unsplash.com/photo-1582878826629-29b7ad1cdc43?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1074&q=80"
                             alt="">
                        <h4>Pho bo</h4>
                        <div class="price">25k</div>
                        <button>Add to cart</button>

                    </div>
                </div>
            </div>
            <div class="view-more-button">
                <button type="button">
                    <span>View more popular products</span>
                </button>
            </div>
        </div>
        <!--        <div class="view-more-button">-->
        <!--            <button type="button">-->
        <!--                <span>View more featured products</span>-->
        <!--            </button>-->
        <!--        </div>-->
    </div>
</section>
<section class="promotion">
    <div class="listings" id="first_list">
        <div class="container">
            <div class="header">
                <div class="header-title">
                    <h3>Promo</h3>
                    <span>Cheap af product</span>
                </div>
            </div>
            <div class="row">
                <div class="card-container col-lg-3 col-sm-6 ">
                    <div class="card-item">
                        <img src="https://images.unsplash.com/photo-1578160112054-954a67602b88?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1074&q=80"
                             alt="">
                        <h4>Egg fried rice</h4>
                        <div class="price">30k</div>
                        <button>Add to cart</button>
                    </div>
                </div>
                <div class="card-container col-lg-3 col-sm-6 ">
                    <div class="card-item">
                        <img src="https://images.unsplash.com/photo-1599719455360-ff0be7c4dd06?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1149&q=80"
                             alt="">
                        <h4>Banh mi</h4>
                        <div class="price">20k</div>
                        <button>Add to cart</button>
                    </div>
                </div>
                <div class="card-container col-lg-3 col-sm-6 ">
                    <div class="card-item">

                        <img src="https://images.unsplash.com/photo-1597345637412-9fd611e758f3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80"
                             alt="">
                        <h4>Bun bo Hue</h4>
                        <div class="price">35k</div>
                        <button>Add to cart</button>
                    </div>
                </div>
                <div class="card-container col-lg-3 col-sm-6 ">
                    <div class="card-item">

                        <img src="https://images.unsplash.com/photo-1607329367978-0a651fdd8edb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1189&q=80"
                             alt="">
                        <h4>Chicken nugget</h4>
                        <div class="price">35k</div>
                        <button>Add to cart</button>

                    </div>
                </div>
            </div>
            <div class="view-more-button">
                <button type="button">
                    <span>View more promotions</span>
                </button>
            </div>
        </div>
    </div>
    </div>
</section>
<section class="category">
    <div class="listings">
        <div class="container">
            <div class="header">
                <div class="header-title">
                    <h3>Explore by category</h3>
                    <span></span>
                </div>
            </div>
            <div class="row">
                <div class="listings-grid col-lg-3 col-sm-6 col-6 col-6">
                    <div class="listings-grid-element">
                        <div class="image">
                            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                 alt="">
                        </div>
                        <div class="text">
                            <h4>Salad</h4>
                        </div>
                    </div>
                </div>
                <div class="listings-grid col-lg-3 col-sm-6 col-6 col-6">
                    <div class="listings-grid-element">
                        <div class="image">
                            <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80"
                                 alt="">
                        </div>
                        <div class="text">
                            <h4>Ga ran</h4>
                        </div>
                    </div>
                </div>
                <div class="listings-grid col-lg-3 col-sm-6 col-6 col-6">
                    <div class="listings-grid-element">
                        <div class="image">
                            <img src="https://images.unsplash.com/photo-1578160112054-954a67602b88?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1074&q=80"
                                 alt="">
                        </div>
                        <div class="text">
                            <h4>Com chien</h4>
                        </div>
                    </div>
                </div>
                <div class="listings-grid col-lg-3 col-sm-6 col-6 col-6">
                    <div class="listings-grid-element">
                        <div class="image">
                            <img src="https://images.unsplash.com/photo-1578160112054-954a67602b88?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1074&q=80"
                                 alt="">
                        </div>
                        <div class="text">
                            <h4>Com chien</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- =========Footer Area=========== -->
        </div>
    </div>

</section>
<section id="footer-fixed">
    <div class="big-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="footer-logo">
                        <h2 id="colorize">LOGO</h2>
                        <p> We cook, we deliver.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="footer-heading">
                        <h3><a href="/viet_kitchen/about-us.php">About Us</a></h3>
                        <h3>Contact us</h3>
                        <h3>Term & policy</h3>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="footer-heading">
                        <h3>Blog</h3>
                        <h3>Careers</h3>
                        <h3>FAQ</h3>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="footer-heading">
                        <h3 id="colorize">Get Updates</h3>
                    </div>
                    <div class="footer-content footer-cont-mar-40">
                        <form action="#">
                            <input id="leadgenaration" type="email" placeholder="Enter your email">
                            <input id="subscribe" type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--copyright-->
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="user/js/home.js"></script>
</body>
</html>
