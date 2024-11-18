<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminOrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->view('emails.adminorder-placed')
                    ->with([
                        'order' => $this->order,
                    ]);
    }

    public function envelope()
    {
        return new Envelope(subject: 'New Customer Order for Admin');
    }
}
