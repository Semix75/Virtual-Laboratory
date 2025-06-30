<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function sendTestEmail()
    {
        Mail::raw('This is a test email.', function ($message) {
            $message->to('semiyou17@gmail.com') // Adresse email réelle
                    ->subject('Test Email');
        });

        return 'Test email sent to semiyou17@gmail.com!';
    }
}