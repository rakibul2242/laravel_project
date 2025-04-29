<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use  App\Mail\WelcomeMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $to = $request->to;
        $subject = $request->subject;
        $message = $request->message;
        Mail::to($to)->send(new WelcomeMail($message, $subject));
        return redirect()->route('send_mail')
            ->with('success', 'Email sent successfully using Mailable!');
    }
}
