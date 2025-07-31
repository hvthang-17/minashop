<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('hoangthang050517@gmail.com', 'TT Antiques')
                    ->subject('Xác nhận đơn hàng từ cửa hàng của bạn')
                    ->view('emails.order-confirmation');
    }
}


