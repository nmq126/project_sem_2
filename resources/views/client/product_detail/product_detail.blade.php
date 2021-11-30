<!DOCTYPE html>
<html>


        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/user/css/product_detail.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer"
        />
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=618600ef20e65f001281c8c1&product=sticky-share-buttons" async="async"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
        WebFont.load({
    google: {
        "families": [ "Montserrat:400,500,600,700", "Noto+Sans:400,700" ]
    },
    active: function() {
        sessionStorage.fonts = true;
    }
    });
        </script>
</head>

<body>

<div class="topnav">
    HADER
</div>
<div class="main">
    <div class="home">
        <a href="/products">Home</a>
        <p>/</p> <span>{{$product->category->name}} </span>
    </div>
    <div class="container">
        <div class="face">
            <div class="image-main">
                <div class="discount">
                    <span> {{$product->discount}}%</span>
                </div>
                <img src="{{$product->thumbnail}}" alt="">
            </div>
            <div class="content">
                <div class="info">
                    <div class="name-product">
                        {{$product->name}}
                    </div>
                    <div class="price">
                        <div class="new-price">
                            <p>{{$product->price -($product->price*$product->discount/100)}} đ </p>
                        </div>
                        <div class="old-price">
                            <p> {{$product->price}} đ</p>
                        </div>
                    </div>
                    <div class="description">
                        <p>{{$product->description}}.</p>
                    </div>
                    <div class="material">
                        <p> Material:</p>
                        <p>{{$product->ingredient->name}}</p>
                
                    </div>
                </div>
                <div class="cart-add">
                    <button>Add To Cart</button>
                    <button>💗</button>
                    <div class="quantity">
                        <button name="minus">-</button>
                        <span id="quantity-span">1</span>
                        <input name="quantity" type="hidden">
                        <button name="plus">+</button>
                    </div>
                </div>
                <div class="category">
                    Categories: {{$product->category->name}}
                </div>
                <!-- ShareThis BEGIN -->
                <div class="sharethis-inline-share-buttons"></div>
                <!-- ShareThis END -->
            </div>
        </div>
        <div class="slider">

        <i class="fas fa-chevron-circle-right"></i>
        <div class="slider-wrapper">
        <div class="slider-main">
