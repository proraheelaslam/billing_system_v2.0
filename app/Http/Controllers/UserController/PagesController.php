<?php

namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class PagesController extends Controller
{
    public function contactus(){ 
        //$categories = category::get();
        return view('user.pages.contactus');
    }


    public function contactUSPost(Request $request) 
        {
            $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'message' => 'required' ]);
         //ContactUS::create($request->all()); 
        
         Mail::send('user.emails.email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
        {
            $message->from('user@gmail.com');
            $message->to('admin@gmail.com', 'Admin')->subject('Contact Us');
        });
         return back()->with('success', 'Thanks for contacting us!'); 
        }

}
