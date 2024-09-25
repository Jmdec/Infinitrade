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
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Billing Address Section -->
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Billing Address</span>
                </h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <!-- Existing form fields for billing address -->
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John" name="first_name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe" name="last_name" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" placeholder="example@email.com" name="email" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789" name="mobile" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street" name="address1" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="Apt/Suite (optional)" name="address2">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" id="country-select" name="country" required>
                                <option selected disabled>Select Country</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York" name="city" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York" name="state" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123" name="zip" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse"
                                    data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address Section (Collapse) -->
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Shipping Address</span>
                    </h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <!-- Existing form fields for shipping address -->
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John" name="shipping_first_name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe" name="shipping_last_name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="email" placeholder="example@email.com" name="shipping_email" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="+123 456 789" name="shipping_mobile" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street" name="shipping_address1" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" placeholder="Apt/Suite (optional)" name="shipping_address2">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select" id="country-select" name="country" required>
                                    <option selected disabled>Select Country</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York" name="shipping_city" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="New York" name="shipping_state" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123" name="shipping_zip" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Order Summary</span>
                </h5>
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
                    </div>
                </div>

                <!-- Payment Method Section -->
                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Payment Method</span>
                </h5>
                <div class="bg-light p-30 mb-5">
                    <form id="payment-form">
                        @csrf
                        <div class="form-group">
                            <label for="payment-method">Select Payment Method</label>
                            <select class="custom-select" id="payment-method" required>
                                <option value="" selected disabled>Select Payment Method</option>
                                <option value="bank-transfer">Bank Transfer</option>
                                <option value="gcash">GCash</option>
                                <option value="paymaya">PayMaya</option>
                            </select>
                        </div>

                        <div id="bank-transfer-info" class="mb-3 d-none">
                            <p>For Bank Transfer payments, please send the amount to:</p>
                            <p><strong>Security Bank</strong><br>
                                Account Name: Infinitrade Corporation<br>
                                Account Number: 1234 5678 90<br>
                                Branch: Makati
                            </p>
                            <p><strong>BDO</strong><br>
                                Account Name: Infinitrade Corporation<br>
                                Account Number: 0987 6543 21<br>
                                Branch: Makati
                            </p>
                            <div class="form-group">
                                <label for="bank-proof">Upload Proof of Payment (screenshot):</label>
                                <input type="file" class="form-control-file" id="bank-proof" name="bank_proof" required>
                            </div>
                        </div>

                        <div id="gcash-info" class="mb-3 d-none">
                            <p>For GCash payments, please send to:</p>
                            <p><strong>GCash Number:</strong> 09123456789</p>
                        </div>

                        <div id="paymaya-info" class="mb-3 d-none">
                            <p>For PayMaya payments, please send to:</p>
                            <p><strong>PayMaya Number:</strong> 09123456789</p>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

    @include('Components.Footer')

    <script>
        // Show bank transfer info based on selected payment method
        document.getElementById('payment-method').addEventListener('change', function() {
            document.getElementById('bank-transfer-info').classList.add('d-none');
            document.getElementById('gcash-info').classList.add('d-none');
            document.getElementById('paymaya-info').classList.add('d-none');

            if (this.value === 'bank-transfer') {
                document.getElementById('bank-transfer-info').classList.remove('d-none');
            } else if (this.value === 'gcash') {
                document.getElementById('gcash-info').classList.remove('d-none');
            } else if (this.value === 'paymaya') {
                document.getElementById('paymaya-info').classList.remove('d-none');
            }
        });
    </script>
</body>

</html>
