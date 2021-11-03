<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    <link rel="shortcut icon" type="image/x-icon" href="/../user/img/favicon.ico">
    <link rel="stylesheet" href="/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/user/css/Product-show.css">
    <link rel="stylesheet" href="/user/css/Product-detail1.css">
    <link rel="stylesheet" href="/user/css/Main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@300;600&display=swap" rel="stylesheet">
    <style>
        .card-header {
            background-color: #fff;
            border-bottom: none;
        }
    </style>
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
    <div class="col-12 mt-3 d-flex d-inline-block">
        <span>
            <a href="">Home</a> / <a href="products">Product</a>
        </span>
    </div>
    <div class="collection mt-5">
        <div class="row">
            <div class="collection-main">
                <div class="collection-main-header">
                    <h1 class="tittle">
                        Products
                    </h1>
                    {{--                    <div class="collection-main-filter">--}}
                    {{--                        <form action="/products" method="get" name="search-form">--}}
                    {{--                            <div class="collection-filter">--}}
                    {{--                                <div class="col-sm-12 col-lg-3">--}}
                    {{--                                    <div class="form-group">--}}
                    {{--                                        <label>Filter by categories</label>--}}
                    {{--                                        <select name="categoryId" class="form-control">--}}
                    {{--                                            <option value="0">--All--</option>--}}
                    {{--                                            <% for (var i = 0; i < categories.length; i++) {--}}
                    {{--                                            %>--}}
                    {{--                                            <option value="<%= categories[i]._id %>" <%= currentCategory == categories[i]._id ? 'selected' : '' %>><%= categories[i].name %></option>--}}
                    {{--                                            <% }--}}
                    {{--                                            %>--}}
                    {{--                                        </select>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-sm-12 col-lg-3">--}}
                    {{--                                    <div class="form-group">--}}
                    {{--                                        <label>Filter by brands</label>--}}
                    {{--                                        <select name="brandId" class="form-control">--}}
                    {{--                                            <option value="0">--All--</option>--}}
                    {{--                                            <% for (var i = 0; i < brands.length; i++) {--}}
                    {{--                                            %>--}}
                    {{--                                            <option value="<%= brands[i]._id %>" <%= currentBrand == brands[i]._id ? 'selected' : '' %>><%= brands[i].name %></option>--}}
                    {{--                                            <% }--}}
                    {{--                                            %>--}}
                    {{--                                        </select>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-sm-12 col-lg-3">--}}
                    {{--                                    <div class="form-group">--}}
                    {{--                                        <label>Filter by price</label>--}}
                    {{--                                        <select name="priceRange" class="form-control">--}}
                    {{--                                            <option value="0">--All--</option>--}}
                    {{--                                            <option value="1" <%= currentRange === '1' ? 'selected' : '' %>>Price <span>&#8804;</span>--}}
                    {{--                                            100.000--}}
                    {{--                                            </option>--}}
                    {{--                                            <option value="2" <%= currentRange === '2' ? 'selected' : '' %>>100.000 <--}}
                    {{--                                            Price <span>&#8804;</span> 1.000.000--}}
                    {{--                                            </option>--}}
                    {{--                                            <option value="3" <%= currentRange === '3' ? 'selected' : '' %>>1.000.000 <--}}
                    {{--                                            Price < 10.000.000--}}
                    {{--                                            </option>--}}
                    {{--                                        </select>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-sm-12 col-lg-3">--}}
                    {{--                                    <label>Search by keyword</label>--}}
                    {{--                                    <input type="search" class="form-control form-control-sm" placeholder=""--}}
                    {{--                                           name="keyword" aria-controls="example" value="<%= currentKeyword %>">--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-sm-12 col-lg-3">--}}
                    {{--                                    <div class="form-group">--}}
                    {{--                                        <label>Sort by</label>--}}
                    {{--                                        <select name="sortBy" class="form-control">--}}
                    {{--                                            <option value="0"<%= currentSort === '0' ? ' selected' : '' %>>--Default----}}
                    {{--                                            </option>--}}
                    {{--                                            <option value="1"<%= currentSort === '1' ? ' selected' : '' %>>Price:--}}
                    {{--                                            Ascending--}}
                    {{--                                            </option>--}}
                    {{--                                            <option value="2"<%= currentSort === '2' ? ' selected' : '' %>>Price:--}}
                    {{--                                            Descending--}}
                    {{--                                            </option>--}}
                    {{--                                            <option value="3"<%= currentSort === '3' ? ' selected' : '' %>>Name: A-Z--}}
                    {{--                                            </option>--}}
                    {{--                                            <option value="4"<%= currentSort === '4' ? ' selected' : '' %>>Name: Z-A--}}
                    {{--                                            </option>--}}
                    {{--                                            <option value="5"<%= currentSort === '5' ? ' selected' : '' %>>Oldest--}}
                    {{--                                            </option>--}}
                    {{--                                        </select>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </form>--}}
                    {{--                    </div>--}}
                </div>
                <div class="collection-main-body">
                    <div class="product-list">
                        @foreach($products as $product)
                            <div class="product-list-loop col-lg-3 col-md-4 col-sm-6">
                                <div class="product-image">
                                    <span class="product-sale">10%
                                        </span>
                                    <a href="/product/{{$product->id}}">
                                        <img src="{{ $product->thumbnail }}" alt="{{$product->name}}">
                                    </a>
                                    <div class="product-action">
                                        <a href="/cart/add?id={{$product->id}}&&quantity=1"><i class="fa fa-shopping-cart"></i></a>
                                        <a href=""><i class="fa fa-heart"></i></a>
                                        <a href="" data-toggle="modal" data-target="#exampleModal-<%= list[i]._id %>"><i
                                                class="fa fa-info-circle"></i></a>
                                    </div>
                                </div>
                                <h3 class="product-name">
                                    <a href="">{{$product->name}}
                                    </a>
                                </h3>
                                <p class="product-price">
                                    $ {{$product->price}}
                                    <del class="product-price-del">$ 9999
                                    </del>
                                </p>
                            </div>
                        @endforeach
                    </div>
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
    <script>
        document.forms['search-form']['categoryId'].onchange = function () {
            document.forms['search-form'].submit();
        }
        document.forms['search-form']['priceRange'].onchange = function () {
            document.forms['search-form'].submit();
        }
        document.forms['search-form']['brandId'].onchange = function () {
            document.forms['search-form'].submit();
        }
        document.forms['search-form']['sortBy'].onchange = function () {
            document.forms['search-form'].submit();
        }
    </script>
</body>
</html>
