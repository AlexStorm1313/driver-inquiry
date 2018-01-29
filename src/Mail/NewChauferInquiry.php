<?php

namespace Alexstorm13\ChauferInquiry\Mail;

use Alexstorm13\ChauferInquiry\ChauferInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class NewChauferInquiry
 * @package Alexstorm13\ChauferInquiry\Mail
 */
class NewChauferInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiry;

    /**
     * Create a new message instance.
     *
     * @param ChauferInquiry $inquiry
     */
    public function __construct(ChauferInquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('ChauferInquiry::newChauferInquiry')
            ->replyTo($this->inquiry->email)
            ->from(env('MAIL_FROM_ADDRESS'), 'Chaufer Robot')
            ->subject('New inquiry form Chaufer');
    }
}
