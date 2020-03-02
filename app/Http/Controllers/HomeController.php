<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }

    public function send_admin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::send('emails.contact-message', [
            'msg' => $request->message
        ], function ($mail) use($request) {

            $mail->from('info@freelancereps.com', $request->name);

            $mail->to('gvotava@netfusiontechnology.com')->subject($request->subject);
        });

        return redirect()->back()->withStatus("Thank you for messaging with us. We will come back to you soon.");
    }

}
