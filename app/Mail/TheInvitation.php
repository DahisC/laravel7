<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class TheInvitation extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parameters)
    {
        $this->mailData = $parameters;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('測試')->from('dahis4work@gmail.com')->attachFromStorage('public/news/26/vVtRdQ1sXxXCm32bcnWm1W7R5VTb2PZDYVTIWcTd.jpg')
            ->markdown('emails.orders.shipped', ['mailData' => $this->mailData]);
    }
}
