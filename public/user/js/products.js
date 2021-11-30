var categoryButton = document.getElementById('category-button');
var ingredientButton = document.getElementById('ingredient-button');
var priceButton = document.getElementById('price-button');
var sortButton = document.getElementById('sort-button');
var categorySearch = document.getElementById('category-search');
var ingredientSearch = document.getElementById('ingredient-search');
var priceSearch = document.getElementById('price-search');
var sortSearch = document.getElementById('sorted');

function showCategorySearch() {
    if (categorySearch.style.display == 'none') {
        categorySearch.style.display = 'block';
        categoryButton.classList.remove('fa-plus');
        categoryButton.classList.add('fa-minus');
    }
    else {
        categorySearch.style.display = 'none';
        categoryButton.classList.remove('fa-minus');
        categoryButton.classList.add('fa-plus');
    }
}

function showIngredientSearch() {
    if (ingredientSearch.style.display == 'none') {
        ingredientSearch.style.display = 'block';
        ingredientButton.classList.remove('fa-plus');
        ingredientButton.classList.add('fa-minus');
    }
    else {
        ingredientSearch.style.display = 'none';
        ingredientButton.classList.remove('fa-minus');
        ingredientButton.classList.add('fa-plus');
    }
}

function showPriceSearch() {
    if (priceSearch.style.display == 'none') {
        priceSearch.style.display = 'block';
        priceButton.classList.remove('fa-plus');
        priceButton.classList.add('fa-minus');
    }
    else {
        priceSearch.style.display = 'none';
        priceButton.classList.remove('fa-minus');
        priceButton.classList.add('fa-plus');
    }
}

function showSortSearch() {
    if (sortSearch.style.display == 'none') {
        sortSearch.style.display = 'block';
        sortButton.classList.remove('fa-plus');
        sortButton.classList.add('fa-minus');
    }
    else {
        sortSearch.style.display = 'none';
        sortButton.classList.remove('fa-minus');
        sortButton.classList.add('fa-plus');
    }
}

$(document).ready(function () {
    $(document).on('click', '#search-button', function () {
        let categories = [];
        let ingredients = [];
        let fromPrice = $('input[name=fromPrice]').val();
        let toPrice = $('input[name=toPrice]').val();
        let sort = $('#sort').val();
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
            toPrice: toPrice,
            sort: sort
        }
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

    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    })

    function fetch_data(page) {
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

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
        success: function (res) {
            $.toast({
                heading: 'Thành công',
                text: 'Sản phẩm ' + data.name + ' đã được thêm vào giỏ hàng',
                position: 'top-center',
                showHideTransition: 'slide',
                hideAfter: 5000,
                icon: 'success',
                stack: 5
            })
            updatePrice(res)
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
    function updatePrice(data) {
        let totalQuantity = 0;
        for (let key in data) {
            totalQuantity += data[key].quantity * 1;
        }
        $('#lblCartCount').html(totalQuantity);
    }
}
