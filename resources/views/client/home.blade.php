<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
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
    {{--    <link rel="stylesheet" href="user/css/responsive.css">--}}
</head>
<body>
<div id="preloader">
    <div class="canvas">
        <img src="user/img/loader.gif" alt="">
    </div>
</div>
<header id="nav">

    <a href="#" class="logo"><i class="fas fa-utensils"></i>vietkitchen</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="/cart/show">
            <i class="fas fa-shopping-cart"></i>
            <span class='badge badge-warning' id='lblCartCount'>{{$totalQuantity}}</span>
        </a>
        <a href="/sign_in"> Đăng nhập</a>
    </nav>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3 style="text-transform: capitalize">Đặt món nào cũng <span>FREESHIP</span></h3>
        <p style="font-size: 2rem"> Nhiều món ngon cho bạn thoải mái lựa chọn.</p>
        <a href="/product" class="btn">Đặt hàng ngay</a>
    </div>

    <div class="image">
        <img src="user/img/images/home-img.png" alt="">
    </div>

</section>

<!-- home section ends -->

<!-- speciality section starts  -->

<section class="speciality" id="speciality">

    <h1 class="heading pb-5"> <span>Danh mục </span>món ăn</h1>

    <div class="box-container">
        @foreach($categories as $category)
        <div class="box">
            <div class="content">
                <img height="50px" src="{{ $category->thumbnail }}" alt="">
                <h3>{{ $category->name }}</h3>
                <p>{{ $category->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- speciality section ends -->

<!-- popular section starts  -->

<section class="popular" id="popular">

    <h1 class="heading pt-5 pb-5"> Món ngon <span>khuyến mãi</span></h1>

    <div class="box-container">
        @foreach($discountProducts as $product)
        <div class="box">
            <span class="price"> -{{ $product->discount }}% </span>
            <img src="{{ $product->thumbnail  }}" alt="">
            <h3>{{ $product->name }}</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <a href="#" class="btn">Đặt hàng</a>
        </div>
        @endforeach


    </div>

</section>

<!-- popular section ends -->

<!-- steps section starts  -->

<div class="step-container pt-5 pb-5">

    <h1 class="heading">Đặt hàng cùng <span>VietKitchen</span></h1>

    <section class="steps">

        <div class="box">
            <img src="user/img/images/step-1.jpg" alt="">
            <p>Chọn những món ăn yêu thích</p>
        </div>
        <div class="box">
            <img src="user/img/images/step-2.jpg" alt="">
            <p>Vận chuyển nhanh, miễn phí</p>
        </div>
        <div class="box">
            <img src="user/img/images/step-3.jpg" alt="">
            <p>Thanh toán tiện lợi</p>
        </div>
        <div class="box">
            <img src="user/img/images/step-4.jpg" alt="">
            <p>Thưởng thức món ngon nóng hổi</p>
        </div>

    </section>

</div>

<!-- steps section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading pt-5 pb-5"> Khách hàng nói gì về <span>VietKitchen</span></h1>

    <div class="box-container">

        <div class="box">
            <img src="user/img/images/billie.jpg" alt="">
            <h3>Chị Billie người Việt gốc cây</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione
                vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="user/img/images/anne.jpg" alt="">
            <h3>Chị An nhà khu Mỹ Đình</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione
                vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="user/img/images/gal.jpg" alt="">
            <h3>Huê hậu người Do Thái</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione
                vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- gallery section starts  -->

<section style="padding: 0 1rem" class="gallery" id="gallery">

    <h1 class="heading pt-5 pb-5"><span> Gallery </span></h1>
    <div class="containerG">
        <div class="boxG a">
            <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638168695/gallery/lucas-hoang-Yb2Sb9bdgPk-unsplash_1_skkh0u.jpg" alt="">
        </div>
        <div class="boxG b">
            <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638168775/gallery/ben-lei-ubBWnvrsARk-unsplash_xw3eri.jpg" alt="">
        </div>
        <div class="boxG c">
            <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638169351/gallery/hong-anh-duong-EK--nAm-CYM-unsplash_itgbyk.jpg" alt="">
        </div>
        <div class="boxG d">
            <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638169069/gallery/nikolay-smeh-gPpbFaEkl00-unsplash_gb5oe3.jpg" alt="">
        </div>
        <div class="boxG e">
            <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638169145/gallery/sonny-mauricio-yhc4pSbl01A-unsplash_a6qsc4.jpg" alt="">

        </div>
        <div class="boxG f">
            <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638168847/gallery/lynda-hinton-q_eyFSd2W3M-unsplash_xrypqq.jpg" alt="">

        </div>
        <div class="boxG g">
            <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638168942/gallery/rosalind-chang-P_wPicZYoPI-unsplash_m4vtie.jpg  " alt="">

        </div>
        <div class="boxG h">
            <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638169405/gallery/markus-winkler-dq03aws4SmY-unsplash_o2atrr.jpg" alt="">

        </div>
        <div class="boxG i">
            <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638169207/gallery/haseeb-jamil-J9lD6FS6_cs-unsplash_axdtau.jpg" alt="">

        </div>
        <div class="boxG j">
            <img src="https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638169025/gallery/andraz-lazic-iy_MT2ifklc-unsplash_tohd1p.jpg" alt="">

        </div>
    </div>
</section>

<!-- gallery section ends -->



<!-- order section starts  -->

<section class="" id="">

    <h1 class="heading"><span>Food</span> blog </h1>

    <div class="row text-center pt-5 pb-5">

        <div class="col-md-4 col-sm-6 col-12 float-left ">
            <div class="blog-img">
                <a href="">
                    <img src="https://images.unsplash.com/photo-1597345637412-9fd611e758f3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                         alt="" width="100%" height="100%">
                </a>
            </div>
            <div class="blog-content">
                <h2>Tittle</h2>
                <p>Description</p></div>
        </div>
        <div class="col-md-4 col-sm-6 col-12 float-left ">
            <div class="blog-img">

                <img src="https://images.unsplash.com/photo-1597345637412-9fd611e758f3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                     alt="" width="100%" height="100%">
            </div>
            <div class="blog-content">
                <a href="">
                    <h2>Tittle</h2>
                </a>
                <p>Description</p></div>
        </div>
        <div class="col-md-4 col-sm-6 col-12 float-left ">
            <div class="blog-img">

                <img src="https://images.unsplash.com/photo-1597345637412-9fd611e758f3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                     alt="" width="100%" height="100%">
            </div>
            <div class="blog-content">
                <a href="">
                    <h2>Tittle</h2>
                </a>
                <p>Description</p></div>
        </div>
    </div>

</section>

<!-- order section ends -->

<!-- footer section  -->

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
<a href="#home" class="fas fa-angle-up" id="scroll-top"></a>

<script src="/assets/vendors/js/base/jquery.min.js"></script>
<script src="/assets/vendors/js/base/core.min.js"></script>

<script src="/assets/vendors/js/app/app.min.js"></script>

<!-- custom js file link  -->
<script src="user/js/main.js"></script>

</body>
</html>
