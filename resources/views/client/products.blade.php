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
    <link rel="stylesheet" href="user/css/products.css">
    {{--    <link rel="stylesheet" href="user/css/responsive.css">--}}
</head>
<body>
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
        <a href="/sign_in"> Cửa Hàng </a>
        <a href="/sign_in"> Liên Hệ </a>
        <a href="/sign_in"> Blog </a>
        <a href="/cart">
            <i class="fas fa-shopping-cart"></i>
            <span class='badge badge-warning' id='lblCartCount'>{{$totalQuantity}}</span>
        </a>
    </nav>
</header>

<div class="mb-5 banner">
    <div class="text-center banner-text">
        <h1 class="fw-bolder fst-italic text-white">Food - Drink Shop</h1>
        <p class="fst-italic bold">We always bring you the best food and drinks</p>
    </div>
</div>
<div class="col-12 text-center pt-5 mt-3 pb-3">
    <h2 class="fw-bolder fst-italic" style="font-size: 40px">Our Products</h2>
</div>
<div class="content mb-3">
    <div class="col-lg-3 col-md-4">
        <div class="categories">
            <div class="keyword">
                <div>
                    <div class="search">
                        <div class="pb-5">
                            <span>Filter</span>
                            <span class="fas fa-minus" id="search-b" onclick="show()"
                                  style="font-size: 30px"></span>
                        </div>
                        <div class="search-content mt-1" id="search-content" style="display: block">
                            <hr class="mt-5">
                            <h5 class="ml-3 float-left">Categories</h5>
                            <div class="list d-flex flex-column" id="show1">
                                @foreach($categories as $category)
                                    <label for="{{$category->name}}" class="mt-2">
                                        <input type="checkbox" id="{{$category->name}}" name="categories[]"
                                               value="{{$category->id}}">
                                        {{$category->name}}</label>
                                @endforeach
                            </div>
                            <hr class="mt-3">
                            <h5 class="ml-3">Ingredient</h5>
                            <div class="list d-flex flex-column" id="show2">
                                @foreach($ingredients as $ingredient)
                                    <label for="{{$ingredient->name}}" class="mt-2">
                                        <input type="checkbox" id="{{$ingredient->name}}"
                                               name="ingredients[]"
                                               value="{{$ingredient->id}}"> {{$ingredient->name}}</label>
                                @endforeach
                            </div>
                            <hr class="mt-3">
                            <h5 class="ml-3">Price</h5>
                            <div class="list search-price mb-2 pt-3">
                                <h3>From: </h3>
                                <label for="fromPrice">
                                    <input type="number" id="fromPrice" name="fromPrice">
                                </label>
                                <h3 class="pt-4">To: </h3>
                                <label for="toPrice" class="label-to">
                                    <input type="number" id="toPrice" name="toPrice">
                                </label>
                            </div>
                            <hr class="mt-3 text-center">
                            <button class="search-button btn mb-2" id="search-button">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-md-8 products mt-md-0 mt-4">
        <div class="d-flex align-items-center pl-3 sort" style="margin-left: 50px">
            <h5 class="pt-1 pr" style="padding-right: 20px">Sorted By: </h5>
            <select class="form-select align-self-center" style="width: 200px" id="sort"
                    onchange="sort(this.value)">
                <option value="item-price">Price, low to high</option>
                <option value="price-item">Price, high to low</option>
                <option value="item-name">Alphabetically, A-Z</option>
                <option value="name-item">Alphabetically, Z-A</option>
            </select>
        </div>
        <div class="products-list mt-4 col-12" id="products-list">
            @foreach($products as $product)
                <div class="card col-lg-4 col-sm-12 col-12 mb-2 product">
                    <img class="card-img-top text-center"
                         src="{{$product->thumbnail}}"
                         alt="Card image cap">
                    <div class="button">
                        <i class="fas fa-heart button1"></i>
                        <i class="fas fa-shopping-cart button2 add-to-cart-button" id="add-to-cart-{{ $product->id }}"
                           data-name="{{ $product->name }}" data-id="{{$product->id}}"></i>
                        <i class="fas fa-info-circle button3"></i>
                    </div>
                    @if($product->discount > 0)
                        <span>-{{$product->discount}}%</span>
                    @endif
                    <div class="card-body text-center">
                        <p class="card-text fw-bolder font-monospace item-name name-item">{{$product->name}}</p>
                        <div class="price">
                            $
                            <p class="item-price price-reseve">{{$product->price - ($product->price * $product->discount / 100)}}</p>
                            @if($product->discount > 0)
                                <p class="ps-3" style="color: red"><s>${{$product->price}}</s></p>
                            @endif
                        </div>
                        <p class="description">{{$product->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="paginate text-center">
            <div>
                <ul class="pagination">
                    <li class="page-item {{($products->currentPage() == 1) ? 'disabled': ''}}">
                        <a class="page-link" href="{{$products->url(1)}}" style="border-radius: 10px">Previous</a>
                    </li>
                    @for($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="page-item {{($products->currentPage() == $i) ? 'active': ''}}">
                            <a class="page-link" href="{{$products->url($i)}}">{{$i}}</a>
                        </li>
                    @endfor
                    <li class="page-item {{($products->currentPage() == $products->lastPage()) ? 'disabled': ''}}">
                        <a class="page-link" href="{{$products->nextPageUrl()}}"
                           style="border-radius: 10px">Next</a></li>
                </ul>
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
<script src="user/js/products.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.pagination a', function (event){
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        })

        function fetch_data(page){
            $.ajax({
                type: "GET",
                url: "?page=" + page,
                success: function (data) {
                    console.log(data)
                    $("body").empty().html(data);
                }
            })
        }
    })
