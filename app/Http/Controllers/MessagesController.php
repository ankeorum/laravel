<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $msg = request()->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'subject' => 'required',
            'content' => ['required','min:3']
        ],[
            'name.required' => __('Please, give us your name'),
        ]);

        //Enviar email

        // Mail::to('ankeorum@gmail.com')->queue(new MessageReceived($msg));

        return (new MessageReceived($msg));
    }
}
