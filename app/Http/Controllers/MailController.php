<?php

namespace App\Http\Controllers;

use App\Mail\Sendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_mail(){
        $to_name = "NamOfficel";
        $to_email = "lamnhatnamcld@gmail.com";

        $data = array("title"=>"Mail from account customer","body"=>"Mail about product");

        Mail::send('email.mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Test email google');
            $message->from($to_email,$to_name);
        });
        
        // Mail::send('email.mail', $data, function($message) {
        //     $message->to('lamnhatnamcld@gmail.com')->subject('Welcome to the Viblo!');
        // });

        // $title = 'Hello mail from Nam';
        // $body = 'this is the first email to send in laravel 11 app';
        // Mail::to($to_email,$to_name)->send(new Sendmail($title,$body));
        
        
    }
}
