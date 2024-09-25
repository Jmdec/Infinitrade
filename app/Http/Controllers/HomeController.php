<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index(){
        $cart = session()->get('cart', []);

        // Initialize subtotal and product count
        $subtotal = 0;
        $productCount = 0;

        // Loop through each cart item to calculate subtotal and count unique products
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity']; // Calculate subtotal
            $productCount++; // Count unique products (one for each item in the cart)
        }

        // Shipping cost
        $shipping = 10.00; // Define your shipping cost
        $total = $subtotal + $shipping;
        return view('Home.Homepage', compact('cart', 'subtotal', 'total', 'productCount'));
    }
    public function signup(){
        return view('Signup.signup');
    }
    public function showShop(){
        $cart = session()->get('cart', []);

        // Initialize subtotal and product count
        $subtotal = 0;
        $productCount = 0;


        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity']; // Calculate subtotal
            $productCount++; // Count unique products in the cart
        }

        // Shipping cost
        $shipping = 10.00; //  shipping cost
        $total = $subtotal + $shipping;
        $products = Product::all();
        return view('Home.Shop',compact('products','cart', 'subtotal', 'total', 'productCount'));
    }
    public function showCart(){
        $products = Product::all();
        return view('Home.cart',compact('products'));
    }
}
