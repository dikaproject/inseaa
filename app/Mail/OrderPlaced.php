<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->view('emails.order-placed')
                    ->with([
                        'order' => $this->order,
                        'orderItems' => $this->order->items
                    ]);
    }

    public function envelope()
    {
        return new Envelope(subject: 'Order Placed');
    }
}
