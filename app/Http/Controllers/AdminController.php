<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('Admin.dashboard');
    }
    public function add_product()
    {
        $products = Product::all();
        return view('Admin.add_product', compact('products'));
    }
    public function viewCart()
    {
        $cart = session()->get('cart');
        return view('cart.view', compact('cart'));
    }

}
