<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Make sure to use the User model
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('signup'); // Adjust the view path if needed
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Generate a verification code
        $verificationCode = rand(100000, 999999); // Random 6-digit code
        $user->verification_code = $verificationCode; // Add this to the User model
        $user->save();

        // Send verification code to email
        Mail::send('emails.verify', ['code' => $verificationCode], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Your Verification Code');
        });

        return redirect()->route('verification.notice'); // Adjust the route as needed
    }

}
