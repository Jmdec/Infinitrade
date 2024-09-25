<!DOCTYPE html>
<html lang="en">

@include('Components.Header')

<body>
    <!-- Topbar Start -->
    @include('Components.Topbar')
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('Components.Navbar')
    <!-- Navbar End -->

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Filter by price</span>
                </h5>
                <div class="bg-light p-4 mb-30">
                    <form id="price-filter-form">
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-all"
                                onchange="filterProducts()">
                            <label class="custom-control-label" for="price-all">All Price</label>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1-1000"
                                onchange="filterProducts()">
                            <label class="custom-control-label" for="price-1-1000">₱1 - ₱1000</label>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1001-3000"
                                onchange="filterProducts()">
                            <label class="custom-control-label" for="price-1001-3000">₱1001 - ₱3000</label>
                        </div>
                        <div
                            class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3001-5000"
                                onchange="filterProducts()">
                            <label class="custom-control-label" for="price-3001-5000">₱3001 - ₱5000</label>
                        </div>
                        <!-- Add other price filters as needed -->
                    </form>
                </div>
                <!-- Price End -->
            </div>
            <!-- Shop Sidebar End -->

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <!-- Search Bar Start -->
                            <div>
                                <input type="text" id="search-input" class="form-control"
                                    placeholder="Search for products..." onkeyup="filterProducts()">
                            </div>
                            <!-- Search Bar End -->
                        </div>
                    </div>
                </div>

                <div class="row" id="productList">
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 product-item" data-price="{{ $product->price }}">
                            <div class="product-img position-relative overflow-hidden" style="width: 200px; height: 200px;">
                                <img src="{{ asset($product->image) }}"
                                     alt="{{ $product->product_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>



                            <div class="product-details mt-2">
                                <h5 class="product-title">{{ $product->product_name }}</h5>
                                @if ($product->discounted_price)
                                    <p class="product-price" style="text-decoration: line-through; color: red; display: inline;">
                                        ₱{{ number_format($product->price, 2) }}
                                    </p>
                                    <p class="product-price" style="color: green; display: inline; margin-left: 10px;">
                                        ₱{{ number_format($product->discounted_price, 2) }}
                                    </p>
                                @else
                                    <p class="product-price" style="color: green;">
                                        ₱{{ number_format($product->price, 2) }}
                                    </p>
                                @endif
                                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="quantity-selector d-flex align-items-center mb-2">
                                        <input type="number" class="form-control mx-2" name="quantity" style="width: 60px;" min="1" value="1">
                                    </div>
                                    <button type="submit" class="btn btn-dark" style="flex-shrink: 0; padding: 0.375rem 0.75rem;">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>



                </div>

            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

    <!-- Footer Start -->
    @include('Components.Footer')
    <!-- Footer End -->
    @include('Components.Script')

</body>

</html>
