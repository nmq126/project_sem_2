<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
    body, h1, h2, h3, h4, h5, h6 {
        font-family: "Karma", sans-serif
    }

    .w3-bar-block .w3-bar-item {
        padding: 20px
    }

    a {
        text-decoration: none;
    }
</style>
<body>

<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left"
     style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()"
       class="w3-bar-item w3-button">Close Menu</a>
    <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button">Food</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
    <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
        <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
        <div class="w3-right w3-padding-16">Mail</div>
        <div class="w3-center w3-padding-16">My Food</div>
    </div>
</div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

    <!-- First Photo Grid-->
    <div class="w3-row-padding w3-padding-16 w3-center" id="food">
        @foreach($products as $product)
            <div class="w3-quarter">
                <a href="/product/{{$product->id}}">
                    <img src="{{$product->thumbnail}}" alt="Sandwich" style="width:100%">
                    <h3>{{ $product->name }}</h3>
                    <p>${{$product->price}}</p>
                    <a class="add-to-cart-button" id="add-to-cart-{{ $product->id }}" data-id="{{$product->id}}">Thêm vào giỏ</a>
                </a>
            </div>
        @endforeach

    </div>


    <!-- Pagination -->
    <div class="w3-center w3-padding-32">
        <div class="w3-bar">
            <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
            <a href="#" class="w3-bar-item w3-black w3-button">1</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
        </div>
    </div>

    <hr id="about">

    <!-- About Section -->
    <div class="w3-container w3-padding-32 w3-center">
        <h3>About Me, The Food Man</h3><br>
        <img src="/w3images/chef.jpg" alt="Me" class="w3-image" style="display:block;margin:auto" width="800"
             height="533">
        <div class="w3-padding-32">
            <h4><b>I am Who I Am!</b></h4>
            <h6><i>With Passion For Real, Good Food</i></h6>
            <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of
                lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus
                ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.
                Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies
                congue gravida diam non fringilla.</p>
        </div>
    </div>
    <hr>

    <!-- Footer -->
    <footer class="w3-row-padding w3-padding-32">
        <div class="w3-third">
            <h3>FOOTER</h3>
            <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies
                congue gravida diam non fringilla.</p>
            <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
        </div>

        <div class="w3-third">
            <h3>BLOG POSTS</h3>
            <ul class="w3-ul w3-hoverable">
                <li class="w3-padding-16">
                    <img src="/w3images/workshop.jpg" class="w3-left w3-margin-right" style="width:50px">
                    <span class="w3-large">Lorem</span><br>
                    <span>Sed mattis nunc</span>
                </li>
                <li class="w3-padding-16">
                    <img src="/w3images/gondol.jpg" class="w3-left w3-margin-right" style="width:50px">
                    <span class="w3-large">Ipsum</span><br>
                    <span>Praes tinci sed</span>
                </li>
            </ul>
        </div>

        <div class="w3-third w3-serif">
            <h3>POPULAR TAGS</h3>
            <p>
                <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span
                    class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span
                    class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
                <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span
                    class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span> <span
                    class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
                <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span
                    class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span
                    class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
                <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span
                    class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span
                    class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
                <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span
                    class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
            </p>
        </div>
    </footer>

    <!-- End page content -->
</div>

<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
<script>
    $(document).ready(function () {
        $('.add-to-cart-button').click(function () {
            let data = {
                id: this.getAttribute('data-id')
            }
            addToCart(data);
        })
    })

    function addToCart(data) {
        $.ajax({
            url: '/cart/add?id='+ data.id + '&quantity=1',
            method: 'GET',
            success: function () {
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

</body>
</html>
