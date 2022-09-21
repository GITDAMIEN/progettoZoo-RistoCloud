<?php

namespace App\Http\Controllers;

use App\Mail\ThanksMail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class PublicController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    
    public function aboutUs()
    {
        return view('aboutUs');
    }
    
    public function contactUs()
    {
        return view('contactUs');
    }
    
    public function contactForm(ContactRequest $request)
    {
        Mail::to($request->email)->send(new ThanksMail($request));
        Mail::to('amministrazione@ristozoo.it')->send(new ContactMail($request));

        return redirect()->route('welcome')->with('message','Grazie per averci contattato! Ti risponderemo via email molto presto!');

    }
}
