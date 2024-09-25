<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {
        // Validate that 'code' is an array with exactly 6 digits
        $request->validate([
            'code' => 'required|array|size:6', // Ensure it's an array of size 6
            'code.*' => 'required|digits_between:0,9' // Each input should be a digit
        ]);

        // Concatenate the array of inputs into a single string
        $code = implode('', $request->input('code'));

        // Find the user by verification code
        $user = User::where('verification_code', $code)->first();

        if (!$user) {
            return back()->withErrors(['code' => 'Invalid verification code.']);
        }

        // Mark the email as verified and clear the verification code
        $user->markEmailAsVerified(); // Ensure this method exists in your User model
        $user->verification_code = null; // Clear the code
        $user->save();

        return redirect()->route('login')->with('message', 'Email verified successfully!'); // Adjust as needed
    }

}
