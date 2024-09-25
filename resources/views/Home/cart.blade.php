<!DOCTYPE html>
<html lang="en">
@include('Components.Header')

<body>
    <!-- Topbar Start -->
    @include('Components.Header')
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
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Cart Table -->
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if(session('cart'))
                            @foreach (session('cart') as $id => $item)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset($item['image']) }}" alt="{{ $item['product_name'] }}" style="width: 50px;">
                                    {{ $item['product_name'] }}
                                </td>
                                <td class="align-middle">₱{{ number_format($item['price'], 2) }}</td>
                                <td class="align-middle">
                                    <form action="{{ route('cart.update', $id) }}" method="POST">
                                        @csrf
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus" type="button" onclick="adjustQuantity(this, -1);">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quantity" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $item['quantity'] }}" min="1" required>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus" type="button" onclick="adjustQuantity(this, 1);">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                        </div>
                                    </form>



                                </td>
                                <td class="align-middle">₱{{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td class="align-middle">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">Your cart is empty.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4">
                <form class="mb-30" action="{{ route('cart.coupon') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="coupon" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>₱{{ number_format($subtotal, 2) }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">₱10.00</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>₱{{ number_format($total, 2) }}</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" type="button" onclick="location.href='{{ route('checkout') }}'">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart End -->

    <!-- Footer Start -->
    @include('Components.Footer')
    @include('Components.Script')

</body>
</html>
