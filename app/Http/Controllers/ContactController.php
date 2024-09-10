<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('welcome');
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

        Contact::create($request->all());

        return redirect('')->with('success', 'Thank you for contacting us!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect('contacts')->with('success', 'Contact deleted successfully');
    }
}
