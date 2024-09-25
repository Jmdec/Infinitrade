<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'product_name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'discounted_price' => 'nullable|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image
        'quantity' => 'required|integer|min:1',
    ]);

    // Handle the uploaded image
    $image = $request->file('image');
    $imageName = time() . '_' . $image->getClientOriginalName(); // Create a unique name for the image
    $imagePath = public_path('images'); // Define the public path to store images

    // Move the uploaded image to the public path
    $image->move($imagePath, $imageName);

    // Create a new product record
    Product::create([
        'product_name' => $request->input('product_name'),
        'price' => $request->input('price'),
        'discounted_price' => $request->input('discounted_price'),
        'image' => 'images/' . $imageName, // Store relative path to the image
        'quantity' => $request->input('quantity'),
    ]);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Product added successfully!');
}

}
