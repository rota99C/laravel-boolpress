<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('guest.contacts');
    }
    public function sendForm(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|max:300',
            'oggetto' => 'required|max:4000',
            'messaggio' => 'required|max:9000',
        ]);
        //ddd($validate);
        $contact = Contact::create($validate);

        Mail::to('admin@admin.com')->send(new SendContactFormMail($contact))->render();

        return redirect()->back();
    }
}