<div class="slider-item">
        <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/4_631df1a3-d29e-4971-9a51-36ae4df78146_compact.jpg?v=1536552284" alt="">
        </div>
        <div class="slider-item">
        <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/8_a55a6db9-2459-4a7d-baa6-41e155059d45_compact.jpg?v=1536552286" alt="">
        </div>
        <div class="slider-item">
        <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/9_da0e5810-403d-4f1e-9d9b-a522319b9687_compact.jpg?v=1536552288" alt="">
        </div>
        <div class="slider-item">
        <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/4_631df1a3-d29e-4971-9a51-36ae4df78146_compact.jpg?v=1536552284" alt="">
        </div>
        <div class="slider-item">
        <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/8_a55a6db9-2459-4a7d-baa6-41e155059d45_compact.jpg?v=1536552286" alt="">
        </div>
        <div class="slider-item">
        <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/9_da0e5810-403d-4f1e-9d9b-a522319b9687_compact.jpg?v=1536552288" alt="">
        </div>
        </div>
        <i class="fas fa-chevron-circle-left"></i>
        </div>
        </div>
        </div>
        <div class="main2">

        <div class="container">
            <div class="title">
                <div class="detail active">
                    Detail
                </div>
                <div class="comment ">
                    Comment
                </div>
            </div>
            <div class="detail-content">

                <div class="detail-item-1">

                    <div class="detail-content container mt-5">
                        <div class="d-flex justify-content-center row">
                            <div class="col-md-8">
                                <div class="d-flex flex-column comment-section">
                                    <div class="bg-white p-2">
                                        <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://res-console.cloudinary.com/du0vz0npz/thumbnails/v1/image/upload/v1637841329/UWJfcGZqdDF1/preview" width="40">
                                            <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">Ngô Minh Quang</span><span class="date text-black-50">Shared publicly - Jan 2020</span></div>
                                        </div>
                                        <div class="mt-2">
                                            <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                                ex ea commodo consequat.</p>
                                        </div>
                                    </div>
                                    <div class="bg-white">
                                        <div class="d-flex flex-row fs-12">
                                            <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                                            <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                                            <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                                        </div>
                                    </div>
                                    <div class="bg-light p-2">
                                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.pinimg.com/236x/94/12/c3/9412c35b4e74c5510cb6aa6beed473fa.jpg" width="40" height="40"><textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                                        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail-item-2">

                    <div class="detail-content container mt-5">
                        {!!$product->detail!!}
                    </div>


                </div>
            </div>


        </div>
        <div class="related">
            <div class="header">
                Related Product
            </div>
            <div class="cart-wrapper">
                <div class="carts">

                    <div class="cart-item">
                        <div class="img-cart">
                            <div class="discount">
                                <span> 13%</span>
                            </div>
                            <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/4_7aea6bc7-c789-4c79-a472-b63f4e77e0d8_large.jpg?v=1536551762" alt="">
                            <div class="add-cart">
                                <i class="fas fa-shopping-cart"></i> 
                            </div>
                        </div>
                        <div class="info-cart">
                            <div class="name-price">
                                <div class="name">Leyendo Distintos</div>
                                <div class="price">$585.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-item">
                        <div class="img-cart">
                            <div class="discount">
                                <span> 13%</span>
                            </div>
                            <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/4_7aea6bc7-c789-4c79-a472-b63f4e77e0d8_large.jpg?v=1536551762" alt="">
                            <div class="add-cart">
                                <i class="fas fa-shopping-cart"></i> 
                            </div>
                        </div>
                        <div class="info-cart">
                            <div class="name-price">
                                <div class="name">Leyendo Distintos</div>
                                <div class="price">$585.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-item">
                        <div class="img-cart">
                            <div class="discount">
                                <span> 13%</span>
                            </div>
                            <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/4_7aea6bc7-c789-4c79-a472-b63f4e77e0d8_large.jpg?v=1536551762" alt="">
                            <div class="add-cart">
                                <i class="fas fa-shopping-cart"></i> 
                            </div>
                        </div>
                        <div class="info-cart">
                            <div class="name-price">
                                <div class="name">Leyendo Distintos</div>
                                <div class="price">$585.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-item">
                        <div class="img-cart">
                            <div class="discount">
                                <span> 13%</span>
                            </div>
                            <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/4_7aea6bc7-c789-4c79-a472-b63f4e77e0d8_large.jpg?v=1536551762" alt="">
                            <div class="add-cart">
                                <i class="fas fa-shopping-cart"></i> 
                            </div>
                        </div>
                        <div class="info-cart">
                            <div class="name-price">
                                <div class="name">Leyendo Distintos</div>
                                <div class="price">$585.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-item">
                        <div class="img-cart">
                            <div class="discount">
                                <span> 13%</span>
                            </div>
                            <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/4_7aea6bc7-c789-4c79-a472-b63f4e77e0d8_large.jpg?v=1536551762" alt="">
                            <div class="add-cart">
                                <i class="fas fa-shopping-cart"></i> 
                            </div>
                        </div>
                        <div class="info-cart">
                            <div class="name-price">
                                <div class="name">Leyendo Distintos</div>
                                <div class="price">$585.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="cart-item">
                        <div class="img-cart">
                            <div class="discount">
                                <span> 13%</span>
                            </div>
                            <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/4_7aea6bc7-c789-4c79-a472-b63f4e77e0d8_large.jpg?v=1536551762" alt="">
                            <div class="add-cart">
                                <i class="fas fa-shopping-cart"></i> 
                            </div>
                        </div>
                        <div class="info-cart">
                            <div class="name-price">
                                <div class="name">Leyendo Distintos</div>
                                <div class="price">$585.00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="/user/js/product_detail.js"></script>
<<<<<<< HEAD
=======

>>>>>>> TrinhHuy
</body>

</html>
