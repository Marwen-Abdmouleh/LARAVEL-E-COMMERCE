<?php


namespace App\Http\Controllers\front;
use App\Models\Category;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function contact(){
    
        $categories=Category::all();
        return view('layouts.pages.contact',compact('categories'));
    }
    public function sendEmail(Request $request){
        $details=[
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        Mail::to('')->send(new ContactMail($details) );
    return back()->with('message_sent','Ton Message a ete bien envoyer');
    
    }
}
