<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;

class SendEmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $subject = $request->input('topic');
        $email = $request->input('email');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $text = $request->input('content');
            
        $email_title = $subject;
        $email_from = $email;
        $email_message = "Email wysłany przez ".$name." ".$surname.". Adres email: ".$email."<br>".$text;

        $email_from_header = "Content-Type: text/html; charset=UTF-8";
        $to = "newbou@bohun.vot.pl";
        mail($to, $email_title, $email_message, $email_from_header);
        
        return back()->with('send', 'Wiadomość została wysłana');
    }
}
