<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendVerificationCode extends Command
{
    protected $signature = 'send:verification-code {userId}';
    protected $description = 'Send a verification code to the user\'s email';

    public function handle()
    {
        $userId = $this->argument('userId');
        $user = User::find($userId);

        if (!$user) {
            $this->error('User not found.');
            return;
        }

        // Generate a verification code
        $verificationCode = rand(100000, 999999);
        $user->verification_code = $verificationCode; // Ensure this field exists in your User model
        $user->save();

        // Send verification code to email
        Mail::send('emails.verify', ['code' => $verificationCode], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Your Verification Code');
        });

        $this->info('Verification code sent to ' . $user->email);
    }
}
