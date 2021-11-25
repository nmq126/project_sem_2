@extends ('client/products-and-cart/layout/layout')
@section('title')
    <title>Shop</title>
@endsection
@section('css')
      <link rel="stylesheet" href="Hung/css/products.css">
@endsection
@section('content')
    <div class="mb-5 banner">
        <div class="text-center banner-text">
            <h1 class="fw-bolder fst-italic">Food - Drink Shop</h1>
            <p class="fst-italic bold">We always bring you the best food and drinks</p>
        </div>
    </div>
    <div class="col-12 text-center pt-3 pb-3">
        <h2 class="fw-bolder fst-italic">Products</h2>
        <p>Check out some of our top products</p>
    </div>
    <div class="content container mb-3">
        <div class="col-lg-3 col-md-4">
            <div class="categories">
                <div class="text-center search">
                    <h4>Search Filter</h4>
                </div>
                <div class="keyword">
                    <div>
                        <div>
                            <h5>Keyword</h5>
                            <input type="text" class="form-control w-100" placeholder="Enter the keyword">
                        </div>
                    </div>
                    <div class="list mt-3">
                        <h5>Category</h5>
                        <select class="form-select">
                            <option>All</option>
                            <option>Leyendo Distintos</option>
                            <option>Predefinidos Cuando</option>
                            <option>Original Hot Exacta</option>
                            <option>Quedando Esencialmente</option>
                        </select>
                    </div>
                    <div class="list mt-4">
                        <h5>Ingredient</h5>
                        <select class="form-select">
                            <option>All</option>
                            <option>Leyendo Distintos</option>
                            <option>Predefinidos Cuando</option>
                            <option>Original Hot Exacta</option>
                            <option>Quedando Esencialmente</option>
                        </select>
                    </div>
                    <div class="list mt-4">
                        <h5>Price</h5>
                        <select class="form-select">
                            <option>None</option>
                            <option>Leyendo Distintos</option>
                            <option>Predefinidos Cuando</option>
                            <option>Original Hot Exacta</option>
                            <option>Quedando Esencialmente</option>
                        </select>
                    </div>
                    <div class="text-md-start text-center mt-4">
                        <button class="btn w-50 search-button">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 products mt-md-0 mt-5">
            <img src="https://scontent.fhan14-1.fna.fbcdn.net/v/t1.6435-9/43204019_2442106559140566_2179319440246571008_n.jpg?_nc_cat=101&ccb=1-5&_nc_sid=973b4a&_nc_ohc=50iaelCM2BIAX9cxKfK&_nc_ht=scontent.fhan14-1.fna&oh=ec4409f4041dcc593c671d0db5cf3237&oe=61C19E51"
                 width="100%"
                 alt="">
            <div class="products-list mt-3">
                <div class="card col-lg-4 col-sm-6 col-12 product">
                    <img class="card-img-top"
                         src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/1_large.jpg?v=1536551355"
                         alt="Card image cap">
                    <div class="button">
                        <i class="fas fa-heart button1"></i>
                        <i class="fas fa-shopping-cart button2"></i>
                        <i class="fas fa-info-circle button3"></i>
                    </div>
                    <span>-12%</span>
                    <div class="card-body">
                        <p class="card-text fw-bolder font-monospace">Affiliate Product</p>
                        <div class="price">
                            <p>$150.00</p>
                            <p class="ps-3" style="color: red"><s>$150.00</s></p>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6 col-sm-6 col-12 product">
                    <img class="card-img-top"
                         src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/2_e7b6320f-180a-469c-abfd-a3fd16116250_large.jpg?v=1536551398"
                         alt="Card image cap">
                    <div class="button">
                        <i class="fas fa-heart button1"></i>
                        <i class="fas fa-shopping-cart button2"></i>
                        <i class="fas fa-info-circle button3"></i>
                    </div>
                    <span>-12%</span>
                    <div class="card-body">
                        <p class="card-text fw-bolder font-monospace">Affiliate Product</p>
                        <div class="price">
                            <p>$150.00</p>
                            <p class="ps-3" style="color: red"><s>$150.00</s></p>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6 col-sm-6 col-12 product">
                    <img class="card-img-top"
                         src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/4_433ea0a0-cd84-42aa-b757-bab865521863_large.jpg?v=1536551415"
                         alt="Card image cap">
                    <div class="button">
                        <i class="fas fa-heart button1"></i>
                        <i class="fas fa-shopping-cart button2"></i>
                        <i class="fas fa-info-circle button3"></i>
                    </div>
                    <span>-12%</span>
                    <div class="card-body">
                        <p class="card-text fw-bolder font-monospace">Affiliate Product</p>
                        <div class="price">
                            <p>$150.00</p>
                            <p class="ps-3" style="color: red"><s>$150.00</s></p>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6 col-sm-6 col-12 product">
                    <img class="card-img-top"
                         src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/6_9d40d434-32d1-4fa1-b029-28f7d5265c8c_large.jpg?v=1536551494"
                         alt="Card image cap">
                    <div class="button">
                        <i class="fas fa-heart button1"></i>
                        <i class="fas fa-shopping-cart button2"></i>
                        <i class="fas fa-info-circle button3"></i>
                    </div>
                    <span>-12%</span>
                    <div class="card-body">
                        <p class="card-text fw-bolder font-monospace">Affiliate Product</p>
                        <div class="price">
                            <p>$150.00</p>
                            <p class="ps-3" style="color: red"><s>$150.00</s></p>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6 col-sm-6 col-12 product">
                    <img class="card-img-top"
                         src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/5_c3b50fc9-fb2d-4a89-9827-23fa4e59f943_large.jpg?v=1536551421"
                         alt="Card image cap">
                    <div class="button">
                        <i class="fas fa-heart button1"></i>
                        <i class="fas fa-shopping-cart button2"></i>
                        <i class="fas fa-info-circle button3"></i>
                    </div>
                    <span>-12%</span>
                    <div class="card-body">
                        <p class="card-text fw-bolder font-monospace">Affiliate Product</p>
                        <div class="price">
                            <p>$150.00</p>
                            <p class="ps-3" style="color: red"><s>$150.00</s></p>
                        </div>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6 col-sm-6 col-12 product">
                    <img class="card-img-top"
                         src="https://cdn.shopify.com/s/files/1/0037/1818/5030/products/3_fd2c0785-4a9c-4511-bb75-77cbc3e185ba_large.jpg?v=1536551612"
                         alt="Card image cap">
                    <div class="button">
                        <i class="fas fa-heart button1"></i>
                        <i class="fas fa-shopping-cart button2"></i>
                        <i class="fas fa-info-circle button3"></i>
                    </div>
                    <span>-12%</span>
                    <div class="card-body">
                        <p class="card-text fw-bolder font-monospace">Affiliate Product</p>
                        <div class="price">
                            <p>$150.00</p>
                            <p class="ps-3" style="color: red"><s>$150.00</s></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="paginate">
                <div>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active1"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
                <div class="pt-1">
                    <p>Showing 13 - 24 of 32 results</p></div>
            </div>
        </div>
    </div>
@endsection
