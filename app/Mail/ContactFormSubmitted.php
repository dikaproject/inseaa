<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $contact; // Add this property

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact; // Assign the contact
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Use a view for the email content
        return $this->subject('New Contact Form Submission')
                    ->view('emails.contact_form_submitted');
    }
}