</script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#search-button', function () {
            let categories = [];
            let ingredients = [];
            let fromPrice = $('input[name=fromPrice]').val();
            let toPrice = $('input[name=toPrice]').val();
            $('input[name="categories[]"]:checked').each(function () {
                categories.push($(this).val());
            });
            $('input[name="ingredients[]"]:checked').each(function () {
                ingredients.push($(this).val());
            });
            let data = {
                _token: "{{ csrf_token() }}",
                categories: categories,
                ingredients: ingredients,
                fromPrice: fromPrice,
                toPrice: toPrice
            }
            console.log(data)
            $.ajax({
                type: 'POST',
                url: 'products/search',
                data: data,
                dataType: 'json',
                success: function (response) {
                    $('#products-list').html('');
                    let htmlDiscount = '';
                    let htmlPrice = '';
                    $.each(response.products, function (key, item) {
                        if (item.discount > 0) {
                            htmlDiscount = '<span>-' + item.discount + '%</span>';
                            htmlPrice = '<p class="ps-3" style="color: red"><s>$' + item.price + '</s></p>';
                        } else {
                            htmlDiscount = '';
                            htmlPrice = '';
                        }
                        $('#products-list').append(
                            '<div class="card col-lg-4 col-sm-6 col-12 product"><img class="card-img-top" src="' + item.thumbnail + '" width="200px" height="200px" alt="Card image cap"> <div class="button"> <i class="fas fa-heart button1"></i> <i class="fas fa-shopping-cart add-cart button2"></i> <i class="fas fa-info-circle button3"></i></div>' + htmlDiscount + '<div class="card-body text-center"> <p class="card-text fw-bolder font-monospace item-name name-item">' + item.name + '</p> <div class="price"> $<p class="item-price price-item">' + (item.price - (item.price * item.discount / 100)) + '</p>' + htmlPrice + ' </div> </div></div>'
                        );
                    });
                }
            })
        })
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script>
    $(document).ready(function () {
        $('.add-to-cart-button').click(function () {
            let data = {
                id: this.getAttribute('data-id'),
                name: this.getAttribute('data-name')
            }
            addToCart(data);
        })
    })

    function addToCart(data) {
        $.ajax({
            url: '/cart/add?id=' + data.id + '&quantity=1',
            method: 'GET',
            success: function () {
                $.toast({
                    heading: 'Thành công',
                    text: 'Sản phẩm ' + data.name + ' đã được thêm vào giỏ hàng',
                    position: 'top-center',
                    showHideTransition: 'slide',
                    hideAfter: 5000,
                    icon: 'success',
                    stack: 5
                })
            },
            error: function (data) {
                $.toast({
                    heading: 'Thất bại',
                    text: 'Có lỗi xảy ra, vui lòng thử lại sau',
                    position: 'top-center',
                    showHideTransition: 'slide',
                    hideAfter: 5000,
                    icon: 'error',
                    stack: 5
                })
            }
        })
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"></script>
</body>
</html>
