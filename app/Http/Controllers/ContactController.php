<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormSubmitted;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('layouts.contact', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'message' => 'required',
        ]);

        $contact = Contact::create($request->all());

        // Send email to admin
        try {
            Mail::to('intechofficialteam@gmail.com')->send(new ContactFormSubmitted($contact));
        } catch (\Exception $e) {
            // Log the error or handle it
            Log::error('Mail send failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send email.');
        }


        return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('contacts')->with('success', 'Contact deleted successfully');
    }
}
