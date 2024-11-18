<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SellerOrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $seller;

    public function __construct($order, $seller)
    {
        $this->order = $order;
        $this->seller = $seller;
    }

    public function build()
    {
        return $this->view('emails.sellerorder-placed')
                    ->with([
                        'order' => $this->order,
                        'seller' => $this->seller,
                    ]);
    }

    public function envelope()
    {
        return new Envelope(subject: 'New Order for Seller');
    }
}
