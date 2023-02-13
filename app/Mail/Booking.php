<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Booking extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( private $user, private $hotel, private $booked, private $invoiceDate, private $totalTime , private $discountPrice , private $sale_tax , private $totalPrice)
    {
        //
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'New Booking '.$this->hotel->name,
            
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.booking',
            with: [
                'user' => $this->user, 
                'hotel' => $this->hotel,
                'booked' => $this->booked,
                'invoiceDate' => $this->invoiceDate,
                'totalTime' => $this->totalTime,
                'discountPrice' => $this->discountPrice,
                'sale_tax' => $this->sale_tax,
                'totalPrice' => $this->totalPrice,

        
        ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
