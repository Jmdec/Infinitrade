<?php

// App/Http/Controllers/CartController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\CartItem;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Find the product by ID
        $product = Product::find($request->product_id);

        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        // Retrieve the cart from session or create a new one if not exists
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$product->id])) {
            // Update the quantity if the product exists
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            // Add the product to the cart
            $cart[$product->id] = [
                "product_name" => $product->product_name,
                "quantity" => $request->quantity,
                "price" => $product->discounted_price ?: $product->price,
                "image" => $product->image
            ];
        }

        // Save the cart back to session
        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
{
    // Retrieve cart data from session
    $cart = session()->get('cart', []);

    // Initialize subtotal and product count
    $subtotal = 0;
    $productCount = 0;

    // Loop through each cart item to calculate subtotal and count unique products
    foreach ($cart as $item) {
        // Ensure that 'price' and 'quantity' keys exist to avoid undefined index errors
        if (isset($item['price']) && isset($item['quantity'])) {
            $subtotal += $item['price'] * $item['quantity']; // Calculate subtotal
            $productCount++; // Count unique products (one for each item in the cart)
        }
    }

    // Shipping cost
    $shipping = 10.00; // Define your shipping cost
    $total = $subtotal + $shipping;

    // Pass the cart, subtotal, total, and product count to the view
    return view('Home.cart', compact('cart', 'subtotal', 'total', 'productCount'));
}



    public function add(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Logic to add the product to the cart
        // For example, you can store cart items in session
        $cart = session()->get('cart', []);
        $productId = $request->product_id;
        $quantity = $request->quantity;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'quantity' => $quantity,
                // You might want to fetch more details about the product
                // For example, by querying the Product model again
                'product' => \App\Models\Product::find($productId),
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    // Method to display the cart
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, $request->quantity); // Ensure quantity is at least 1
            session()->put('cart', $cart);
            return back()->with('success', 'Cart updated successfully!');
        }

        return back()->with('error', 'Product not found in cart!');
    }


    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return back()->with('success', 'Product removed from cart!');
        }

        return back()->with('error', 'Product not found in cart!');
    }
    public function showCheckoutForm()
    {
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




        return view('Home.checkout', compact('cart', 'subtotal', 'total', 'productCount'));
    }

    /**
     * Process the checkout.
     */
    public function processCheckout(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'payment_method' => 'required',
            // Add other necessary validations for shipping, payment details, etc.
        ]);

        // Process the order and payment (pseudo-code)
        // You might integrate a payment gateway here, such as Stripe or PayPal

        // Clear the cart session after successful checkout
        session()->forget('cart');

        // Redirect to order confirmation page
        return redirect()->route('order.confirmation');
    }

    /**
     * Show order confirmation page.
     */
    public function orderConfirmation()
    {
        return view('checkout.confirmation');
    }

}

