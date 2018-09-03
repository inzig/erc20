<?php

namespace BCES\Http\Controllers;

use BCES\Mail\ContactUsMail;
use BCES\Mail\SubscribeEmail;
use BCES\Models\Setting;
use BCES\Models\Subscribe;
use BCES\Rules\AlphaSpace;
use Illuminate\Http\Request;
use Newsletter;

class SubscribeController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'email' =>'required|email'
        ]);

        $subscriberEmail = Subscribe::whereEmail($request['email'])->orderBy('id', 'desc')->first();

        if ($subscriberEmail)
            return response()->json(['type' => 'warning', 'message' => 'you are already subscribed on Bitnautic.io ']);

        Subscribe::create(['email' => $request->get('email')]);

        \Mail::to($request->get('email'))->send(new SubscribeEmail($request->all()));

        return response()->json(['message' => 'Your subscription has been added.']);
    }

    public function contactUs(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', new AlphaSpace],
            'email' =>'required|email',
            'message' => 'required|string'
        ]);

        \Mail::to(Setting::whereName('contact_us_email')->first()->value)->send(new ContactUsMail($request->all()));

        return response()->json(['message' => 'Your message has been sent.']);
    }
    
    public function save(Request $request)
    {
         $email =  $request->newsletter;
         Newsletter::subscribePending($email, ['NAME'=>$request->name, 'MESSAGE'=>$request->message, 'TYPE'=>"Website"], 'subscribers');
         return redirect('/');
    }
    public function saveemail(Request $request)
    {
         $email =  $request->newsletter;
         Newsletter::subscribePending($email);
         return redirect('/');
    }
}
