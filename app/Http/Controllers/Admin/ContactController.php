<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        // Mark as read when viewed
        if ($contact->read_at === null) {
            $contact->read_at = now();
            $contact->save();
        }
        return view('admin.contacts.show', compact('contact'));
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->read_at = now();
        $contact->save();

        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    public function markAllAsRead()
    {
        Contact::whereNull('read_at')->update(['read_at' => now()]);

        return redirect()->back()->with('success', 'All notifications marked as read.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('success', 'Notification deleted.');
    }
}
