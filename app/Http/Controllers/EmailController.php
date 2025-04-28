<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use  App\Mail\WelcomeEmail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendEmail()
    {
        // $recipientEmail = 'recipient@example.com';
        // $recipientName = 'Recipient Name';
        // $subject = 'Here is the subject from Laravel!';
        // $bodyContent = 'This is the email body content sent from Laravel.';
        // $data = ['body' => $bodyContent]; // Data you might want to pass to your email view

        // Option 1: Using a Mailable class (Recommended)
        Mail::to($recipientEmail)->send(new WelcomeEmail($subject, $data));
        return 'Email sent successfully using Mailable!';
    }
}
