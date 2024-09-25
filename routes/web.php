<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\AdminController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::middleware([])->group(function () {
    // Route to the home page
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Route to the sign-up page
    Route::get('sign_up', [HomeController::class, 'signup'])->name('sign_up');

    // Route to handle user registration
    Route::post('/register', [SignupController::class, 'register'])->name('register');

    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/', [LoginController::class, 'showHome'])->name('showHome');;
    Route::get('shop', [HomeController::class, 'showShop'])->name('shop');;
    Route::get('cart', [HomeController::class, 'showCart'])->name('cart');;
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

});

// Email Verification Routes
Route::middleware('auth')->group(function () {
    // Route to show email verification notice
    Route::get('/email/verification-notice', function () {
        return view('verification'); // Adjust the view name if needed
    })->name('verification.notice');

    // Route to verify email using the verification code
    Route::post('/email/verification', [EmailVerificationController::class, 'verify'])->name('verification.verify');

    // Route to resend the verification code
    Route::post('/email/verification/resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');

    // Logout Route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::get('/products', [ProductController::class, 'showProducts'])->name('products.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');

// Route::get('/cart', [ProductController::class, 'viewCart'])->name('cart.view');

//admin
Route::get('/admindash', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/add_product', [AdminController::class, 'add_product'])->name('add_product');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::middleware(['auth'])->group(function () {
    // View cart
    // Route::get('/cart', [HomeController::class, 'showCart'])->name('cart.index');

    // Update cart item quantity



    // Apply coupon
    Route::post('/cart/coupon', [CartController::class, 'applyCoupon'])->name('cart.coupon');

    // Proceed to checkout
    // Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
});
Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');

Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'showCheckoutForm'])->name('checkout');
Route::post('/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');
