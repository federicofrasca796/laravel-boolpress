<?php

namespace App\Http\Controllers;

use App\Mail\MarkdownContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show_contact_page()
    {
        return view('guest.contacts.form');
    }

    public function sendContactForm(Request $request)
    {
        // ddd($request->all());

        $validated = $request->validate([
            'name' => 'required|min:4|max:50',
            'email' => 'required|email',
            'message' => 'required|min:50|max:500',
        ]);

        // ddd($validated);

        //Create istance
        $contact = Contact::create($validated);

        //Render mail using markdown
        // return (new MarkdownContactFormMail($contact))->render();

        //Render mail using views
        // return(new ContactFormMail($validated))->render();


        //Send email 
        // Mail::to($request->name())->send(new Mailableclass);
        // Mail::to('admin@example.com')->send(new ContactFormMail($validated));

        //Send email markdown
        Mail::to('admin@example.com')->send(new MarkdownContactFormMail($contact));

        //Redirect
        return redirect()->back()->with('message', 'Thanks for contacting us 🐱‍🚀');
    }
}