@extends('client/products-and-cart/layout/layout')
@section('title')
    <title>Cart</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('Hung/css/cart.css')}}">
@endsection
@section('content')
    <div class="col-12 text-center mb-1" style="margin-top: 150px">
        <h2 class="fw-bolder fst-italic">Shopping Cart</h2>
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
                    <form action="">
                        <div class="cart-product">
                            <div class="cart-image">
                                <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/2_e7b6320f-180a-469c-abfd-a3fd16116250_large.jpg?v=1536551398" alt="">
                            </div>
                            <div class="cart-product-info">
                                <p class="cart-product-name">Furniture Collace collection</p>
                                <p class="cart-price">$150.00</p>
                                <div class="remove-md">
                                    <span class="fas fa-trash"></span> Remove
                                </div>
                            </div>
                        </div>
                        <div class="cart-quantity">
                            <div class="cart-quantity-controls">
                                <button>-</button>
                                <input class="text-center" type="number" value="1" readonly>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="cart-unit-price">
                            <h5>$150.00</h5>
                        </div>
                        <div class="cart-product-total">
                            <h5>$150.00</h5>
                        </div>
                        <div class="cart-controls">
                            <div class="remove">
                                <span class="fas fa-trash"></span> Remove
                            </div>
                            <div class="quantity-controls-sm">
                                <button>-</button>
                                <input type="number" value="1" readonly>
                                <button>+</button>
                            </div>
                        </div>
                    </form>
                    <form action="">
                        <div class="cart-product">
                            <div class="cart-image">
                                <img src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/2_e7b6320f-180a-469c-abfd-a3fd16116250_large.jpg?v=1536551398" alt="">
                            </div>
                            <div class="cart-product-info">
                                <p class="cart-product-name">Furniture Collace collection</p>
                                <p class="cart-price">$150.00</p>
                                <div class="remove-md">
                                    <span class="fas fa-trash"></span> Remove
                                </div>
                            </div>
                        </div>
                        <div class="cart-quantity">
                            <div class="cart-quantity-controls">
                                <button>-</button>
                                <input class="text-center" type="number" value="1" readonly>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="cart-unit-price">
                            <h5>$150.00</h5>
                        </div>
                        <div class="cart-product-total">
                            <h5>$150.00</h5>
                        </div>
                        <div class="cart-controls">
                            <div class="remove">
                                <span class="fas fa-trash"></span> Remove
                            </div>
                            <div class="quantity-controls-sm">
                                <button>-</button>
                                <input type="number" value="1" readonly>
                                <button>+</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="cart-total-holder">
                <div class="cart-total fw-bold">
                    <p>Total:</p>
                    <p>$1.250</p>
                </div>
                <div class="cart-action-button">
                    <a href="">Continue Shopping</a>
                    <a href="" class="main-button">Proceed To CheckOut</a>
                </div>
            </div>
        </div>
    </div>
@endsection
