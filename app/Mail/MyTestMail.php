<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $cart, $bill;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart, $bill)
    {
        $this->cart = $cart;
        $this->bill = $bill;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Xác nhận đơn hàng')
                    ->view('errors.mail');
    }
}
