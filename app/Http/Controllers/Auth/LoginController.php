<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showHome()
    {
        return view('Home.Homepage');
    }
    // Handle login request
    public function login(Request $request)
    {
        // Validate the login form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home')->with('message', 'Login successful!');
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    // Handle logout request
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message', 'Logged out successfully!');
    }
}
